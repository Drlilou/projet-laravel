<?php
namespace App\Http\Controllers\Auth;

use App\Photo;
use App\SubAdmin;
use App\Zone;
use App\News;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;
use Auth;
class sub_admins extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sub_admins');
    }
    public function imp($id)
    {
        return $id;
    }
    public function add_news()
    {
        return view('sub_admins.add_news');
    }
    protected function create_news(Request $request)
    {

       // return        $request;



        $x=Zone::select('id')
             ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
        $rules = [
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required',
            //      'birth_date' => 'required|befor:yesterday',
        ];
        $validator = Validator::make($request->all() ,$rules);
        if ($validator->fails()) {
            //    return redirect()->back()->withErrors($validator)->withInput($request->all());
            // return  $validator->errors()->first();
            return redirect()->back()->with(["eror"=>$validator->errors()->first()]);
        }
        if($request->hasfile('image'))
        {
 $i=1;
            foreach($request->file('image') as $file)
            {
                $file_extension= $file -> getClientOriginalExtension();
                $file_name = "$i".time().'.'.$file_extension;
                $file->move(public_path().'/images/news/', $file_name);
                $data[] = $file_name;

                $i++;

            }
        }

        $N=News::create([
            'image' =>  $data[0],
            'titre' => $request->titre,
            'description' => $request->description,
            'id_zone' =>$x[0]->id,
        ]);
        $id =$N->id;
  // return $id;
        foreach($data as $file)
        {
            Photo::create([
                'img' =>  $file,
                'news' => $id
            ]);

        }

        return redirect('/my_news');
}
    public function my_news()
    {    $x=Zone::select('id')
            ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
        $t= News::select('*')
       ->where('id_zone' ,$x[0]->id)
            ->paginate(2);
        return view('sub_admins.my_news')->with('data',$t)->with('paginator',$t);;
    }
    public function delet($id)
    {

        $p = News::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.pfe not exist')]);

        $p->delete();
        return redirect()
            ->route('my_news')
            ->with(['success' => 'news deleted successfully']);
    }
    public function edit($id)
    {

        $p = News::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.pfe not exist')]);
        $p = News::select()->find($id);
        return view('sub_admins.edit_news')->with('p',$p);
    }
    public function apdate(Request $request,$id)
    {
        $p = News::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.pfe not exist')]);
        if ($request->image!='')
        {  $photo=$request->image;
            $path='images/news';
            $file_extension = $photo -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $photo -> move($path,$file_name);
            $p->update(['image' =>$file_name]);

        }
        $p->update(

            [
                'titre' => $request->titre,
                'description' => $request->description,
            ]
        );


        return redirect()->back()
            ->with(['success' => 'news  apdated successfully']);    }


}
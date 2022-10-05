<?php
namespace App\Http\Controllers\Auth;

use App\Photo;
use App\Product;
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
    {return $id;
    }
    public function add_news()
    {
        $data=Zone::select('*')
            ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
        $x=Zone::select('id')
            ->orderBy('id', 'desc')
            ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
        return view('sub_admins.add_news')->with('c',count($x))->with('data',$data);
    }
    public function add_product()
    {
        $data=Zone::select('*')
            ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
        $x=Zone::select('id')
            ->orderBy('id', 'desc')
            ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
        return view('sub_admins.add_product')->with('c',count($x))->with('data',$data);
    }
    protected function create_news(Request $request)
    {

       // return        $request;




        $rules = [
            'id_zone' => 'required',
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
            'id_zone' => $request->id_zone,
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
       protected function create_product(Request $request)
    {




        $rules = [
            'name' => 'required',
            'category' => 'required',
            'measruing_unit' => 'required',
        ];
        $validator = Validator::make($request->all() ,$rules);
        if ($validator->fails()) {
            //    return redirect()->back()->withErrors($validator)->withInput($request->all());
            // return  $validator->errors()->first();
            return redirect()->back()->with(["eror"=>$validator->errors()->first()]);
        }
        $N=Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'measruing_unit' => $request->measruing_unit,
        ]);
        return redirect('/my_news');
}
    public function my_news()
    {

        $x=Zone::select('id')
        ->where('admin',Auth::guard('sub_admins')->user()->id)
            ->get();
if (count($x)<1)
{
    $t=[];
    return view('sub_admins.my_news')->with('data',$t)->with('paginator',$t)->with('c',count($x));


}


        $t= News::select('*')
            ->where('id_zone' ,$x[0]->id)
            ->orderBy('id', 'desc')

            ->paginate(2);

        return view('sub_admins.my_news')->with('data',$t)->with('paginator',$t)->with('c',count($x));
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

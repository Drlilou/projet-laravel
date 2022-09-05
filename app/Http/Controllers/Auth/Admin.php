<?php
namespace App\Http\Controllers\Auth;
use App\News;
use App\SubAdmin;
use App\Zone;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Crypt;
use Hash;

use phpDocumentor\Reflection\Types\True_;
class Admin extends Controller
{public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function imp($id)
    {
        return $id;
    }
    public function addsub_adminforme()
    {
        return view('admin.addsub_admin');
    }
    public function addzoneforme()
    {
        $data=SubAdmin::select('*')
        ->get();
        return view('admin.addzone')->with('data',$data);
    }
    public function consulter_les_zones()
    {
        $t= Zone::select('*','zones.id as idzone')
            //    ->where('id_zone' ,$x[0]->id)
            ->join('sub_admins', 'sub_admins.id', '=', 'zones.admin')
            ->get();

//            ->paginate(1);
       // return $t;
       return view('admin.zones')->with('data',$t);
    }
    public function consulter_les_sub_admins()
    {
        $t= SubAdmin::select('*')
            ->get();

//            ->paginate(1);
       // return $t;
       return view('admin.sub_admins')->with('data',$t);
    }
    protected function create_zone(Request $data)
    {
        $rules = [
            'nom' => ['required', 'string', 'max:255'],
            'admin' => ['required'],
        ];
        $validator = Validator::make($data->all() ,$rules);
        if ($validator->fails()) {
;
            return redirect()->back()->with(['eror' => $validator->errors()->first()]);
        }

//return $a->id;
Zone::create(   [
    'nom' => $data['nom'],
    'admin' => $data['admin']]

);
return redirect()->back()->with(["success" => 'zone saved successfully']);
    }// ruturn msg de  succed d'etudiant avec les condition vérifier
    protected function create_sub_admin(Request $data)
    {
   //    return $data;
        $rules = [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sub_admins'],
            'username' => ['required', 'string', 'max:255', 'unique:sub_admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $validator = Validator::make($data->all() ,$rules);
        if ($validator->fails()) {

            return redirect()->back()->with(['eror' => $validator->errors()->first()]);
        }
        $a=SubAdmin::create(   [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'username' => $data['username'],
                'p' => $data['password'],
                'password' => Hash::make($data['password'])
        ]);

return redirect()->back()->with(["success" => 'sub_admin saved successfully']);
    }//

    public function delet($id)
    {
        $p = Zone::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.zone not exist')]);
      //  return $id;

        $p->delete();
        return redirect()
            ->back()
            ->with(['success' => 'zone deleted successfully']);
    }
    public function edit($id){
        $data=SubAdmin::select('*')
            ->get();
        $p = Zone::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.zone not exist')]);
        $p = Zone::select()->find($id);
        return view('admin.edit_zone')->with('p',$p)->with('data',$data);;
    }
    public function sub_admins_imp($id)
    {
        $password = '123456789';

        $encryptedPassword = encrypt($password);
        $decryptedPassword = decrypt($encryptedPassword);

  //    return   $decryptedPassword;



        $p = SubAdmin::find($id);
      // $decrypt= Crypt::decrypt($p->password);
   // return Hash::check('secret', $p->password);



    //  return Hash::make('123456789');
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.SubAdmin not exist')]);
        $p = SubAdmin::select()->find($id);
        return view('admin.imp_sub_admins')->with('p',$p);
    }
    public function apdate(Request $request,$id)
    {
        $p = Zone::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.pfe not exist')]);

        $p->update(

            [
                'nom' => $request->nom,
                'admin' => $request->admin,
            ]
        );


        return redirect()->back()
            ->with(['success' => 'zone  apdated successfully']);    }



    public function sub_adminsdelet($id)
    {
        $p = SubAdmin::find($id);
        if (!$p)
            return redirect()->back()->with(['error' => __('messages.SubAdmin not exist')]);
      //  return $id;

        $p->delete();
        return redirect()
            ->back()
            ->with(['success' => 'SubAdmin deleted successfully']);
    }
}

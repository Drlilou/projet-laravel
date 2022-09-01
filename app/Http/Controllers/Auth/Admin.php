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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
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
    public function addzoneforme()
    {
        return view('admin.addzone');
    }
    public function consulter_les_zones()
    {
        $t= Zone::select('*')
            //    ->where('id_zone' ,$x[0]->id)
            ->join('sub_admins', 'sub_admins.id', '=', 'zones.admin')
            ->get();
//            ->paginate(1);
      //  return $t;
       return view('admin.zones')->with('data',$t);
    }
    protected function create_zone(Request $data)
    {
   //    return $data;
        $rules = [
            'nom' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sub_admins'],
            'username' => ['required', 'string', 'max:255', 'unique:sub_admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $validator = Validator::make($data->all() ,$rules);
        if ($validator->fails()) {
            ///return message d'erreur
            //  return redirect()->back()->withErrors($validator)->withInput($request->all());
           // return  $validator->errors()->first();
            return redirect()->back()->with(['eror' => $validator->errors()->first()]);
        }
        ///insertion de nv etudiant dans la table etudiant
        $a=SubAdmin::create(   [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password'])]);
//return $a->id;
$b=Zone::create(   [
    'nom' => $data['nom'],
    'admin' => $a->id
]);
return redirect()->back()->with(["success" => 'zone saved successfully']);
    }// ruturn msg de  succed d'etudiant avec les condition vérifier
}

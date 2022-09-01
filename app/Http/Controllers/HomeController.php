<?php

namespace App\Http\Controllers;
use App\Comment;
use App\News;
use App\Photo;
use App\Zone;
use Illuminate\Http\Request;
use Auth;
use Hash;
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::guard('admin')->check())
           return redirect()->intended('/admin');
    elseif(Auth::guard('web')->check())
        return redirect()->intended('/profil');
    elseif(Auth::guard('sub_admins')->check())
       return redirect()->intended('/sub_admins');
    else
        return redirect()->intended('/news');
    }

    public function news()
    {

        if(Auth::guard('sub_admins')->check())
            $x='sub_admins.app';
        elseif(Auth::guard('admin')->check())
            $x='admin.app';
        elseif (Auth::guard('web')->check())
            $x='layouts.app';
        else
            $x='layouts.app';


        $t= News::select('*')
            ->paginate(4);
        return view('news')->with('data',$t)->with('paginator',$t)->with('app',$x);


    }
    public function search(Request $data)
    {
        //return $data;

        if(Auth::guard('sub_admins')->check())
            $x='sub_admins.app';
        elseif(Auth::guard('admin')->check())
            $x='admin.app';
        elseif (Auth::guard('web')->check())
            $x='layouts.app';
        else
            $x='layouts.app';


        $t= News::select('*')
            ->where('titre','like','%'.$data->titre.'%')
            ->paginate(4);
        return view('news')->with('data',$t)->with('paginator',$t)->with('app',$x);


    }
   public function news_details($id){
       if(Auth::guard('sub_admins')->check())
           $x='sub_admins.app';
       elseif(Auth::guard('admin')->check())
           $x='admin.app';
       elseif (Auth::guard('web')->check())
           $x='layouts.app';
       else
           $x='layouts.app';
       //  return $x;



        $t= News::select('*')
            ->where('id',$id)
        ->get();
        ;
      //  return $t[0];

       $commment=Comment::select('comments.id as id','content','users.id as userid',
           'comments.updated_at as updated_at',
           'users.fname',
           'users.lname'
       )
           ->where('news',$id)
           ->join('users', 'users.id', '=', 'comments.user')

       ->get();

       $photo=Photo::select("*")
           ->where("news",$id)
           ->get();
      // return $photo;
     //  return $commment;
    return view('news_details')->with('data',$t[0])->with('comments',$commment)->with('photos',$photo)->with('app',$x);
    }

   public function add_commment(Request $request,$id){
      // return $data;
       Comment::create([
           'news' => $id,
           'content' =>$request->content,
           'user' =>Auth::guard('web')->user()->id
       ]);
  return  redirect('news_details/'.$id);
    }
   public function commentdelet($id){
       $p = Comment::find($id);
       if (!$p)
           return redirect()->back()->with(['error' => __('messages.COMMENT  not exist')]);

       $p->delete();
       return redirect()
           ->back()
           ->with(['success' => 'comment deleted successfully']);
    }



    public function profil() {



        return view('profil');
    }
    public function showChangePasswordGet() {

        if(Auth::guard('sub_admins')->check())
        $x='sub_admins.app';
       elseif(Auth::guard('admin')->check())
        $x='admin.app';
       elseif (Auth::guard('web')->check())
        $x='layouts.app';
     //  return $x;

        return view('auth.passwords.change-password')->with('app',$x);
    }

    public function changePasswordPost(Request $request) {
        if(Auth::guard('admin')->check())
            $guard='admin';
        elseif(Auth::guard('web')->check())
            $guard='web';
        elseif(Auth::guard('sub_admins')->check())
            $guard='sub_admins';

        if (!(Hash::check($request->get('current-password'), Auth::guard($guard)->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
        //Change Password
        $user = Auth::guard($guard)->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

}

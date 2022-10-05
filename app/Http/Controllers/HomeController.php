<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Don;
use App\MissingProduct;
use App\News;
use App\Photo;
use App\Product;
use App\SubAdmin;
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
            ->orderBy('id', 'desc')
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
        $id_sub_admin =Zone::select('admin')
            ->where('id', $t[0]->id_zone)
            ->get();

      //  return $t[0];

       $commment=Comment::select('comments.id as id','content','users.id as userid',
           'comments.updated_at as updated_at',
           'users.fname',
           'users.lname'
       )
           ->where('news',$id)
           ->join('users', 'users.id', '=', 'comments.user')

       ->get();
       $missing_products=MissingProduct::select(
           'product.name  as name','measruing_unit', 'product.id as idp', 'missing_products.id as idmp','Quantity'
       )
           ->where('news',$id)
           ->join('product', 'product.id', '=', 'missing_products.products')
       ->get();
       if(Auth::guard('web')->check())
       {
       $don=Don::select('dons.Quantity','name','measruing_unit')
           ->where('user',Auth::guard('web')->user()->id)
           ->join('missing_products', 'dons.missing_products', '=', 'missing_products.id')
           ->join('product', 'missing_products.products', '=', 'product.id')
       ->get();}
       if(Auth::guard('sub_admins')->check())
       {
       $don=Don::select('dons.Quantity','name','measruing_unit','phone','fname','lname','email')
           ->where('news',$id)
           ->join('missing_products', 'dons.missing_products', '=', 'missing_products.id')
           ->join('product', 'missing_products.products', '=', 'product.id')
           ->join('users', 'users.id', '=', 'dons.user')
       ->get();
 //      return $don;

       }




       $photo=Photo::select("*")
           ->where("news",$id)
           ->get();
       $t1=Product::select('category')
           ->groupby('category')
           ->get();
       $bol=False;
       $t3=Product::select('category')
           ->groupby('category')
           ->get();


       if(Auth::guard('web')->check())
                 {      return view('news_details')
                     ->with('data',$t[0])->with('comments',$commment)
                     ->with('photos',$photo)
                     ->with('missing_products',$missing_products)
                     ->with('app',$x)
                     ->with('bol',$bol)
                     ->with('t',$t1)
                     ->with('id_sub_admin',$id_sub_admin[0]['admin'])

                     ->with('t3',$t3)
                     ->with('don',$don);

                     ;}
       if(Auth::guard('sub_admins')->check())
                 {      return view('news_details')
                     ->with('data',$t[0])->with('comments',$commment)
                     ->with('photos',$photo)
                     ->with('missing_products',$missing_products)
                     ->with('app',$x)
                     ->with('bol',$bol)
                     ->with('t',$t1)
                     ->with('id_sub_admin',$id_sub_admin[0]['admin'])

                     ->with('t3',$t3)
                     ->with('don',$don);

                     ;}
       return view('news_details')
           ->with('data',$t[0])->with('comments',$commment)
           ->with('photos',$photo)
           ->with('missing_products',$missing_products)
           ->with('app',$x)
           ->with('bol',$bol)
           ->with('t',$t1)
           ->with('id_sub_admin',$id_sub_admin[0]['admin'])

           ->with('t3',$t3)
           ;

    }


   public function don($id){
       $missing_products=MissingProduct::select(
           'product.name  as name','measruing_unit', 'product.id as idp', 'missing_products.id as idmp','Quantity'
       ,'missing_products.news')
           ->where('missing_products.id',$id)
           ->join('product', 'product.id', '=', 'missing_products.products')
       ->get();
       $bol=True;
     $id= $missing_products[0]->news;
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
       $missing_products=MissingProduct::select(
           'product.name  as name','measruing_unit', 'product.id as idp', 'missing_products.id as idmp','Quantity'
       )
           ->where('news',$id)
           ->join('product', 'product.id', '=', 'missing_products.products')

           ->get();
       //  return $missing_products;

       $photo=Photo::select("*")
           ->where("news",$id)
           ->get();
       // return $photo;
       //  return $commment;
       $t1=Product::select('category')
           ->groupby('category')
           ->get();
       return view('don')
           ->with('data',$t[0])->with('comments',$commment)
           ->with('photos',$photo)
           ->with('missing_products',$missing_products)
           ->with('app',$x)
           ->with('bol',$bol)
           ->with('t',$t1);}
   public function add_commment(Request $request,$id){
      // return $data;

       Comment::create([
           'news' => $id,
           'content' =>$request->content,
           'user' =>Auth::guard('web')->user()->id
       ]);

  return  redirect('news_details/'.$id);
    }
   public function add_don(Request $request,$id){
      // return $data;
       $p= MissingProduct::select()
           ->where('id',$id)
           ->get();
       Don::create([
           'missing_products' => $id,
           'phone' =>$request->phone,
           'Quantity' =>$request->Quantity,
           'user' =>Auth::guard('web')->user()->id
       ]);
  return  redirect('news_details/'.$p[0]->news);
    }
   public function create_missing_products(Request $request,$id){
     // return $request;


       for ($i=0;$i<$request->nb;$i++)
       {
           MissingProduct::create([
               'news' => $id,
               'products' =>$request['p'.$i],
               'Quantity' =>$request['Quantity'.$i]
           ]);

       }



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
    if(Auth::guard('sub_admins')->check())
        $user->update(['p'=>$request->get('new-password')]);
        return redirect()->back()->with("success","Password successfully changed!");

    }
}

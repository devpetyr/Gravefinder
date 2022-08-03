<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use validate;
class AdminAuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function login_data(Request $req)
    {
        if(!empty($req->email)&&!empty($req->password)){
            $userfind=User::where('email',$req->email)->where('user_role',1)->first();
            if($userfind){
                /*means found user*/
                if(Hash::check($req->password,$userfind->password)){
                    /*matched password*/
                    Auth::login($userfind);
                    if(Auth::check()){
                        return redirect(route('admin_dashboard'));
                    }else{
                        return redirect(route('admin_login'));
                    }
                    /*matched password end*/
                }else{
                    return redirect(route('admin_login'))->with('Failed_Password','Password is incorrect')->with('email',$req->email);
                }
                /*means found user end*/
            }else{
                return redirect(route('admin_login'))->with('Failed_Email','Email not found');
            }
        }else{
            return redirect(route('admin_login'))->with('Failed_Empty','Please fill required fields');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('admin_login'));
    }
    public function admin_profile(){
        $profile = User::where('id',Auth()->user()->id)->first();
        return view('admin.profile',compact('profile'));
    }
    public function admin_profile_update(User $user, Request $request){
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        return back()->with('update','Updated Successfully');
    }
    public function admin_password_update(User $user,Request $request){
        if($request->old_password !== null And Hash::check($request->old_password ,Auth()->user()->getAuthPassword())){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back()->with('reset','Reset Successfully');
        }
        else{
            return back()->with('oldpass','Oldpass is incorrect');
        }
    }

    /**-----------------------------------Admin User Functions-------------------------------------------**/
    public function user_list(){
        $user = User::orderBy('id','ASC')->get();
        return view('admin.users.users-list',compact('user'));
    }
    function user_add()
    {
        return view('admin.users.users-add');
    }
    function user_edit($id)
    {
        $user = User ::where('id',$id)->first();
        return view('admin.users.users-edit',compact('user'));
    }
    function user_delete(User $user)
    {
        $user->delete();
        return back()->with('delete','Deleted Successfully');
    }
    function user_add_edit_data(Request $request,User $user)
    {
        $create = 1;
        (isset($user->id) and $user->id>0)?$create=0:$create=1;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->user_role = $request->user_role;
        $user->status = $request->status;
        $user->save();
        if($create == 0)
        {
            return back()->with('update','Updated Successfully');
        }
        else
        {
            return back()->with('success','Added Successfully');
        }
    }
    public function admin_profil()
    {
        $admin = User::where('id',Auth::id())->first();
       return view('admin.admin_profile')->with(compact('admin'));
    }
    public function admin_profile_change(Request $request)
    {
       $this->validate($request, [
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:new_password',
        ]);

        if (!(Hash::check($request->new_password, Auth::user()->password))) {
            if ((Hash::check($request->old_password, Auth::user()->password))) {
       
        $admin = User::find($request->user_id);
        $admin->password =Hash::make($request->new_password);
        $admin->save();
      
         $success = 'Password Changed Successfully!';
            return redirect()->back()->with('success',$success);
        }

         else{
             $error = 'Incorrect Old Password';
            return redirect()->back()->with('error',$error);
        }
    }
        else{
           $error = 'Old Password and New password cannot be same';
            return redirect()->back()->with('error',$error);
        }
       
           
    }
    public function my_profile()
    {
         $user = User::where('id',Auth::id())->first();
        return view('user_profile')->with(compact('user'));
    }
    public function user_profile_change(Request $request)
    {
     $this->validate($request, [
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:new_password',
        ]);

        if (!(Hash::check($request->new_password, Auth::user()->password))) {
             if ((Hash::check($request->old_password, Auth::user()->password))) {
       
        $admin = User::find($request->user_id);
        $admin->password =Hash::make($request->new_password);
        $admin->save();
      
            return redirect()->back()->with('message','Password Changed Successfully!');
        }

         else{
             
            return redirect()->back()->with('error','Incorrect Old Password');
        }
    }
        else{
           
            return redirect()->back()->with('error','Old Password and New password cannot be same');
        }
}
}

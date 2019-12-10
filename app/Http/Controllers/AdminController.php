<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
            $adminCount = Admin::where(['username' => $data['username'],'password'=>hash::check(($data['password']),'$2y$10$UyvMFaSFdtJM6LK9fJCXAeBStbxo0ZvSxUpC1f3RbHxWlDrpFf4N'),'status'=>1])->count();
            if($adminCount > 0){
                //echo "Success"; die;
                Session::put('adminSession', $data['username']);
                return redirect('/seekmakeadminprivate/dashboard');
        	}else{
                //echo "failed"; die;
                return redirect('/seekmakeadminprivate')->with('flash_message_error','Invalid Username or Password');
        	}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{
            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
        return view('admin.dashboard');
    }

    public function settings(){

        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();

        //echo "<pre>"; print_r($adminDetails); die;

        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>hash::check(($data['current_pwd']),'$2y$10$UyvMFaSFdtJM6LK9fJCXAeBStbxo0ZvSxUpC1f3RbHxWlDrpFf4N')])->count();
            if ($adminCount == 1) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }


    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>hash::check(($data['current_pwd']),'$2y$10$UyvMFaSFdtJM6LK9fJCXAeBStbxo0ZvSxUpC1f3RbHxWlDrpFf4N')])->count();

            if ($adminCount == 1) {
                // here you know data is valid
                $password = hash::make($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/seekmakeadminprivate/settings')->with('flash_message_success', 'Password updated successfully.');
            }else{
                return redirect('/seekmakeadminprivate/settings')->with('flash_message_error', 'Current Password entered is incorrect.');
            }


        }
    }

    public function logout(){
        Session::flush();
        return redirect('/seekmakeadminprivate')->with('flash_message_success', 'Logged out successfully.');

    }
}

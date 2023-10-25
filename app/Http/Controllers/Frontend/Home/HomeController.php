<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\Models\SchoolsRegisteration;
use Illuminate\Database\Eloquent\Builder;


class HomeController extends Controller
{
    //
     public function Index()
     {

        return view('Home.Homeindex');

     }



     public function rulesandregulation()
     {
           return view('Home.RulesandRegulation');
     }

     public function signUp()
     {
        return view('auth.register');
     }

     public function Register_Account(Request $request)
     {
        $request->validate([

            'contactNumber' => 'required|unique:users',
            'accountholdername' => 'required',
            'password'=>'required|confirmed|min:6'
         ]);

       $user=new User;
       $user->name=$request->accountholdername;
       $user->contactNumber = $request->contactNumber;
       $user->account_is_verified=false;
       $user->account_is_deleted= false;
       $user->account_is_active =true;
       $user->role_id = 1;
       $user->date_created =Carbon::now()->format('y-m-d');
       $user->password=HASH::make($request->password);
       $user->save();
       Auth::attempt(['contactNumber'=>$request->contactNumber, 'password'=>$request->password]);

       return redirect()->route('student.add')->with('message',$request->contactNumber.' and with the name'.$request->accountholdername.' has been created successfully. Enter student details. ');
     }

     public function studentregisteration($id)
     {
         return view('Home.StudentRegisteration');
     }

     public function Login()
     {
         return view('auth.login');
     }

     public function SignIn(Request $request)
     {
        $request->validate([

            'contactNumber' => 'required',
            'password' => 'required',


        ]

    );
            if(Auth::attempt(['contactNumber'=>$request->contactNumber, 'password'=>$request->password]))
            {
                if(\Auth::user()->role_id==3)
                {
                    $user=\Auth::user();
                    $school = SchoolsRegisteration::query()->where([['user_id','=',$user->user_id]])->firstOrFail();
                    Session::put('user_details',
                                [
                                    'schoolName' => $school->school->school_name,
                                    'user_id' => $user->user_id,
                                    'school_id' =>$school->school_id,
                                    'school_reg_id'=>$school->schoolregister_id
                                ]);


                    return view('dashboard.dashboardHome.dashboardIndex');
                }
                return view('dashboard.dashboardHome.dashboardIndex');
            }
            else
            {
                return redirect('login')->with('message','login details are not valid.');

            }

     }

     public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');

    }

    public function checkRole($role_id)
    {
        if($role_id==1)
        {

        }
        else if($role_id==2)
        {

        }
        else if($role_id==3)
        {

        }
    }

}

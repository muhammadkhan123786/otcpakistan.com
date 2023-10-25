<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class DashboardHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:1');

    }
    //
    public function index()
    {

        return view('dashboard.dashboardHome.dashboardIndex');
    }

    public function changePassword()
    {
        return view('Home.changepassword');

    }

    public function updatePassword(Request $request)
    {
          $request->validate([
               'currentpassword' => 'required',
               'password'=>'required|confirmed|min:6',

          ]);

          $user=\Auth::user();
          if(Hash::check($request->currentpassword, $user->password))
          {
             $user->password= Hash::make($request->password);
             $user->save();
             Session::flush();
             Auth::logout();
             return redirect()->route('account.login')->with('message', 'Dear '.$user->name.' your password has been updated, enter new password to login.');

          }
          else
          {

              return redirect()->back()->with('message','Dear '.$user->name.' your current password is invalid, please enter valid password thank you.');

          }

    }


}

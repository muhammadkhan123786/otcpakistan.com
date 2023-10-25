<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSessions;

use Session;
use Validator;

class SchoolSessionsManagementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:3');
    }

    public function index()
    {
        $sessions=SchoolSessions::query()->where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_session_isDeleted','=',false]
        ])->paginate(10);

        return view('dashboard.schoolsessionsmanagement.schoolsessionIndex',compact('sessions'));

    }

    public function add()
    {
        return view("dashboard.schoolsessionsmanagement.addschoolsession");
    }

    public function store(Request $request)
    {
        $sValidationRules=[
            'SessionName' => 'required',
            'sessionstartdate' => 'required|date',
            'sessionenddate' => 'required|date',
       ];

       $validator = Validator::make($request->all(), $sValidationRules);

       if ($validator->fails())
       {
          return redirect()->route('school-session.add')->withErrors($validator)->withInput();
       }
       else if($request->sessionenddate <= $request->sessionstartdate)
       {

          return back()->with('message','End date must be greater than start date.')->withInput();
       }

       $schoolsession = new SchoolSessions;
       $schoolsession->school_id = Session::get('user_details')['school_id'];
       $schoolsession->user_id = Session::get('user_details')['user_id'];
       $schoolsession->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $schoolsession->school_session_isActive = $request->sessionIsactive;

       return redirect()->route('school-session.index')->with('message',$request->SessionName.' has been added successfuly.');

    }



}

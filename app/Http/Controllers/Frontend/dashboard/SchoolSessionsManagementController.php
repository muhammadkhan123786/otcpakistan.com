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

       if($request->sessionIsactive=='on')
       {
           $request->sessionIsactive = 1;
       }
       else
       {
           $request->sessionIsactive = 0;
       }

       $schoolsession = new SchoolSessions;
       $schoolsession->school_id = Session::get('user_details')['school_id'];
       $schoolsession->user_id = Session::get('user_details')['user_id'];
       $schoolsession->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $schoolsession->school_session_isActive = $request->sessionIsactive;
       $schoolsession->school_session_name = $request->SessionName;
       $schoolsession->school_session_isDeleted = false;
       $schoolsession->school_session_startDate = $request->sessionstartdate;
       $schoolsession->school_session_endDate = $request->sessionenddate;

       if($request->sessionIsactive)
       {
                $activeSession= SchoolSessions::where([
                    ['user_id','=',Session::get('user_details')['user_id']],
                    ['school_id','=',Session::get('user_details')['school_id']],
                    ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                    ['school_session_isActive','=',true],
                    ['school_session_isDeleted','=',false]
                ])->get();

                if($activeSession->count())
                {
                    return back()->with('message','There is already a active session available.')->withInput();
                }
                else
                {
                     $schoolsession->save();
                }

       }
       else
       {
            $schoolsession->save();
       }
       return redirect()->route('school-session.index')->with('message',$request->SessionName.' has been added successfuly.');

    }

    public function Edit($sessionId)
    {
        $Session= SchoolSessions::where([
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['school_session_isDeleted','=',false],
            ['school_sessions_id','=',$sessionId]
        ])->first();

        return view("dashboard.schoolsessionsmanagement.editschoolsession",compact('Session'));


    }

    public function update(Request $request, $sessionId)
    {
        $sValidationRules=[
            'SessionName' => 'required',
            'sessionstartdate' => 'required|date',
            'sessionenddate' => 'required|date',
       ];

       $validator = Validator::make($request->all(), $sValidationRules);

       if ($validator->fails())
       {
          return redirect()->route('school-session.Edit')->withErrors($validator)->withInput();
       }
       else if($request->sessionenddate <= $request->sessionstartdate)
       {

          return back()->with('message','End date must be greater than start date.')->withInput();
       }

       if($request->sessionIsactive=='on')
       {
           $request->sessionIsactive = 1;
       }
       else
       {
           $request->sessionIsactive = 0;
       }

       $Session= SchoolSessions::where([
                ['user_id','=',Session::get('user_details')['user_id']],
                ['school_id','=',Session::get('user_details')['school_id']],
                ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                ['school_session_isDeleted','=',false],
                ['school_sessions_id','=',$sessionId]
            ])->first();

       $Session->school_id = Session::get('user_details')['school_id'];
       $Session->user_id = Session::get('user_details')['user_id'];
       $Session->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $Session->school_session_isActive = $request->sessionIsactive;
       $Session->school_session_name = $request->SessionName;
       $Session->school_session_isDeleted = false;
       $Session->school_session_startDate = $request->sessionstartdate;
       $Session->school_session_endDate = $request->sessionenddate;

       if($request->sessionIsactive)
       {
                $activeSession= SchoolSessions::where([
                    ['user_id','=',Session::get('user_details')['user_id']],
                    ['school_id','=',Session::get('user_details')['school_id']],
                    ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                    ['school_session_isActive','=',true],
                    ['school_session_isDeleted','=',false],
                    ['school_sessions_id','!=',$sessionId]
                ])->get();

                if($activeSession->count())
                {
                    return back()->with('message','There is already a active session available.')->withInput();
                }
                else
                {
                     $Session->save();
                }

       }
       else
       {
            $Session->save();
       }
       return redirect()->route('school-session.index')->with('message',$request->SessionName.' has been added successfuly.');

    }

    public function details($sessionId)
    {
        $Session= SchoolSessions::where([
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['school_session_isDeleted','=',false],
            ['school_sessions_id','=',$sessionId]
        ])->first();

       return view('dashboard.schoolsessionsmanagement.detailsschoolsession',compact('Session'));

    }

    public function destroy($sessionId)
   {

            $Session= SchoolSessions::where([
                ['user_id','=',Session::get('user_details')['user_id']],
                ['school_id','=',Session::get('user_details')['school_id']],
                ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                ['school_session_isDeleted','=',false],
                ['school_sessions_id','=',$sessionId]
            ])->first();

            if (!empty($Session)) {
                $Session->school_session_isDeleted=true;
                $Session->save();
                return response()->json([
                    'flag' => true,
                    'message' => 'The session '.$Session->school_session_name.' has been deleted successfully.'
                        ], 200);


            }
            else {
                return response()->json([
                            'flag' => false,
                            'message' => 'Session Not Found.'
                ]);
            }


   }




}

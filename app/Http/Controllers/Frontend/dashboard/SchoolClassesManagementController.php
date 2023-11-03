<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolClasses;
use Session;
use Validator;

class SchoolClassesManagementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:3');
    }
    public function index(Request $request)
    {
        $search=$request->search;

        $classes=SchoolClasses::query()->where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_class_isDeleted','=',false],
            ['school_class_name','like',"%{$request->search}%"]
        ])->paginate(10);

        return view('dashboard.schoolclassesmanagement.schoolclassIndex',compact('classes','search'));

    }

    public function add()
    {

        return view('dashboard.schoolclassesmanagement.schoolclassAdd');

    }


    public function store(Request $request)
    {

        $sValidationRules=[
            'className' => 'required',
       ];
       $validator = Validator::make($request->all(), $sValidationRules);
       if ($validator->fails())
       {
          return redirect()->route('school-class.add')->withErrors($validator)->withInput();
       }
       if($request->classIsactive=='on')
       {
           $request->classIsactive = 1;
       }
       else
       {
           $request->classIsactive = 0;
       }
       $schoolclass = new SchoolClasses;
       $schoolclass->school_id = Session::get('user_details')['school_id'];
       $schoolclass->user_id = Session::get('user_details')['user_id'];
       $schoolclass->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $schoolclass->school_class_isActive = $request->classIsactive;
       $schoolclass->school_class_name = $request->className;
       $schoolclass->school_class_isDeleted = false;

       $schoolclass->save();
       return redirect()->route('school-class.index')->with('message',$request->className.' has been added successfuly.');

    }

    public function Edit($classId)
    {
        $class= SchoolClasses::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_class_isDeleted','=',false],
            ['school_class_id','=',$classId]
        ])->first();


        return view('dashboard.schoolclassesmanagement.schoolclassEdit',compact('class'));


    }

    public function update(Request $request, $classId)
    {
            $sValidationRules=[
                'className' => 'required',
            ];
            $validator = Validator::make($request->all(), $sValidationRules);
            if ($validator->fails())
            {
                return redirect()->route('school-class.add')->withErrors($validator)->withInput();
            }
            if($request->classIsactive=='on')
            {
                $request->classIsactive = 1;
            }
            else
            {
                $request->classIsactive = 0;
            }

            $class= SchoolClasses::where([
                ['school_id','=',Session::get('user_details')['school_id']],
                ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                ['user_id','=',Session::get('user_details')['user_id']],
                ['school_class_isDeleted','=',false],
                ['school_class_id','=',$classId]
            ])->first();

            $class->school_class_name = $request->className;
            $class->school_class_isActive = $request->classIsactive;
            $class->save();

           return redirect()->route('school-class.index')->with('message',$class->school_class_name.', the class updated successfully.');



    }

    public function destroy($classId)
    {
        $class= SchoolClasses::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_class_isDeleted','=',false],
            ['school_class_id','=',$classId]
        ])->first();

        if (!empty($class)) {
            $class->school_class_isDeleted=true;
            $class->save();
            return response()->json([
                'flag' => true,
                'message' => 'The class '.$class->school_school_class_name.' has been deleted successfully.'
                    ], 200);


        }
        else {
            return response()->json([
                        'flag' => false,
                        'message' => 'Class Not Found.'
            ]);
        }

    }

}

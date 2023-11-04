<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schooldepartment;
use Session;
use Validator;


class DepartmentsManagementController extends Controller
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

        $schooldepartments=Schooldepartment::query()->where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_department_isDeleted','=',false],
            ['school_department_name','like',"%{$request->search}%"]
        ])->paginate(10);

        return view('dashboard.schooldepartmentManagement.schooldepartmentIndex',compact('schooldepartments','search'));

    }

    public function add()
    {
         return view('dashboard.schooldepartmentManagement.schooldepartmentAdd');
    }

    public function store(Request $request)
    {
        $sValidationRules=[
            'departmentName' => 'required',

       ];
       $validator = Validator::make($request->all(), $sValidationRules);
       if ($validator->fails())
       {
          return redirect()->route('school-department.add')->withErrors($validator)->withInput();
       }
       if($request->departmentIsactive=='on')
       {
           $request->departmentIsactive = 1;
       }
       else
       {
           $request->departmentIsactive = 0;
       }
       $department= Schooldepartment::where([
        ['user_id','=',Session::get('user_details')['user_id']],
        ['school_id','=',Session::get('user_details')['school_id']],
        ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
        ['school_department_name','=',$request->departmentName],
        ['school_department_isDeleted','=',false]
       ])->get();

       if($department->count()>0)
       {
           return redirect()->route('school-department.add')->with('message','The department '.$request->departmentName.' already added, please check.')->withInput();
       }
       $department = new Schooldepartment;
       $department->school_id = Session::get('user_details')['school_id'];
       $department->user_id = Session::get('user_details')['user_id'];
       $department->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $department->school_department_isActive = $request->departmentIsactive;
       $department->school_department_name = $request->departmentName;
       $department->school_department_isDeleted = false;
       $department->save();
       return redirect()->route("school-department.index")->with('message','The '.$request->departmentName.' department added successfully.');



    }

    public function destroy($departmentId)
    {
        $department= Schooldepartment::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_department_isDeleted','=',false],
            ['school_department_id','=',$departmentId]
        ])->first();

        if (!empty($department)) {
            $department->school_department_isDeleted=true;
            $department->save();
            return response()->json([
                'flag' => true,
                'message' => 'The department '.$department->school_department_name.' has been deleted successfully.'
                    ], 200);


        }
        else {
            return response()->json([
                        'flag' => false,
                        'message' => 'Department Not Found.'
            ]);
        }

    }

    public function edit($departmentId)
    {
        $department= Schooldepartment::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_department_isDeleted','=',false],
            ['school_department_id','=',$departmentId]
        ])->first();
        if (!empty($department))
        {
            return view('dashboard.schooldepartmentManagement.schooldepartmentEdit',compact('department'));

        }

        abort(401, 'This action is unauthorized.');



    }

    public function update(Request $request, $departmentId)
    {
        $sValidationRules=[
            'departmentName' => 'required',

       ];
       $validator = Validator::make($request->all(), $sValidationRules);
       if ($validator->fails())
       {
          return redirect()->route('school-department.edit')->withErrors($validator)->withInput();
       }
       if($request->departmentIsactive=='on')
       {
           $request->departmentIsactive = 1;
       }
       else
       {
           $request->departmentIsactive = 0;
       }
       $department= Schooldepartment::where([
                ['school_id','=',Session::get('user_details')['school_id']],
                ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                ['user_id','=',Session::get('user_details')['user_id']],
                ['school_department_isDeleted','=',false],
                ['school_department_id','=',$departmentId]
            ])->first();
            if (!empty($department))
            {
                $department->school_department_isActive = $request->departmentIsactive;
                $department->school_department_name = $request->departmentName;
                 $department->save();
                 return redirect()->route("school-department.index")->with('message','The department '.$department->school_department_name.' has been updated successfully.');
            }

        abort(401, 'This action is unauthorized.');


    }



}

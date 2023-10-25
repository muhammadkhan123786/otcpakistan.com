<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Provinces;
use App\Models\User;
use App\Models\Schools;
use App\Models\SchoolsRegisteration;
use Image;
use Hash;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Database\Eloquent\Builder;

class SchoolRegisterationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:2');

    }

    public function index(Request $request)
    {
        $search=$request->search;
        $schools=Schools::query()->where([
            ['school_isdeleted','=',false],
            ['school_name','like',"%{$request->search}%"]
        ])->paginate(10);

        return view('dashboard.schoolsRegister.schoolregisterIndex',compact('schools','search'));
    }

    public function add()
    {


        $provinces = Provinces::select('provinceId','provinceName')->where('is_provinceDeleted',false)->get();
        $schools = Schools::select('school_id','school_name','school_address')->where('school_isdeleted',false)->get();

        //$cities = Cities::select('cityId','cityName')->where('is_cityDeleted',false)->get();
        return view('Home.schoolregisteration',compact('provinces','schools'));

    }


    public function addSchool(Request $request)
    {
                $request->validate([

                    'schoolstate' => 'required',
                    'schoolcity' => 'required',
                    'contactNumber' => 'required|unique:users',
                    'password' => 'required|confirmed|min:6',
                    'schoollogoimage' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:1000'],

                ]);

        if($request->schoolId=="others")
        {
            $school = new Schools;
            $schoolRegister = new SchoolsRegisteration;
            // school details.
           $school->school_name = $request->schoolname;
           $school->school_address = $request->schooladdress;
           $school->school_isdeleted = false;
           $school->school_isActive = true;
           $school->save();

           //school user
           $user= new User;
           $user->name=$request->schoolUserName;
           $user->contactNumber= $request->contactNumber;
           $user->account_is_verified=false;
           $user->account_is_deleted= false;
           $user->account_is_active =true;
           $user->role_id = 3;
           $user->date_created =\Carbon\Carbon::now()->format('y-m-d');
           $user->password=HASH::make($request->password);
           $user->save();

           // school register.
           $schoolRegister->school_id = $school->school_id;
           $schoolRegister->provinceId = $request->schoolstate;
           $schoolRegister->cityId = $request->schoolcity;
           $schoolRegister->user_id = $user->user_id;
           $schoolRegister->school_register_isDeleted = false;
           $schoolRegister->school_register_isActive = true;
           $path = public_path('images/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $name = time() . '.' . $request->schoollogoimage->extension();
            ResizeImage::make($request->file('schoollogoimage'))
            ->resize(100, 50)
            ->save($path . $name);
            $schoolRegister->school_logo =$name;
            $schoolRegister->save();


        }
        else
        {

            $user= new User;
            $user->name=$request->schoolUserName;
            $user->contactNumber= $request->contactNumber;
            $user->account_is_verified=false;
            $user->account_is_deleted= false;
            $user->account_is_active =true;
            $user->role_id = 3;
            $user->date_created =\Carbon\Carbon::now()->format('y-m-d');
            $user->password=HASH::make($request->password);
            $user->save();

            $schoolRegister = new SchoolsRegisteration;
            $schoolRegister->school_id = $request->schoolId;
            $schoolRegister->provinceId = $request->schoolstate;
            $schoolRegister->cityId = $request->schoolcity;
            $schoolRegister->user_id = $user->user_id;
            $schoolRegister->school_register_isDeleted = false;
            $schoolRegister->school_register_isActive = true;
            $path = public_path('images/');
             !is_dir($path) &&
                 mkdir($path, 0777, true);

             $name = time() . '.' . $request->schoollogoimage->extension();
             ResizeImage::make($request->file('schoollogoimage'))
             ->resize(100, 50)
             ->save($path . $name);
             $schoolRegister->school_logo =$name;
             $schoolRegister->save();

        }

        return redirect()->route('SchoolRegisteration.index')->with('message','The school '.$schoolRegister->school->school_name.' registered successfuly.');

    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = Cities::where("provinceId", $request->schoolstate)
                                    ->get(["cityName", "cityId"]);

        return response()->json($data);
    }

    public function destroy($id)
    {
             $school = Schools::findOrFail($id);
             if (!empty($school)) {
                 $school->school_isdeleted=true;
                 $school->save();
                 return response()->json([
                     'flag' => true,
                     'message' => 'The school '.$school->school_name.' has been deleted successfully.'
                         ], 200);


             }
             else {
                 return response()->json([
                             'flag' => false,
                             'message' => 'Data Not Found'
                 ]);
             }


    }



}

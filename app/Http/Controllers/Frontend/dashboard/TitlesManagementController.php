<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolBookTitles;
use Session;
use Validator;

class TitlesManagementController extends Controller
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

        $titles=SchoolBookTitles::query()->where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_titles_isDeleted','=',false],
            ['school_title_name','like',"%{$request->search}%"]
        ])->paginate(10);

        return view('dashboard.titles.schooltitlesIndex',compact('titles','search'));

    }

    public function add()
    {
        return view('dashboard.titles.schooltitleAdd');
    }

    public function store(Request $request)
    {
        $sValidationRules=[
            'titleName' => 'required',

       ];

       $validator = Validator::make($request->all(), $sValidationRules);
       if ($validator->fails())
       {
          return redirect()->route('school-title.add')->withErrors($validator)->withInput();
       }
       if($request->titleIsactive=='on')
       {
           $request->titleIsactive = 1;
       }
       else
       {
           $request->titleIsactive = 0;
       }
       $title= SchoolBookTitles::where([
        ['user_id','=',Session::get('user_details')['user_id']],
        ['school_id','=',Session::get('user_details')['school_id']],
        ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
        ['school_title_name','=',$request->titleName],
        ['school_titles_isDeleted','=',false]
       ])->get();

       if($title->count()>0)
       {
           return redirect()->route('school-title.add')->with('message','The title'.$request->titleName.' already added, please check.')->withInput();
       }

       $title = new SchoolBookTitles;
       $title->school_id = Session::get('user_details')['school_id'];
       $title->user_id = Session::get('user_details')['user_id'];
       $title->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $title->school_titles_isActive = $request->titleIsactive;
       $title->school_title_name = $request->titleName;
       $title->school_titles_isDeleted = false;
       $title->save();
       return redirect()->route("school-title.index")->with('message','The '.$request->titleName.' added successfully.');
    }

    public function Edit($titleId)
    {
        $title= SchoolBookTitles::where([
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['school_titles_isDeleted','=',false],
            ['school_titles_id','=',$titleId]
        ])->first();

        return view('dashboard.titles.schooltitleEdit',compact('title'));


    }

    public function update(Request $request, $titleId)
    {
        $sValidationRules=[
            'titleName' => 'required',

       ];

       $validator = Validator::make($request->all(), $sValidationRules);
       if ($validator->fails())
       {
          return redirect()->route('school-title.add')->withErrors($validator)->withInput();
       }

       if($request->titleIsactive=='on')
       {
           $request->titleIsactive = 1;
       }
       else
       {
           $request->titleIsactive = 0;
       }
        $title_check= SchoolBookTitles::where([
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['school_title_name','=',$request->titleName],
            ['school_titles_isDeleted','=',false],
            ['school_titles_id','!=',$titleId]
        ])->get();

        if($title_check->count()>0)
        {
            return redirect()->route('school-title.edit',$titleId)->with('message','The title '.$request->titleName.' already added, please check.')->withInput();
        }

        $title= SchoolBookTitles::where([
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['school_titles_isDeleted','=',false],
            ['school_titles_id','=',$titleId]
        ])->first();

        $title->school_title_name=$request->titleName;
        $title->school_titles_isActive = $request->titleIsactive;
        $title->save();

        return redirect()->route('school-title.index')->with('message','The Title '.$request->titleName.' updated successfully.');
    }



}

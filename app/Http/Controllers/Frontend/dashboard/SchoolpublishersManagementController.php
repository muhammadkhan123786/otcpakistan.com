<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schoolpublishers;
use Session;
use Validator;


class SchoolpublishersManagementController extends Controller
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

        $publishers=Schoolpublishers::query()->where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_publisher_isDeleted','=',false],
            ['school_publisher_name','like',"%{$request->search}%"]
        ])->paginate(10);

        return view('dashboard.publishers.schoolpublisherIndex',compact('publishers','search'));

    }

    public function add()
    {
        return view('dashboard.publishers.schoolpublisherAdd');
    }

    public function store(Request $request)
    {

        $sValidationRules=[
            'publisherName' => 'required',
            'publisherContactNumber' => ['required','numeric','min:11'],
            'publisherwhatsappNumber' => ['required','numeric','min:11'],
            'publisheremail' => ['email'],
            'publisheraddress' => 'required',
            'publisherIsactive' => 'required'
       ];

       $validator = Validator::make($request->all(), $sValidationRules);
       if ($validator->fails())
       {
          return redirect()->route('school-publisher.add')->withErrors($validator)->withInput();
       }

       if($request->publisherIsactive=='on')
       {
           $request->publisherIsactive = 1;
       }
       else
       {
           $request->publisherIsactive = 0;
       }

            $publisher= Schoolpublishers::where([
                ['school_id','=',Session::get('user_details')['school_id']],
                ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                ['user_id','=',Session::get('user_details')['user_id']],
                ['school_publisher_isDeleted','=',false],
                ['school_publisher_name','=',$request->publisherName]
                ])->first();


            if(!empty($publisher))
            {
                return redirect()->route('school-publisher.add')->with('message','The '.$request->publisherName.' already exists')->withInput();
            }

            $publisher = new Schoolpublishers;

            $publisher->school_id = Session::get('user_details')['school_id'];
            $publisher->user_id = Session::get('user_details')['user_id'];
            $publisher->schoolregister_id = Session::get('user_details')['school_reg_id'];
            $publisher->school_publisher_isActive = $request->publisherIsactive;
            $publisher->school_publisher_isDeleted = false;

            $publisher->school_publisher_name = $request->publisherName;
            $publisher->school_publisher_address = $request->publisheraddress;
            $publisher->school_publisher_contact_number =$request->publisherContactNumber;
            $publisher->school_publisher_whatsapp_number =$request->publisherwhatsappNumber;
            $publisher->school_publisher_website = $request->publisherwebsite;
            $publisher->school_publisher_email_id = $request->publisheremail;
            $publisher->save();

            return redirect()->route('school-publisher.index')->with('message','The publisher'.$request->publisherName.' added successfully.');

    }

    public function edit($publisherId)
    {
        $publisher= Schoolpublishers::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_publisher_isDeleted','=',false],
            ['school_publisher_id','=',$publisherId]
            ])->first();

            return view('dashboard.publishers.schoolpublisherEdit',compact('publisher'));

    }

    public function update(Request $request, $publisherId)
    {
        $sValidationRules=[
            'publisherName' => 'required',
            'publisherContactNumber' => ['required','numeric','min:11'],
            'publisherwhatsappNumber' => ['required','numeric','min:11'],
            'publisheremail' => ['email'],
            'publisheraddress' => 'required',
            'publisherIsactive' => 'required'
       ];
       $validator = Validator::make($request->all(), $sValidationRules);

       if ($validator->fails())
       {
          return redirect()->route('school-publisher.edit')->withErrors($validator)->withInput();
       }

       if($request->publisherIsactive=='on')
       {
           $request->publisherIsactive = 1;
       }
       else
       {
           $request->publisherIsactive = 0;
       }
       $publisher= Schoolpublishers::where([
        ['school_id','=',Session::get('user_details')['school_id']],
        ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
        ['user_id','=',Session::get('user_details')['user_id']],
        ['school_publisher_isDeleted','=',false],
        ['school_publisher_id','=',$publisherId]
        ])->first();

        if(!empty($publisher))
        {
            $publisher->school_publisher_isActive = $request->publisherIsactive;
            $publisher->school_publisher_name = $request->publisherName;
            $publisher->school_publisher_address = $request->publisheraddress;
            $publisher->school_publisher_contact_number =$request->publisherContactNumber;
            $publisher->school_publisher_whatsapp_number =$request->publisherwhatsappNumber;
            $publisher->school_publisher_website = $request->publisherwebsite;
            $publisher->school_publisher_email_id = $request->publisherEmail;
            $publisher->save();
        }

        return redirect()->route("school-publisher.index")->with('message','The publisher '.$request->publisherName.' has been updated successfully.');

    }

    public function destroy($publisherId)
    {
        $publisher= Schoolpublishers::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_publisher_isDeleted','=',false],
            ['school_publisher_id','=',$publisherId]
        ])->first();

        if (!empty($publisher)) {
            $publisher->school_publisher_isDeleted=true;
            $publisher->save();
            return response()->json([
                'flag' => true,
                'message' => 'The publisher '.$publisher->school_publisher_name.' has been deleted successfully.'
                    ], 200);
        }
        else {
            return response()->json([
                        'flag' => false,
                        'message' => 'Publisher Not Found.'
            ]);
        }

    }

    public function details($publisherId)
    {
        $publisher= Schoolpublishers::where([
            ['school_id','=',Session::get('user_details')['school_id']],
            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
            ['user_id','=',Session::get('user_details')['user_id']],
            ['school_publisher_isDeleted','=',false],
            ['school_publisher_id','=',$publisherId]
        ])->first();

        if(!empty($publisher)) {

            return view('dashboard.publishers.schoolpublisherDetails',compact('publisher'));

        }

    }


}

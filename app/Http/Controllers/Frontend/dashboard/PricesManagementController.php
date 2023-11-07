<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolclassPrices;
use App\Models\Schooldepartment;
use App\Models\Schoolpublishers;
use App\Models\SchoolBookTitles;
use App\Models\SchoolClasses;
use Image;
use Hash;
use Intervention\Image\Facades\Image as ResizeImage;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;



class PricesManagementController extends Controller
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
        $schoolPrices = DB::table('schoolclass_prices')
                            ->join('school_classes', 'schoolclass_prices.school_class_id', '=', 'school_classes.school_class_id')
                            ->join('school_book_titles','schoolclass_prices.school_titles_id','=','school_book_titles.school_titles_id')
                            ->join('schooldepartments','schoolclass_prices.school_department_id','=','schooldepartments.school_department_id')
                            ->join('schoolpublishers','schoolclass_prices.school_publisher_id','=','schoolpublishers.school_publisher_id')
                ->select('schoolclass_prices.*', 'school_classes.school_class_name','school_titles.school_title_name','schooldepartments.school_department_name','schoolpublishers.school_publisher_name')->where([
                    ['schoolclass_prices.school_id','=',Session::get('user_details')['school_id']],
                    ['schoolclass_prices.schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                    ['schoolclass_prices.user_id','=',Session::get('user_details')['user_id']],
                    ['school_classes.school_class_isDeleted','=',false],
                    ['school_classes.school_class_name','like',"%{$request->search}%"]
                ])->paginate(10);

        return view('dashboard.schoolpricesmanagement.schoolpriceIndex',compact('schoolPrices','search'));

    }

    public function add()
    {

        $departments =Schooldepartment::select('school_department_id','school_department_name')->where([
                                            ['school_department_isDeleted',false],
                                            ['school_id','=',Session::get('user_details')['school_id']],
                                            ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                                            ['user_id','=',Session::get('user_details')['user_id']],
                                            ])->get();
        $publishers =Schoolpublishers::select('school_publisher_id','school_publisher_name')->where([
                                                    ['school_publisher_isDeleted',false],
                                                    ['school_id','=',Session::get('user_details')['school_id']],
                                                    ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                                                    ['user_id','=',Session::get('user_details')['user_id']],
                                                    ])->get();
        $classes = SchoolClasses::select('school_class_id','school_class_name')->where([
                                        ['school_class_isDeleted',false],
                                        ['school_id','=',Session::get('user_details')['school_id']],
                                        ['schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                                        ['user_id','=',Session::get('user_details')['user_id']],
                                      ])->get();

        $titles =  DB::table('school_book_titles')->leftJoin('schoolclass_prices','school_book_titles.school_titles_id','=','schoolclass_prices.school_titles_id')
                           ->select('school_book_titles.school_titles_id','school_book_titles.school_title_name')
                           ->where([
                            ['school_book_titles.school_id','=',Session::get('user_details')['school_id']],
                            ['school_book_titles.schoolregister_id','=',Session::get('user_details')['school_reg_id']],
                            ['school_book_titles.user_id','=',Session::get('user_details')['user_id']],
                            ['school_book_titles.school_titles_isDeleted','=',false],
                           ])->whereNull(["schoolclass_prices.school_titles_id"])->get();


        //$titles =SchoolBookTitles::select('school_titles_id','school_title_name')->where('school_titles_isDeleted',false)->get();

        return view('dashboard.schoolpricesmanagement.schoolpriceAdd',compact('departments','publishers','classes','titles'));


    }

    public function store(Request $request)
    {

        $sValidationRules=[
            'titleId' => 'required',
            'classid' => 'required',
            'departmentId' => 'required',
            'publisherId' =>  'required',
            'unitCostPrice' => ['required','numeric','between:1,99999999999999'],
            'unitSalePrice' => ['required','numeric','between:1,99999999999999'],
            'discountamount' => ['required','numeric','between:1,99999999999999'],
            'Quantity' =>'required',
            'image' =>['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],

       ];
       $validator = Validator::make($request->all(), $sValidationRules);

       if ($validator->fails())
       {

          return redirect()->route('school.prices.add')->withErrors($validator)->withInput();
       }

       if($request->unitSalePrice < $request->unitCostPrice)
       {

             return redirect()->route('school.prices.add')->with('message','Sale price can not be less than cost price. ')->withInput();
       }
       $price = new SchoolclassPrices;
       $price->school_id = Session::get('user_details')['school_id'];
       $price->schoolregister_id = Session::get('user_details')['school_reg_id'];
       $price->user_id = Session::get('user_details')['user_id'];
       $price->school_price_isActive = true;
       $price->school_price_isDeleted = false;
       $price->school_unit_price = $request->unitSalePrice;
       $price->school_cost_price = $request->unitCostPrice;
       $price->school_discount_price =  $request->unitCostPrice;
       $price->school_qty = $request->Quantity;
       $price->school_class_id= $request->classid;
       $price->school_department_id = $request->departmentId;
       $price->school_titles_id = $request->titleId;
       $price->school_publisher_id = $request->publisherId;

       if($request->image)
       {
                $path = public_path('images/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                $name = time() . '.' . $request->image->extension();
                ResizeImage::make($request->file('image'))
                ->resize(100, 100)
                ->save($path . $name);
            $price->subject_image = $name;

       }
       $price->save();
       return redirect()->route('school.prices.index')->with('message','The price has been added successfully.');

    }


}

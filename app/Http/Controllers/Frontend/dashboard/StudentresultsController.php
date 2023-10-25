<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentresultsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1');

    }
    public function index()
    {
         return view('dashboard.studentsresults.studentResultIndex');
    }
}

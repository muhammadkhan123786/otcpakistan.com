<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentCompetitionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1');

    }
    public function index()
    {
       return view('dashboard.competitions.studentCompetitionIndex');
    }
}

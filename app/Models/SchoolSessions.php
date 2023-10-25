<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSessions extends Model
{
    use HasFactory;
    protected $primaryKey='school_sessions_id';

    protected $fillable = [

        'school_id',
        'schoolregister_id',
        'user_id',
        'school_session_isActive',
        'school_session_isDeleted',
        'school_session_name',
        'school_session_startDate',
        'school_session_endDate',


    ];


}

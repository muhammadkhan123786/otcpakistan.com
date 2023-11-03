<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schooldepartment extends Model
{
    use HasFactory;
    protected $primaryKey='school_department_id';
    protected $fillable = [
        'school_id',
        'schoolregister_id',
        'user_id',
        'school_department_isActive',
        'school_department_isDeleted',
        'school_department_name',
    ];



}

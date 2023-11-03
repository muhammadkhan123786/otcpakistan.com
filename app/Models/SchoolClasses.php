<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClasses extends Model
{
    use HasFactory;
    protected $primaryKey='school_class_id';
    protected $fillable = [

        'school_id',
        'schoolregister_id',
        'user_id',
        'school_class_isActive',
        'school_class_isDeleted',
        'school_class_name',
    ];
}

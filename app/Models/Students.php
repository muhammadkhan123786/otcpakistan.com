<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $primaryKey='student_id';

    protected $fillable = [
        'student_name',
        'user_id',
        'class_id',
        'school_id',
        'student_isSubcribed',
        'student_isdeleted'
    ];

    public function student_class()
    {
       return $this->hasOne('App\Models\Classes','class_id','class_id');
    }

    public function student_school()
    {
       return $this->hasOne('App\Models\Schools','school_id','school_id');
    }

    public function student_user()
    {
       return $this->hasOne('App\Models\User','user_id','user_id');
    }





}

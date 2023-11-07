<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolsRegisteration extends Model
{
    use HasFactory;
    protected $primaryKey='schoolregister_id';
    protected $table = 'schools_registerations';


    protected $fillable = [
        'school_id',
        'provinceId',
        'cityId',
        'user_id',
        'school_logo',
        'school_register_isDeleted',
        'school_register_isActive'
    ];

    public function province()
     {
        return $this->hasOne('App\Models\Provinces','provinceId','provinceId');
     }

     public function city()
     {
        return $this->hasOne('App\Models\Cities','cityId','cityId');
     }

     public function user()
     {
        return $this->hasOne('App\Models\User','user_id','user_id');
     }

     public function school()
     {
        return $this->hasOne('App\Models\Schools','school_id','school_id');
     }

}

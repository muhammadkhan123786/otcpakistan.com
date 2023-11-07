<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolclassPrices extends Model
{
    use HasFactory;
    protected $primaryKey='school_class_price_id';
    protected $table = 'schoolclass_prices';
    protected $fillable = [
        'school_id',
        'schoolregister_id',
        'user_id',
        'school_price_isActive',
        'school_price_isDeleted',
        'school_unit_price',
        'school_cost_price',
        'school_discount_price',
        'school_qty',
        'school_class_id',
        'school_department_id',
        'school_titles_id',
        'school_publisher_id',
        'subject_image',


    ];

    public function class()
    {
       return $this->hasOne('App\Models\SchoolClasses','school_class_id','school_class_id');
    }

    public function department()
    {
       return $this->hasOne('App\Models\Schooldepartment','school_department_id','school_department_id');
    }

    public function title()
    {
       return $this->hasOne('App\Models\SchoolBookTitles','school_titles_id','school_titles_id');
    }

    public function publisher()
    {
       return $this->hasOne('App\Models\Schoolpublishers','school_publisher_id','school_publisher_id');
    }



}

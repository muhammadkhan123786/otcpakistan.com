<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $primaryKey='cityId';
    protected $fillable = [
        'cityName',
        'is_cityDeleted',
        'is_cityActive',
        'provinceId'
    ];

    public function province()
     {
        return $this->hasOne('App\Models\Provinces','provinceId','provinceId');
     }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{

    use HasFactory;
    protected $primaryKey='provinceId';
    protected $table = 'provinces';

    protected $fillable = [
        'provinceName',
        'is_provinceDeleted',
        'is_provinceActive',
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBookTitles extends Model
{
    use HasFactory;
    protected $primaryKey='school_titles_id';
    protected $table = 'school_book_titles';

    protected $fillable = [

        'school_id',
        'schoolregister_id',
        'user_id',
        'school_titles_isActive',
        'school_titles_isDeleted',
        'school_title_name',

    ];


}

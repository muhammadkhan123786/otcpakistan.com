<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolpublishers extends Model
{
    use HasFactory;

    protected $primaryKey='school_publisher_id';
    protected $table = 'schoolpublishers';

    protected $fillable = [
        'school_id',
        'schoolregister_id',
        'user_id',
        'school_publisher_isActive',
        'school_publisher_isDeleted',
        'school_publisher_name',
        'school_publisher_address',
        'school_publisher_contact_number',
        'school_publisher_email_id',
        'school_publisher_website',
        'school_publisher_whatsapp_number',
    ];




}

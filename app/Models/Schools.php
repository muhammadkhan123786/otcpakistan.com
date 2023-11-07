<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schools extends Model
{
    use HasFactory;
    protected $primaryKey='school_id';
    protected $table = 'schools';

    protected $fillable = [
        'school_name',
        'school_address',
        'school_isdeleted',
        'school_isActive',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;

   protected $fillable = [
        'user_id',
        'name',
        'description',
        'status',
        'qr_code',
        'image',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

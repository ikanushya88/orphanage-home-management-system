<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'logo', 'about', 'cover_photo', 'contact_number', 'email', 'address', 'document', 'created_by', 'verified_by',
    ];
}

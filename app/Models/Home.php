<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'logo', 'about', 'cover_photo', 'contact_number', 'email', 'address', 'document', 'created_by', 'verified_by',
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

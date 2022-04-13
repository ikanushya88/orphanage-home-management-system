<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feed extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'type', 'title', 'content', 'amount', 'expires_at', 'slug', 'approved_by', 'approved_at', 'home_id', 'cover_image', 'status'];

    public function home() {
        return $this->belongsTo(Home::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}

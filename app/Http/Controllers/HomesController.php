<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function create() {
        // 'name', 'slug', 'logo', 'about', 'cover_photo', 'contact_number', 'email', 'address', 'document', 'created_by', 'verified_by',
        Home::create(request()->all());
    }
}

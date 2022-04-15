<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'feed_id', 'transaction_id', 'amount', 'purchase_units', 'payer', 'links', 'status', ];
}

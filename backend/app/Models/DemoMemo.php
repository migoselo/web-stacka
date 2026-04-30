<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoMemo extends Model
{
    protected $table = 'demo_memos';
    protected $fillable = ['type', 'content', 'anonymous_user_id', 'expires_at'];
    public $timestamps = false; // karena kita pakai created_at manual, bukan updated_at
    protected $casts = [
        'created_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
}

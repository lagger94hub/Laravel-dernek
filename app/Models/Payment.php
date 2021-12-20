<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

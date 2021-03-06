<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    # one to many inverse
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

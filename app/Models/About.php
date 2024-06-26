<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_me',
        'pr',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

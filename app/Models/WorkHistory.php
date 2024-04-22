<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'name',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

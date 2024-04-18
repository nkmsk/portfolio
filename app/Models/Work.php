<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'lan_front',
        'lan_back',
        'database',
        'description',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function work_images()
    {
        return $this->hasMany(WorkImage::class);
    }
}

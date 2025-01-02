<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarships extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'amount',
        'deadline',
    ];

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }
}

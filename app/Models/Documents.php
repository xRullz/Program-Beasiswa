<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'file_path',
    ];

    public function application()
    {
        return $this->belongsTo(Applications::class);
    }
}

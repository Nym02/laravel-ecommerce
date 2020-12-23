<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'desc',
        'image'
    ];
}

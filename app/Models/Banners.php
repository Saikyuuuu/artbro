<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;

    protected $id = 'id';
    protected $table = 'banners';

    protected $fillable = [
        'id',
        'imagePath',
        "isActive",
        "created_at",
        "updated_at",
    ];
}

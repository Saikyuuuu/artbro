<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $id = 'orderID';
    protected $table = 'orders';

    protected $fillable = [
        'orderID',
        'userID',
        'projectID',
        'status',
        'messageFromArtist',
        'messageFromClient',
        'imagePath'
    ];
}

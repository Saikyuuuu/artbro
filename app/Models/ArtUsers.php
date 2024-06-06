<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtUsers extends Model
{
    use HasFactory;

    protected $id = 'userID';
    protected $table = 'art_users';

    protected $fillable = [
        'userID',
        'email',
        "firstName",
        "middleName",
        "lastName",
        'password',
        'address',
        'birthDate',
        'phoneNumber',
        'userType',
    ];
}

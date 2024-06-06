<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalPayment extends Model
{
    use HasFactory;

    protected $id = 'paymentID';
    protected $table = 'local_payments';

    protected $fillable = [
        'paymentID',
        'paymentName',
        'clientID',
        'secret',
        'imagePath',
        'status',
    ];
}

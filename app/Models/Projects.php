<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $id = 'projectID';
    protected $table = 'projects';

    protected $fillable = [
        'userID',
        'projectID',
        "customerID",
        "projectName",
        "projectType",
        'pricing',
        'dueDate',
        'startDate',
        'notes',
        'status',
    ];
}

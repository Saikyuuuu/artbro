<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleProjects extends Model
{
    use HasFactory;

    protected $id = 'id';
    protected $table = 'sample_projects';

    protected $fillable = [
        'id',
        'img_data',
        'art_name',
        'artist',
        'price',
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProjects extends Model
{
    use HasFactory;
    protected $id = 'featureID';
    protected $table = 'featured_projects';

    protected $fillable = [
        'featureID',
        'projectID',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFiles extends Model
{
    use HasFactory;
    protected $id = 'projectFileID';
    protected $table = 'project_files';

    protected $fillable = [
        'userID',
        'projectFileID',
        'filePath'
    ];
}

<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobTitles extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'upload_file_path',
        'notes',
    ];
    
}

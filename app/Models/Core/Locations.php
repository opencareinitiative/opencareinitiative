<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locations extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'status',
        'external_code',
        'name',
        'address',
        'address2',
        'town',
        'state',
        'postcode',
        'country',
    ];
}

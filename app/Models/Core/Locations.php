<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Locations extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }
    
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

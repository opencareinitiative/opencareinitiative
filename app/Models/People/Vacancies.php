<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Core\Locations;
use App\Models\User;

class Vacancies extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'status',
        'contact_person',
        'vacancy_location',
        'job_title',
        'external_code',
        'name',
        'description',
        'available_vacancies',
        'opening_date',
        'closing_date',
    ];
    
    protected $appends = [
        'location_name',
        'contact_name',
        'job_title_name'
        
    ];
    
    
    public function get_location()
    {
        return $this->BelongsTo(Locations::class,'vacancy_location','id');
    }
    
    
    public function getLocationNameAttribute()
    {
        return $this->get_location->name;
    }
    
    public function get_contact()
    {
        return $this->BelongsTo(User::class,'contact_person','id');
    }
    
    
    public function getContactNameAttribute()
    {
        return "{$this->get_contact->first_name} {$this->get_contact->last_name}";
    }
    public function getContactPersonttribute()
    {
        return "{$this->get_contact->first_name} {$this->get_contact->last_name}";
    }
    
    public function get_job_title()
    {
        return $this->BelongsTo(JobTitles::class,'job_title','id');
    }
    
    
    public function getJobTitleNameAttribute()
    {
        return $this->get_job_title->name;
    }
}

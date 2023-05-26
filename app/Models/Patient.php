<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'locality_id',
        'name',
        'gender',
        'dob',
        'designation',
        'blood_group',
        'contact_no',
        'about',
    ];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function getPatientNameUuidAttribute()
    {
        return $this->uuid . ', ' . $this->name;
    }
}

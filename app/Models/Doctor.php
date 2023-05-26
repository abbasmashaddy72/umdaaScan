<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'locality_id',
        'gender',
        'contact_no',
        'qualification',
        'registration_no',
        'department',
        'registration_fee',
        'consultation_fee',
        'review_link',
        'about',
        'career_start_date',
    ];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }
}

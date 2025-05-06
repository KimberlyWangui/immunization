<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'first_name', 
        'guardian_id', 
        'gender', 
        'immunization_status', 
        'last_vaccine_received', 
        'next_appointment_date', 
        'date_of_birth', 
        'nationality',
    ];

    /**
     * Define the relationship with the guardian.
     */
    public function guardian()
    {
        return $this->belongsTo(User::class, 'guardian_id');
    }
    /**
     * Define the relationship with appointments.
     */
    public function appointments()     {         
        return $this->hasMany(Appointment::class);     
    }
}

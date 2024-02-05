<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['appointment_external_id', 'appointment_date', 'timezone', 'type', 'provider_external_id', 'provider_name', 'location_external_id', 'user_external_id', 'meeting_id', 'meeting_password'];
}

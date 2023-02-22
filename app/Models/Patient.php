<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'contact_number',
        'first_name',
        'last_name',
        'address',
        'details'
    ];
}

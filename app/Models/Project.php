<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile',
        'address',
        'unit',
        'floor',
        's_charge',
        'agreement_date',
        'email',
        'details',
        'status',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'ref',
        'project_id',
        'address',
        'unit',
        'agreement',
        'bill_month',
        's_charge',
        'status',
    ];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'income_item_id',
    ];
    public function Income(){
        return $this->hasMany(Income::class);
    }
}

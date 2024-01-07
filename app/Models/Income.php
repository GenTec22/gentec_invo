<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = [
        'income_item_id',
        'particular',
        'qty',
        'amount',
    ];

    public function IncomeItem(){
        return $this->belongsTo(IncomeItem::class);
    }
}

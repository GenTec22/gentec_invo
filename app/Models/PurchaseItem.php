<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_item_id',
        'name',
    ];
    public function Purchase(){
        return $this->hasMany(Purchase::class);
    }
}

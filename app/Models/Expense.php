<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;


    public function ExpenseItem(){
        return $this->belongsTo(ExpenseItem::class);
    }
}

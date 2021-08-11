<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    public $fillable = ['time', 'saleNumber', 'description', 'amount', 'currency', 'link'];
}

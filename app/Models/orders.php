<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class orders extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity', 'price'];
}

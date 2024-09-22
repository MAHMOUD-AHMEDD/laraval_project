<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $fillable=[
      'title',
      'type',
        'info',
        'user_id'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class,'ticket_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class,'users');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = "lists";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function todo(){
        return $this->hasMany(Todo::class);
    }
}

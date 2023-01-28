<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'specialization',
        'phone',
        'updated_at',
        'created_at',
    ];

    public function members(){
        return $this->hasMany(Member::class);
    }
}

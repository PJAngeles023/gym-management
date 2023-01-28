<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'email',
        'membership_type',
        'membership_expiration',
    ];
    public function trainer(){
        return $this->belongsTo(Trainer::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function assignTrainer($membership_type)
    {
        $trainer = Trainer::where('specialization', $membership_type)->first();
        $this->trainer()->associate($trainer);
        $this->save();
    }
}

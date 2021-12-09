<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    use HasFactory;

    protected $table = 'verify_users';

    protected $fillable = [
        'token',
        'user_id',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
}

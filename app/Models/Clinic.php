<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    
    protected $table = 'clinics';
    protected $guarded =[];

    public function clinic()
    {
        return $this->hasOne(Clinic::class);
    }  
}

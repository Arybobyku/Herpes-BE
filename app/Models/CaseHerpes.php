<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseHerpes extends Model
{
    use HasFactory;
    protected $fillable = [
        'disease_id',
        'confidence_level',
        'age',
        'gender',
    ];

    public function disease(){
        return $this->hasOne(Disease::class,'id','disease_id');
    }

        
    public function casesPivots(){
        return $this->hasMany(CasePivot::class,'case_id','id');
    }
}

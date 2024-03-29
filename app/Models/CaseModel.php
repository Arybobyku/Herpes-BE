<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'disease_id',
        'confidence_level',
        'age',
        'gender',
    ];

    public function disease(){
        return $this->hasOne(Disease::class,'id','disease_id');
    }
}

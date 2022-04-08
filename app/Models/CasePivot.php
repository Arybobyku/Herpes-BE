<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasePivot extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'case_id',
        'weight',
        'sympthon_id'
    ];

    public function cases(){
        return $this->belongsToMany(CaseModel::class,'case_id','id');
    }
    
    public function sympthons(){
        return $this->belongsToMany(Solution::class,'casepivot_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'gender', 'age','mobile_no','blood_group','positive_date','negative_date','state_id','city_id',
    ];
    public function state() {
        return $this->belongsTo('App\Models\state');
    }
    public function city() {
        return $this->belongsTo('App\Models\city');
    }
}

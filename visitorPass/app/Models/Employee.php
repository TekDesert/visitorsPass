<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'natureofvisit',
            'date',
            'starttime',
            'endtime',
            'type',
            'companyname',
            'personname',
            'mobilenumber',
            'otherpeople',
            'imageprofile',
    ];
}

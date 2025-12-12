<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'dbo.Employee';
    protected $primaryKey = 'FingerPrintID';

    public $timestamps = false;

    protected $fillable = [
        'FingerPrintID',
        'EmployeeName'
    ];
}

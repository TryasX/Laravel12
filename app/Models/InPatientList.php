<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InPatientList extends Model
{
     protected $connection = 'sqlsrv';

    // Full database.schema.view
    protected $table = 'Santosacare.dbo.PasienDalamPerawatan';

    // Primary key sekarang NoMR
    protected $primaryKey = 'NoMR';
    public $incrementing = false; // karena NoMR bukan auto-increment

    public $timestamps = false; // view biasanya tanpa timestamps

    // Nonaktifkan update/save karena read-only
    protected static function boot()
    {
        parent::boot();

        static::saving(function () {
            return false;
        });
    }
}

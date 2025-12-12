<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'dbo.Users';
    protected $primaryKey = 'FingerPrintID';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'FingerPrintID',
        'UserPassword',
    ];

    // === FIX PENTING ===
    public function getAuthPassword()
    {
        return $this->UserPassword;
    }

    // Hilangkan remember_token (sesuai kebutuhan kamu)
    public function getRememberTokenName()
    {
        return null;
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'FingerPrintID', 'FingerPrintID');
    }

}

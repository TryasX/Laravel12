<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class VBUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        return \App\Models\User::find($identifier);
    }

    public function retrieveByToken($identifier, $token) {}

    public function updateRememberToken(Authenticatable $user, $token) {}

    public function retrieveByCredentials(array $credentials)
    {
       //dd($credentials);

        return \App\Models\User::where('FingerPrintID', $credentials['FingerPrintID'] ?? null)->first();
    }

  public function validateCredentials(Authenticatable $user, array $credentials)
{
    // $enc = vb_encrypt($credentials['password']);
    // return $user->UserPassword === $enc;
    // dd([
    //     'input_raw' => $credentials['password'],
    //     'input_encrypted' => vb_encrypt($credentials['password']),
    //     'db_password' => $user->UserPassword,
    // ]);

    return $user->UserPassword === vb_encrypt($credentials['password']);
}

    // 🚫 Tidak pakai rehash (karena algoritma custom)
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
    {
        return;
    }
}

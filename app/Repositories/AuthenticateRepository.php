<?php

namespace App\Repositories;

use App\Repositories\Interface\AuthenticateRepositoryInterface;
use Illuminate\Support\Facades\DB;


class AuthenticateRepository implements AuthenticateRepositoryInterface
{

    public function postRegist($name, $email, $hash, $picture)
    {
        return  DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'picture' => $picture,
        ]);
    }

    public function postRegist2($name, $email, $hash, $urlPicture)
    {
        return  DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'picture' => $urlPicture,
        ]);
    }
}

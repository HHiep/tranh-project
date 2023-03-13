<?php

namespace App\Repositories;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UsersRepository implements UsersRepositoryInterface
{
    public function getUsersByMail($email)
    {
        return DB::table('users')
            ->select('*')
            ->where('email', $email)
            ->first();
    }

    public function getUsers($name)
    {
        return DB::table('users')
            ->select('*')->whereIn('role', [1, 9])
            ->where('name', 'like', "%$name%")
            ->paginate(5);
    }

    public function getUsers1($name)
    {
        return DB::table('users')
            ->select('*')->where('role', 0)
            ->where('name', 'like', "%$name%")
            ->paginate(5);
    }

    public function postInsertUsers($name, $urlPicture, $email, $hash, $role)
    {
        return DB::table('users')
            ->insert([
                'name' => $name,
                'picture' => $urlPicture,
                'email' => $email,
                'password' => $hash,
                'role' => $role
            ]);
    }

    public function getDeletedUsers($id)
    {
        return  DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function postProfileUpdateUser($id, $name, $email, $urlPicture)
    {
        return   DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'picture' => $urlPicture,
            ]);
    }

    public function postProfileUpdateUser1($id, $name, $email, $password, $urlPicture)
    {
        return   DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'picture' => $urlPicture,
            ]);
    }
}

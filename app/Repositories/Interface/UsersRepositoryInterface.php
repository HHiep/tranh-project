<?php

namespace App\Repositories\Interface;


interface UsersRepositoryInterface
{
    public function getUsers($name);
    public function getUsers1($name);
    public function postInsertUsers($name,$urlPicture,$email,$hash,$role);
    public function getDeletedUsers($id);
    public function postProfileUpdateUser($id, $name, $email, $urlPicture);
    public function postProfileUpdateUser1($id, $name, $email,$password, $urlPicture);
    function getUsersByMail($email);
}

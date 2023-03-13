<?php

namespace App\Repositories\Interface;


interface AuthenticateRepositoryInterface
{
    public function postRegist($name, $email, $hash, $picture);
    public function postRegist2($name, $email, $hash, $urlPicture);
}

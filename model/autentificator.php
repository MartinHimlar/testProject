<?php

class autentificator
{
    private $users;

    public function __construct()
    {
        $this->users = new userRepository();
    }

    public function autentificate($username, $password)
    {
        $result = $this->users->getUser($username);
        $time = new DateTime();
        if($result && ($result['password'] === sha1($password))){
            $this->users->updateLogTime($time);
        } else {
            throw new badUsernameOrPasswordException('Špatné uživatelské jméno nebo heslo!');
        }
        return array('userId' => $result['id'], 'token' => sha1($time->format('d.m.Y')));
    }
}

class badUsernameOrPasswordException extends \Exception {}
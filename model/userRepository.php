<?php

const DB_TABLE = 'users';

class userRepository
{

    public function getUser($username)
    {
        $sql = "SELECT * FROM " . DB_TABLE . " WHERE username LIKE ?";
        return database::get($sql, array($username));
    }

    public function findUsers()
    {
        $sql = "SELECT * FROM " . DB_TABLE;
        return database::find($sql);
    }

    public function addUser($user, $pass)
    {
        $sql = "INSERT INTO  " . DB_TABLE . " ( (username, password) VALUES (?, ?)";
        return database::insert($sql, array($user, sha1($pass)));
    }

    public function updateLogTime($time)
    {}
}
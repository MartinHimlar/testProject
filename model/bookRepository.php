<?php

const DB_TABLE = 'articles';

class bookRepository
{
    public function getArticle($id)
    {
    }

    public function findArticles($viewCount = 10)
    {
        $sql = "SELECT * FROM " . DB_TABLE . " ORDER BY id DESC LIMIT ?";
        return database::find($sql, array($viewCount));
    }

    public function addArticle($title, $text, $userId)
    {
        $sql = "INSERT INTO " . DB_TABLE . " (title, text, user_id, created) VALUES (?, ?, ?, ?)";
        return database::insert($sql, array($title, $text, $userId, ''));
    }
}
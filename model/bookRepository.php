<?php

const DB_TABLE_ARTICLES = 'articles';

class bookRepository
{
    public function getArticle($id)
    {
        $sql = "SELECT * FROM " . DB_TABLE_ARTICLES . " WHERE id LIKE ?";
        return database::get($sql, array($id));
    }

    public function findArticles($viewCount = FALSE)
    {
        $sql = "SELECT * FROM " . DB_TABLE_ARTICLES . " ORDER BY id DESC";
        $sql = $viewCount ? $sql . " LIMIT ?" : $sql;
        return database::find($sql, array($viewCount));
    }

    public function addArticle($title, $text, $userId)
    {
        $sql = "INSERT INTO " . DB_TABLE_ARTICLES . " (title, text, user_id, created) VALUES (?, ?, ?, ?)";
        return database::insert($sql, array($title, $text, $userId, ''));
    }
}
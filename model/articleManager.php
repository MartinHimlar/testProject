<?php

class articleManager
{
    private $bookRepo;

    public function __construct()
    {
        $this->bookRepo = new bookRepository();
    }

    public function addArticle($title, $text, $userId)
    {
        $result = $this->bookRepo->addArticle($title, $text, $userId);
        if(!$result){
            throw new errorOnPushArticleException('chyba při vkládání záznamu!');
        }
    }

    public function findArticles($viewCount = FALSE)
    {
        return $this->bookRepo->findArticles($viewCount);
    }

    public function getArticle($id)
    {
        return $this->bookRepo->getArticle($id);
    }
}

class errorOnPushArticleException extends \Exception {}
<?php

class apiController
{
    private $userRepo;

    private $articlesManager;

    private $head = array('title' => '');

    public function __construct()
    {
        $this->head['title'] = "API";
        $this->userRepo = new userRepository();
        $this->articlesManager = new articleManager();
    }

    public function render($param)
    {
        $urlParam = routerController::parseURL($param[0]);
        header('Content-Type: application/json');
        try {
            echo $this->actionApi($urlParam);
        } catch (apiUrlExceptions $e) {
            header("HTTP/1.0 404 404 Not Found");
        } catch (apiDataException $e) {
            header("HTTP/1.0 400 Bad Request");
        } catch (Exception $e) {
            header("HTTP/1.0 500 Internal Error");
        }
    }

    private function actionApi($url)
    {
        if (count($url) == 1) {
            throw new apiUrlExceptions('Bad url for API');
        } elseif ($url[1] == 'getUsers'){
            $data = $this->userRepo->findUsers();
        } elseif ($url[1] == 'getArticles'){
            $data = $this->articlesManager->findArticles(100);
        } elseif ($url[1] == 'setUser') {
            $receiveData = $this->decodeData();
            if (!isset($receiveData['username']) || !isset($receiveData['password'])) {
                throw new apiDataException('Bad user data');
            }
            $this->userRepo->addUser($receiveData['username'], $receiveData['password']);
            $data = TRUE;
        } elseif ($url[1] == 'setArticle') {
            $receiveData = $this->decodeData();
            if (!isset($receiveData['article_title']) || !isset($receiveData['article_text']) || !isset($receiveData['user_id'])) {
                throw new apiDataException('Bad user data');
            }
            $this->articlesManager->addArticle($receiveData['article_title'], $receiveData['article_text'], $receiveData['user_id']);
            $data = TRUE;
        } else {
            throw new apiUrlExceptions('Missing action parameter for API');
        }
        return json_encode($data);
    }

    private function decodeData()
    {
        if (!isset($_POST["data"])) {
            throw new apiDataException('Not post data receive');
        }
        return json_decode($_POST["data"], TRUE);
    }
}

class apiUrlExceptions extends Exception{}

class apiDataException extends Exception{}
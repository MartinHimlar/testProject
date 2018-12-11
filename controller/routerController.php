<?php

class routerController extends Controller
{

    protected $controller;

    public function action($parameters)
    {
        $newURL = $this->parseURL($parameters[0]);
        if (empty($newURL[0])) {
            $this->redirect('main');
        }

        /*if ($newURL[0] == 'generate') {                   //only for create admin account
            $userRepo = new userRepository();
            $userRepo->addUser('admin', 'asdf');
            $this->redirect('main');
        }*/

        if ($newURL[0] == 'main') {
            isset($newURL[1]) && ($newURL[1] == 'logout') ? $this->logout() : NULL;
        }

        $controller = $this->convertToUrl(array_shift($newURL)) . 'Controller';

        if (file_exists('controller/' . $controller . '.php'))
            $this->controller = new $controller;
        else
            $this->redirect('error');
        $this->controller->action($newURL);
        $this->data['title'] = $this->controller->head['title'];
        $this->view = 'layout';
    }

    private function parseURL($url)
    {
        $newULR = parse_url($url);
        $newULR["path"] = ltrim($newULR["path"], "/");
        $newULR["path"] = trim($newULR["path"]);;
        return explode("/", $newULR["path"]);
    }

    private function convertToUrl($text)
    {
        $converted = str_replace('-', ' ', $text);
        $converted = ucwords($converted);
        return str_replace(' ', '', $converted);
    }

}
<?php


class errorController extends Controller
{

    function action($parameters)
    {
        header("HTTP/1.0 404 Not Found");
        $this->head['title'] = 'Stránka nenalezena - Chyba 404';
        $this->view = 'error';
    }
}
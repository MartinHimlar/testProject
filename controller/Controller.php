<?php

abstract class controller
{

    protected $data = array();
    protected $view = "";
    protected $head = array('title' => '');
    private $flashMessages = array();

    private $autentificator;

    abstract function action($parameters);


    public function __construct()
    {
        if(isset($_POST['send'])) {
            $this->autentificator = new autentificator();
            $this->checkLogin();
        }
    }

    public function render()
    {
        if ($this->view)
        {
            extract($this->data);
            require("view/" . $this->view . ".php");
        }
    }

    public static function redirect($url, $refresh = FALSE)
    {
        $refresh ? header('refresh: 0') : NULL;
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    /**
     * @param string $message
     * @param string $type
     */
    protected function addFlashMessage($message, $type)
    {
        $_SESSION['flashMessages'][] = array('text' => $message, 'type' => $type);
    }


    protected function checkLogin()
    {
        $_SESSION['token'] = NULL;
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            try{
                $_SESSION['token'] =  $this->autentificator->autentificate($_POST['username'], $_POST['password']);
                $this->addFlashMessage('Přihlášení proběhlo úspěšně :)', 'success');
                $this->redirect('main', TRUE);
            } catch (\badUsernameOrPasswordException $e) {
                $this->addFlashMessage($e->getMessage(), 'danger');
                $this->redirect('main', TRUE);
            } catch (\Exception $e) {
                $this->addFlashMessage('Něco se nám pokazilo!', 'danger');
                $this->redirect('main', TRUE);
            }

        } else {
            $this->addFlashMessage('Musíte vyplnit uživatelské jméno i heslo', 'warning');
            $this->redirect('main', TRUE);
        }
    }

    protected function logout()
    {
        unset($_SESSION['token']);
        $this->addFlashMessage('odhlášení proběhlo úspěšně', 'success');
        $this->redirect('main', TRUE);
    }
}
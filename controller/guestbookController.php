<?php


class guestbookController extends Controller
{

    private $articleManager;

    protected $articles;

    public function __construct()
    {
        parent::__construct();
        $this->articleManager = new articleManager();
        if (isset($_POST['articleSend'])) {
            if($_POST['article'] && $_POST['title']){
                $this->articleManager->addArticle($_POST['title'], $_POST['article'], $_SESSION['token']['userId']);
                $this->addFlashMessage('Příspěvek byl úspešně přidán', 'success');
            }
        }
    }

    function action($parameters)
    {
        $this->data['articles'] = $this->articleManager->findArticles(10);
        $this->view = "book";
    }
}
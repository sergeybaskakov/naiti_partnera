<?php
class Page404
{
    function __construct()
    {
        $this->view = new View();
    }

    public function error404()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        $data['title'] = 'Упс, ошибка 404';
        $this->view->generate('404_view.php', 'main', $data['title']);
    }
}

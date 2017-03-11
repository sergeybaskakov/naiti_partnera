<?php
ob_start();
class Controller_Dancers extends Controller
{
    public $pagination;
    public $start = 0;
    public $limit = 5;

   function __construct()
   {
       session_start();
       $this->model = new Model_Dancers();
       $this->view = new View();
       $this->pagination = new Pagination();
   }

   public function action_index()
   {
       $data['title'] = 'Все партнеры';
       $data['users'] = $this->model->getUsers($this->start, $this->limit);
       $data['pagination'] = $this->pagination->generate_pagination($this->model->countUsers(), $this->limit);
       $this->view->generate('dancers_view.php', 'main', $data);
   }

    public function action_page()
    {
        $request = explode('/', $_SERVER['REQUEST_URI']);
        if(isset($request[3]) == 0) {
            $this->start = 0;
        }elseif($request[3] == 1){
            $this->start = 0;
        }elseif(!isset($request[3])){
            $this->start = 0;
        }elseif(isset($request[3])){
            $this->start =  ($request[3] -1) * $this->limit;
        }

        $data['title'] = 'Все партнеры';
        $data['start'] = $this->start;
        $data['users'] = $this->model->getUsers($this->start, $this->limit);
        $data['pagination'] = $this->pagination->generate_pagination($this->model->countUsers(), $this->limit);
        $this->view->generate('dancers_view.php', 'main', $data);
    }

    public function action_man(){
        $request = explode('/', $_SERVER['REQUEST_URI']);
        if(isset($request[3]) == 0) {
            $this->start = 0;
        }elseif($request[3] == 1){
            $this->start = 0;
        }elseif(!isset($request[3])){
            $this->start = 0;
        }elseif(isset($request[3])){
            $this->start =  ($request[3] -1) * $this->limit;
        }

        $data['title'] = 'Партнеры';
        $data['start'] = $this->start;
        $data['users'] = $this->model->getUsersMan($this->start, $this->limit);
        $data['pagination'] = $this->pagination->generate_pagination($this->model->countUsersMan(), $this->limit);
        $this->view->generate('dancers_view.php', 'main', $data);
    }

    public function action_woman(){
        $request = explode('/', $_SERVER['REQUEST_URI']);
        if(isset($request[3]) == 0) {
            $this->start = 0;
        }elseif($request[3] == 1){
            $this->start = 0;
        }elseif(!isset($request[3])){
            $this->start = 0;
        }elseif(isset($request[3])){
            $this->start =  ($request[3] -1) * $this->limit;
        }

        $data['title'] = 'Партнеры';
        $data['start'] = $this->start;
        $data['users'] = $this->model->getUsersWoman($this->start, $this->limit);
        $data['pagination'] = $this->pagination->generate_pagination($this->model->countUsersWoman(), $this->limit);
        $this->view->generate('dancers_view.php', 'main', $data);
    }

    public function action_view($id){
        $data['user'] = $this->model->getUser($id);
        $data['title'] = $data['user'][0]['name'];
        $this->view->generate('dancer_view.php', 'main', $data);
    }
}
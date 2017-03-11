<?php
ob_start();
class Controller_Admin extends Controller
{
    public $login;
    public $pass;
    public $auth;
    public $err;

    function __construct()
    {
        session_start();
        $this->model = new Model_Admin();
        $this->view = new View();
        $this->auth = new Auth();
    }


    public function action_index()
    {
        if($this->auth->is_auth()){
            $this->view->generate('welcome_view.php', 'admin/main');
        }else{
            $this->auth->redirect_admin();
        }
    }

    public function action_login()
    {
        $this->view->generate('login_view.php', 'admin/login');
    }

    public function action_services($id){
        if($this->auth->is_auth()){
            if(!empty($id)){
                $data = $this->model->getServices($id);
                $this->view->generate('services_view.php', 'admin/main', $data);
            }else{
                $this->view->generate('services_view.php', 'admin/main');
            }
        }else{
            $this->auth->redirect_admin();
        }
    }

    public function action_logout()
    {
        $this->auth->logout();
    }
}

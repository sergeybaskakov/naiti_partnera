<?php
ob_start();

class Controller_Profile extends Controller
{
    public $auth;

    function __construct()
    {
        session_start();
        $this->model = new Model_Profile();
        $this->view = new View();
        $this->auth = new Auth();
    }

    public function action_index()
    {
        if(isset($_SESSION['user_auth'])){
            $this->view->generate('profile_view.php', 'main');
        }else{
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/profile/login');
        }
    }

    public function action_login()
    {
        $data = array();
        $data_view = array();

        if(isset($_POST['login']) && isset($_POST['pass'])){
            foreach ($this->auth->auth_data($_POST['login'], $_POST['pass']) as $item){
                $data['login'] = $item['login'];
                $data['pass'] = $item['pass'];
                $_SESSION['user_id'] = $item['id'];
                $_SESSION['login'] = $item['login'];
                $_SESSION['avatar'] = $item['avatar'];
                $_SESSION['email'] = $item['email'];
                $_SESSION['name'] = $item['name'];
                $_SESSION['about'] = $item['about'];
            }

            if($data['login'] == $_POST['login'] && $data['pass'] == $_POST['pass']){
                $_SESSION['user_auth'] = true;
                $data_view['status'] = $_SESSION['user_auth'];
                $this->view->generate('profile_view.php', 'main');
                header('Location: http://'.$_SERVER['SERVER_NAME'].'/profile');
            }else{
                $_SESSION['error'] = '<div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <b>Ошибка!</b> Вы ввели неправильный логин или пароль!
                                   </div>';
                $this->view->generate('profile_login_view.php', 'main', $_SESSION['error']);
            }
        }else{
            $this->view->generate('profile_login_view.php', 'main');
        }
    }

    public function action_edit()
    {
        if(isset($_SESSION['user_auth'])){
            $data['user'] = $this->model->getUser($_SESSION['user_id']);
            $data['title'] = $data['user'][0]['name'];
            $this->view->generate('profile_edit_view.php', 'main', $data);
        }else{
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/profile/login');
        }
    }

    public function action_logout()
    {
        session_start();
        session_destroy();
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/profile/login');
    }
}
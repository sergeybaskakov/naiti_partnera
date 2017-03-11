<?php
class Auth
{
    function __construct()
    {
        $this->DB = DB::database();
        $this->view = new View();
    }

    public function db2Arr($data)
    {
        $arr = array();
        while($row = $data->fetch()){
            $arr[] = $row;
        }
        return $arr;
    }

    public function auth_data($login, $pass)
    {
        $data = $this->DB->query("SELECT * FROM users WHERE login='$login' AND pass='$pass'") or die('Something went wrong in auth_data()');
        return $this->db2Arr($data);
    }

    public function is_auth()
    {
        if(!isset($_SESSION['user_auth'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->login($_POST['login'], $_POST['pass']);
            }else{
                $this->view->generate('welcome_view.php', 'admin/main');
            }
        }

        return isset($_SESSION['user_auth']);
    }

    public function is_auth_user()
    {
        if(!isset($_SESSION['user_auth'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->login($_POST['login'], $_POST['pass']);
            }else{
                $this->view->generate('profile_view.php', 'main');
            }
        }

        return isset($_SESSION['user_auth']);
    }

    public function login($login, $pass)
    {
        $data = array();
        $data_view = array();

        foreach ($this->auth_data($login, $pass) as $item){
            $data['login'] = $item['login'];
            $data['pass'] = $item['pass'];
            $data_view['login'] = $item['login'];
        }

        if($data['login'] == $login && $data['pass'] == $pass){
            $_SESSION['user_auth'] = sha1($data['login']);
            $data_view['status'] = $_SESSION['user_auth'];
            return $data_view;
        }else{
            $_SESSION['error'] = '<div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <b>Ошибка!</b> Вы ввели неправильный логин или пароль!
                                   </div>';
            $data_view['error'] = $_SESSION['error'];
            return $data_view;
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect_admin();
    }

    public function redirect_admin()
    {
        header('Location: /admin/login');
    }
}
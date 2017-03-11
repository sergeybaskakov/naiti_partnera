<?php
class Controller_Days extends Controller{

    public function __construct()
    {
        $this->model = new Model_Days();
        $this->view = new View();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->generate('days_view.php', 'main', $data);
    }

}

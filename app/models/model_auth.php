<?php
class Model_Auth extends DB{
    protected $DB;

    function __construct()
    {
        $this->DB = DB::database();
    }

    public function getData()
    {
        $data = $this->DB->query("SELECT login, pass FROM users WHERE id=1") or die('Something went wrong in getData()');
        return $this->db2Arr($data);
    }
}
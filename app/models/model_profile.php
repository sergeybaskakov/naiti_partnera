<?php

class Model_Profile extends Model
{
    protected $DB;

    function __construct()
    {
        $this->DB = DB::database();
    }

    public function getData(){
        //
    }

    public function getUser($id)
    {
        $data = $this->DB->query("SELECT id, login, name, email, about, avatar, town, dance_class, club, year, status FROM users WHERE id='$id'") or die('Something went wrong in getUser()');
        return $this->db2Arr($data);
    }
}
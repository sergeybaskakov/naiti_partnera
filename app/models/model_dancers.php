<?php

class Model_Dancers extends Model
{
    protected $DB;
    public $pagination;

    function __construct()
    {
        $this->DB = DB::database();
        $this->pagination = new Pagination();
    }

    public function getData(){
        //
    }

    public function getUser($id)
    {
        $data = $this->DB->query("SELECT id, login, name, email, about, avatar, town, dance_class, club, year, status FROM users WHERE id='$id'") or die('Something went wrong in getUser()');
        return $this->db2Arr($data);
    }

    public function countUsers(){
        $data = $this->DB->query("SELECT id FROM users WHERE id != 1");
        return $data->rowCount();
    }

    public function countUsersMan(){
        $data = $this->DB->query("SELECT id FROM users WHERE id != 1 AND gender=0");
        return $data->rowCount();
    }

    public function countUsersWoman(){
        $data = $this->DB->query("SELECT id FROM users WHERE id != 1 AND gender=1");
        return $data->rowCount();
    }

    public function getUsers($start, $limit)
    {
        $data = $this->DB->query("SELECT id, login, name, email, about, avatar, town, dance_class, club, year, status FROM users WHERE id!=1 LIMIT $start, $limit") or die('Something went wrong in getUsers()');
        return $this->db2Arr($data);
    }

    public function getUsersMan($start, $limit)
    {
        $data = $this->DB->query("SELECT id, login, name, email, about, avatar, town, dance_class, club, year, status FROM users WHERE id!=1 AND gender=0 LIMIT $start, $limit") or die('Something went wrong in getUsersMan()');
        return $this->db2Arr($data);
    }

    public function getUsersWoman($start, $limit)
    {
        $data = $this->DB->query("SELECT id, login, name, email, about, avatar, town, dance_class, club, year, status FROM users WHERE id!=1 AND gender=1 LIMIT $start, $limit") or die('Something went wrong in getUsersWoman()');
        return $this->db2Arr($data);
    }
}
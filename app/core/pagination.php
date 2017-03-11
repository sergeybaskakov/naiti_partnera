<?php

class Pagination
{
    public $i;
    public $paginate = array();

    public function run(){

    }

    public function generate_pagination($all, $limit){
        $pages = ceil($all/$limit);
        for ($this->i = 1; $this->i <= $pages; $this->i++){
            $this->paginate[] = $this->i;
        }
        return $this->paginate;
    }
}
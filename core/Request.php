<?php

namespace Core;

class Request
{
    public function __construct()
    {
        foreach($_GET as $key => $get){
            $this->$key = $get;
            echo $this->$key;
        }
    }
}
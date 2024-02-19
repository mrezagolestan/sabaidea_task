<?php

namespace Core;

class Request
{
    public function __construct()
    {
        $this->assignValues($_GET);
        $this->assignValues($_POST);
    }

    private function assignValues(array $values)
    {
        foreach ($values as $key => $value) {
            //convert request value to prevent sql injection
            $this->$key = htmlspecialchars($value);
        }
    }
}
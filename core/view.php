<?php
function view($name, $values)
{
    foreach ($values as $key => $value){
        $$key = $value;
    }
    require APP_DIR . 'views/' . $name . '.php';
}
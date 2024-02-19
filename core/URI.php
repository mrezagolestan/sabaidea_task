<?php
namespace Core;

//DP: Singleton
class URI
{
    private static ?URI $instance = null;

    private array $URI;
    private function __construct()
    {
        $fullURI = substr($_SERVER["REQUEST_URI"], 1);

        //remove query string
        $fullURI = explode('?',$fullURI)[0];

        $this->URI = explode('/', $fullURI);
    }

    public function getURIs(){
        return $this->URI;
    }

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new URI();
        }
        return self::$instance;
    }
}
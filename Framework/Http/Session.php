<?php

namespace Framework\Http;

class Session
{
    private static $instance;

    private $sessionData;

    private function __construct()
    {
        $this->sessionData = $_SESSION;
    }

    public function __destruct()
    {
        $_SESSION = $this->sessionData;
    }

    public function get(string $key): string
    {
        return isset($this->sessionData[$key]) ? $this->sessionData[$key] : "";
    }

    public function set(string $key, string $value)
    {
        $this->sessionData[$key] = $value;
    }

    public function remove(string $key)
    {
        unset($this->sessionData[$key]);
    }

    public static function current(): Session
    {
        if (Session::$instance == null)
        {
            Session::$instance = new Session();
        }

        return Session::$instance;
    }
}

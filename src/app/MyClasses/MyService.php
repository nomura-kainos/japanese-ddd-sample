<?php

namespace App\MyClasses;

class MyService
{
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['Hello', 'Welcome', 'Bye'];

    private function __construct()
    {
    }

    public function getInstance()
    {
        return self::$myservice ?? self::$myservice = new MyService();
    }

    public function setId($id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = 'select:'.$this->data[$id];
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function alldata()
    {
        return $this->data;
    }
}

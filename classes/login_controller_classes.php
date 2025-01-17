<?php

class LoginController extends Login
{
    private $uid;
    private $email;
    private $pwd;

    public function __construct($uid, $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if($this->emptyInput() == false)
        {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput()
    {
        $result = true;
        if((empty($this->uid)) || (empty($this->pwd)) || (empty($this->email)))
        {
            $result = false;
        }
        return $result;
    }

    

}
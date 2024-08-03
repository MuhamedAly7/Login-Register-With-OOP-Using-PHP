<?php

class Signup extends DB
{
    protected function setUser($uid, $pwd, $email)
    {
        $set_query = "INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?,?,?);";
        $stat = $this->connect()->prepare($set_query);
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stat->execute([$uid, $hashedPwd, $email]))
        {
            $stat = null;
            header("location: ../index.php?error=statfailed");
            exit();
        }
        $stat = null;
    }

    protected function checkUser($uid, $email)
    {
        $select_query = "SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;";
        $stat = $this->connect()->prepare($select_query);
        
        if(!$stat->execute([$uid, $email]))
        {
            $stat = null;
            header("location: ../index.php?error=statfailed");
            exit();
        }
        $resultCheck = true;
        if($stat->rowCount() > 0)
        {
            $resultCheck = false;
        }
        return $resultCheck;
    }
}
<?php

class Login extends DB
{
    protected function getUser($uid, $pwd)
    {
        $get_query = "SELECT users_pwd FROM users WHERE users_uid = ?;";
        $stat = $this->connect()->prepare($get_query);
        
        if(!$stat->execute([$uid]))
        {
            $stat = null;
            header("location: ../index.php?error=statfailed");
            exit();
        }

        if($stat->rowCount() == 0)
        {
            $stat = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwd_hashed = $stat->fetchAll(PDO::FETCH_ASSOC);
        $check_password = password_verify($pwd, $pwd_hashed[0]['users_pwd']);

        if($check_password == false)
        {
            $stat = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else
        {
            $get_query = "SELECT users_pwd FROM users WHERE users_uid = ? AND users_pwd = ?;";
            $stat = $this->connect()->prepare($get_query);
            if(!$stat->execute([$uid, $pwd]))
            {
                $stat = null;
                header("location: ../index.php?error=statfailed");
                exit();
            }

            if($stat->rowCount() == 0)
            {
                $stat = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stat->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $user[0]['users_id'];
            $_SESSION['useruid'] = $user[0]['users_uid'];
        }
        $stat = null;
    }

}
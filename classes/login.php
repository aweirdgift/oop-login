<?php

class Login extends database {
    protected function getUser($pwd, $username ) {
        $statement = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_username = ?;');

        if (!$statement->execute(array($username, $pwd))) {
            $statement = null;
            header("location: ../index.php?error=database-execute-error");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }


        $pwdHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);
        
        if ($checkPwd == false) {
            $statement = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif ($checkPwd == true) {
            $statement = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? AND users_pwd = ?;');
            
            if (!$statement->execute(array($username, $pwd))) {
                $statement = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            }

            if ($statement->rowCount() == 0) {
                $statement = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $users[0]["users_id"];
            $_SESSION["user-name"] = $users[0]["users_username"];
            $statement = null;
        }
    }
}

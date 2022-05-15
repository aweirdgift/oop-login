<?php

class Signup extends database {
    protected function setUser($username, $pwd) {
        $statement = $this->connect()->prepare('INSERT INTO users (users_username, users_pwd) VALUES (?, ?);');
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$statement->execute(array($username, $hashedPwd))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        $resultCheck;
        if ($statement->rowCount() > 0) {
            $resultCheck =  false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }


    protected function checkUser($username) {
        $statement = $this->connect()->prepare('SELECT users_username FROM users WHERE users_username = ?;');
        
        if (!$statement->execute(array($username))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        $resultCheck;
        if ($statement->rowCount() > 0) {
            $resultCheck =  false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}

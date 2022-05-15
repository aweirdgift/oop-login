<?php


class signupControl extends Signup {
    private $username;
    private $pwd;
    private $pwdrepeat;


    public function __construct($username, $pwd, $pwdrepeat) {
        $this->username = $username;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidUsername() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        $this->setUser($this->username, $this->pwd);
    }

    private function emptyInput() {
        $result;
        if (empty($this->username || $this->pwd ||$this->pwdrepeat)) {
            $result =  false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        $result;
        if ($this->pwd != $this->pwdrepeat) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    protected function checkUser() {
        $result;
        if (!$this->checkUser($this->username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}


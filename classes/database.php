<?php


class database {
  protected function connect() {
      try {
          $username = "root";
          $password = "";
          $database = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
          return $database;
        } catch (PDOException $e) {
          print "Error!: " .$e->getMessage() . "<br>";
      }
  }
}


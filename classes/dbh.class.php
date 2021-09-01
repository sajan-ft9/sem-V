<?php 

class Dbh {
    //awd
    // private $host = "fdb29.awardspace.net";
    // private $user = "3659953_project";
    // private $pwd = "S@jan999";
    // private $dbName = "3659953_project";

    //khadkasajan
    // private $host = "sql300.unaux.com";
    // private $user = "unaux_29463321";
    // private $pwd = "S@jan999";
    // private $dbName = "unaux_29463321_project";


    // localhost
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "project";

    public function connect () {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

}



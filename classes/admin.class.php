<?php 
require_once "../classes/dbh.class.php";
class Admin extends Dbh {

    public function get($username) {
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getAll(){
        $sql = "SELECT * FROM admin";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function changePass($password, $username){
        $sql = "UPDATE admin SET password = ? WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$password, $username]);
    }

    public function otpUpdate($otp){
        $sql = "UPDATE admin SET otp = ? WHERE id = 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$otp]);
    }

    public function getOtp() {
        $sql = "SELECT otp FROM admin";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }


}
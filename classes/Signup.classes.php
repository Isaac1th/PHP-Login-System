<?php

class Signup extends Dbh
{

    protected function setUser($uid, $pwd, $email){
        $sql = 'INSERT INTO users (users_uid, users_pwd, users_email)
                VALUES (?, ?, ?);';
                
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../lindex.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email){
        $sql = 'SELECT users_uid 
                FROM users 
                WHERE users_uid = ? 
                OR users_email = ?;';

        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../lindex.php?error=stmtfailed");
            exit();
        }

        $resultCheck = 0;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}
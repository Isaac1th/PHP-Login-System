<?php

class Login extends Dbh
{

    protected function getUser($uid, $pwd){
        $sql = 'INSERT INTO users (users_uid, users_pwd, users_email)
                VALUES (?, ?, ?);';
                
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../lindex.php?error=stmtfailed");
            exit();
        }

        if (!$stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../lindex.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../lindex.php?error=wrongpassword");
            exit();
        } 
        elseif($checkPwd == true){
            $sql = 'SELECT * FROM users
                    WHERE users_uid = ?
                    OR users_email = ?
                    AND users_pwd = ?;';

            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../lindex.php?error=stmtfailed");
                exit();
            }

            if (!$stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../lindex.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_id"];

            $stmt = null;
        }

        $stmt = null;
    }
}
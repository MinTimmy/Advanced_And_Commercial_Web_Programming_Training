<?php
class DatabaseFunction
{
    private $db_host = "localhost";
    private $db_username = "root";
    private $db_password = "zxc741963";
    private $db_name = "phpboard";
    public function __construct()
    {
        try{
            $this->db_link = new PDO("mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8", $this->db_username, $this->db_password);
        }catch (PDOException $e){
            print("Connection failed, error message: {$e->getMessage()}<br/>");
            die();
        }
    }
    public function get_username($ID)
    {
        $squery = "SELECT `username` FROM `user` WHERE `id` = '$ID'";
        $r = $this->db_link->query($squery);
        $r->execute();
        $result = $r->fetchAll(PDO::FETCH_BOTH);
        return $result[0][0];
    }

    public function get_board_message()
    {
        $db_result = $this->db_link->query("SELECT * FROM `board`  WHERE 1 ");

        $db_result->execute();
        $board_result = $db_result->fetchAll(PDO::FETCH_BOTH);

        return $board_result;
    }

    //  有 sql injection 問題
    // Solution
    // https://www.php.net/manual/en/pdo.prepared-statements.php
    public function new_message($mes, $user_id)
    {
        $squery = "INSERT INTO `board`(`id`, `message`, `post_time`, `user_id`) VALUES (NULL,:mes,now(),:user_id)";
        $stmt = $this->db_link->prepare($squery);
        $stmt->bindParam(':mes',$mes);
        $stmt->bindParam((':user_id'), $user_id);
        $stmt->execute();

    }
    public function new_user($username, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        echo $hash;
        $squery = "INSERT INTO `user`(`id`, `username`, `password`) VALUE (NULL, :username, :password)";
        $stmt = $this->db_link->prepare($squery);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hash);
        $stmt->execute();
    }
    public function check_username($username): bool
    {
        $squery = "SELECT * FROM `user` WHERE `username` = :username";
        $stmt = $this->db_link->prepare($squery);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_BOTH);

        if(empty($re)){
            return true;
        }
        else{
            return false;
        }
    }
    public  function login_check($username, $password): bool
    {
           $squery = "SELECT * FROM `user` WHERE `username` = :username";
           $stmt = $this->db_link->prepare($squery);
           $stmt->bindParam(':username', $username);
           $stmt->execute();
           $res = $stmt->fetchAll(PDO::FETCH_BOTH);

           if(empty($res)){
               return false;
           }
           else{
               if(password_verify($password, $res[0]['password'])){
                   return true;
               }
               else{
                   return false;
               }
           }
    }

}




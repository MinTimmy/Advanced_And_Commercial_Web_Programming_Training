<?php
class GetData
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
        $squery = "SELECT `username` FROM `user` WHERE PID = '$ID'";
        $r = $this->db_link->query($squery);
        $r->execute();
        $result = $r->fetchAll(PDO::FETCH_BOTH);
        return $result[0][0];
    }

    public function get_board_message()
    {
        $db_result = $this->db_link->query("SELECT * FROM `board` WHERE 1");

        $db_result->execute();
        $board_result = $db_result->fetchAll(PDO::FETCH_BOTH);

        return $board_result;
    }
    public function new_message($mes, $user_id)
    {
        $squery = "INSERT INTO `board`(`board_id`, `message`, `post_time`, `user_id`) VALUES (NULL,'$mes',now(),'$user_id')";
        $this->db_link->query($squery);
    }
    public function new_user($username, $password)
    {
        $squery = "INSERT INTO `user`(`PID`, `username`, `password`) VALUE (NULL, '$username', '$password')";
        $this->db_link->query($squery);
    }
    public function check_username($username)
    {
        $squery = "SELECT * FROM `user` WHERE username = '$username'";
        $r = $this->db_link->query($squery);
        $r->execute();
        $result = $r->fetchAll(PDO::FETCH_BOTH);
        if(empty($result)){
            return true;
        }
        else{
            return false;
        }
    }
    public function login_check($username, $password)
    {
        $cpwd=$this->db_link->query("select * from user where username='$username' and password='$password';");

        $cpwd->execute();
        $row2 = $cpwd->fetchAll(PDO::FETCH_BOTH);
        echo $row2[0];
        if(empty($row2[0])){
            return false;
        }
        else {
            return true;
        }
    }
}




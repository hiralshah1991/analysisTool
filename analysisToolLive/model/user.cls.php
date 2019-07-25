<?php

class User extends Connectdb{

    
public $error = array();

    public function __construct(){
        
        parent::__construct();
        
        $this->setGetVars();
        $this->setPostVars();
        
    }
    
    public function setPostVars(){
        foreach($_POST as $k=>$v){
            $this->$k=$v;
        }
    }
    
    public function setGetVars(){
        foreach($_GET as $k=>$v){
            $this->$k=$v;
        }
    }
    
    public function login() {
        $sql = "SELECT * from users WHERE uname = '".$this->uname."' AND password = '".$this->password."' AND status = 'Y'";
        _D($sql);
        $res = $this->conn->query($sql);
        
        $result = $this->getArray($res);
        _DX($res);
        //_D($result);
        $this->id = $result[0]['id'];
        //_DX(count($result));
        if(count($result) != 1){
            return false;
        }
        return true;
    }
    public function setUserProfile($uid){
       
        if($uid == "" || !isset($uid)){
            $uid = $_SESSION['uid'];
        }
        if(!isset($uid)){
            return false;
        }
        $sql = "SELECT * from users WHERE id=".$uid." AND status = 'Y'";
        $res = $this->conn->query($sql);
        $result = $this->getArray($res);
        if(empty($result[0])){
            return false;
        }
        foreach($result[0] as $k=>$v){
            $_SESSION[$k] = $v;
        }
        return true;
    }
    function getArray($result){
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                foreach($row as $k=>$v){
                    $row[$k]	= stripslashes($v);
                }
                $records[] = $row;
            }
            return $records;
        }
    }
}
?>
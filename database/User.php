<?php

// Use to fetch product data
class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //................
    public function checkInput($var)
    {
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripcslashes($var);
        return $var;
    }
    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT `user_id` FROM `users` WHERE `email` = :email AND `password` = :password");
        $stmt->bindParam(":email", $email, DB::PARAM_STR);
        $stmt->bindParam(":password",md5($password), DB::PARAM_STR);
        $stmt->execute();
        
        $user = $stmt->fetch(DB::FETCH_OBJ);
        $count = $stmt->rowCount();
        
        if($count > 0)
        {
            $_SESSION['user_id'] = $user->user_id;
            header('Location: index.php');
        }
        else
        {
            echo "Registration unsuccessful!!!";
        }
    }
    //................

    // fetch user data using getData Method
    public function getUserData($table = 'user'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $user;
        }

        return $resultArray;
    }

    // get product using user id
    public function getUser($user_id = null, $table= 'user'){
        if (isset($user_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id={$user_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $user;
            }

            return $resultArray;
        }
    }
    }

    // insert into user table
    public  function insertIntoUser($params = null, $table = "user"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and insert into cart table
    public  function addToUser($userid){
        if (isset($userid)){
            $params = array(
                "user_id" => $userid
            );

            // insert data into cart
            $result = $this->insertIntoUser($params);
            if ($result){
                // Reload Page
                header("location:login.php");
            }
        }
    }

}
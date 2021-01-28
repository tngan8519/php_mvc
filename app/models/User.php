<?php
class User extends DB{
    public function register($data) {
        $qr = "INSERT INTO users (firstname,lastname,email,phone,password,checked) VALUES ('$data[first]','$data[last]','$data[email]','$data[phone]', '$data[password]',0)";
        return mysqli_query($this->con,$qr);

    }

    public function login($email,$password) {
        $qr = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($this->con,$qr);
       
        if (!$result || mysqli_num_rows($result) == 0){
              return false;
        }else{
        //  get column value by name with MYSQLI_ASSOC or by index numereic with MYSQL_NUM or both with MYSQL_BOTH
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }}
        
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        $qr = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            return  mysqli_fetch_array($result);
        }
    }

    public function findUserNameById($id){
        $qr = "SELECT * FROM users WHERE id='$id'";
        $result= mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            $row = mysqli_fetch_array($result);
            return $row['firstname'].' '.$row['lastname'];
        }
    }

    public function resetPassword($email,$newpw){
        $qr = "UPDATE * FROM users SET password='$newpw' WHERE email='$email'";
        $result= mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            return true;
        }
    }
}

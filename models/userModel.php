<?php
    // include 'databaseModel.php';
    class UserModel extends Database
    {
        public function addUser($user_name, $user_email, $passHash, $user_gender, $user_birthday)
        {
            $sql = "INSERT INTO users (user_name, user_email, user_pass, user_gender, user_birthday)  
                    VALUES ('$user_name', '$user_email', '$passHash', '$user_gender', '$user_birthday')";
            mysqli_query($this->conn, $sql);
        }

        public function getUserEmail($userEmail)
        {
            $sql = "SELECT user_email FROM users WHERE user_email = '{$userEmail}'";
            
            $result = mysqli_query($this->conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                return $row[0];
            }
        }

        public function getPassword($userEmail)
        {
            $sql = "SELECT user_pass FROM users WHERE user_email = '{$userEmail}'";
            $result = mysqli_query($this->conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                return $row[0];
            }
        }
    }

<?php

class UserItem
{

    public $user_id;
    public $email;
    public $username;//used to create
    public $password;//used to create
    public $first_name; // used to delete and update
    public $last_name; //used to create



    // Returns the UserId if they
    public function getUserId() {

        // create connection object
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // prepare statement
        $sql = "SELECT * FROM UserName where email = '{$this->email}'  AND password = '{$this->password}' ";

        $result = $conn->query($sql);

        // if not true show error
        if ($result->num_rows > 0) {
            $rows = [];

            // output data of each row
            while ($row = $result->fetch_assoc() ) {
                $id = $row['user_id'];
            }

            $message['user_id'] = $id;
        } else {
            $message['error'] = 'Could not find user.';
        }

        return $message;

    }

    public function deleteUser()
    {

    }

    public function createUser()
    {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO UserName (email, password, first_name, last_name)
            VALUES ('$this->email',  '$this->password', '$this->first_name', '$this->last_name')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            $conn->close();
            $message['added'] = 'true';

        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $conn->close();
            $message['error'] = 'Could not add the user.';
        }

        return json_encode($message);
    }

    public function updateUser()
    {

    }

    public function toArray()
    {
        return array(
            'success' => 'true',
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        );
        //return an array version of the todo item
    }


}
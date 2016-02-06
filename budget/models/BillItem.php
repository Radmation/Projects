<?php



class BillItem
{
    public $bill_id; // used to delete and update
    public $is_gain; //used to create
    public $bill_name;//used to create
    public $frequency;//used to create
    public $due_period;//used to create
    public $every_x_days;//used to create
    public $on_the_x;//used to create
    public $amount;//used to create

    // not using
    public function getUnencodedBills($username, $userpass)
    {


        $user_id = SignUserIn($username, $userpass);

        if ($user_id != 0) {
            // Create connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM UserBills WHERE user_id = '{$user_id}'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $rows = [];
                $counter = 0;
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            } else {
                echo "0 results";
            }

            $conn->close();

            return $rows; // returns array of objects


        } else { // logged in failed
            return array(
                'Error' => 'Logging in failed user id:' . $user_id . 'username: ' . $username . 'userpass: ' . $userpass,
            );
        }


    }


    // TODO USING
    public static function getBills($username, $userpass)
    {
        $message = array();

        // get the user ID here
        $user_id = SignUserIn($username, $userpass);

        if ($user_id != 0) {
            // Create connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM UserBills WHERE user_id = '{$user_id}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $rows = [];
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                $message['bills'] = $rows;
                $message['success'] = true;
            } else {
                $message['success'] = false;
                $message['message'] = 'No bills exist for the user.';
            }

            $conn->close();
            return $message; // returns array of objects

            //return json_encode($message);

        } else { // logged in failed
            $message['success'] = false;
            $message['message'] = 'Login failed';
            return $message;
        }


    }


    // NOT USING
    public function getBill($username, $userpass)
    {

        $user_id = SignUserIn($username, $userpass);

        if ($user_id != 0) {
            // Create connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM UserBills WHERE bill_id = '{$this->bill_id}'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $rows = [];
                $counter = 0;
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            return json_encode($rows); // returns array of objects

        } else { // logged in failed
            return array(
                'Error' => 'Logging in failed user id:' . $user_id . 'username: ' . $username . 'userpass: ' . $userpass,
            );
        }


    }

    // NOT USING
    public function deleteBill($username, $userpass)
    {

        $message = array(); // create message array to be used as JSON

        $user_id = SignUserIn($username, $userpass); // returns id
        if ($user_id != 0) {
            // Create connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //check to see if the bill_id exists
            $sql1 = "SELECT * FROM UserBills WHERE bill_id = '{$this->bill_id}'";
            $result = $conn->query($sql1);
            $is_there = '';

            if ($result->num_rows > 0) {
                $is_there = 1; // true
            } else {
                $is_there = 0; // false
            }


            //if that bill exists
            if ($is_there) {
                $sql = "DELETE FROM UserBills WHERE bill_id = '{$this->bill_id}'";

                if ($conn->query($sql) === TRUE) {
                    $message['success'] = 'true';
                    $message['message'] = 'bill deleted';
                } else {
                    $message['success'] = 'false';
                    $message['message'] = 'bill could not be deleted!';
                }
            } else {
                $message['success'] = 'false';
                $message['message'] = 'bill id does not exist!';
            }
            // close the connection
            $conn->close();
            // return the message as json
        } else {
            $message['success'] = 'false';
            $message['message'] = 'Logging in failed user id:' . $user_id . 'username: ' . $username . 'userpass: ' . $userpass;
        }
        return json_encode($message);
    }


    // NOT USING
    public function save($username, $userpass)
    {
        // get the username pass from DB
        $user_id = SignUserIn($username, $userpass);


        if ($user_id != 0) {
            //TODO LOGIN SUCCESS
            // returns true or false
            //AddBill($user_id, $is_gain, $bill_name, $frequency, $due_period, $every_x_days, $on_the_x, $amount)
            $added_bill = AddBill($user_id, $this->is_gain, $this->bill_name, $this->frequency, $this->due_period, $this->every_x_days, $this->on_the_x, $this->amount);

            if ($added_bill === true) {
                //TODO ADDED BILL SUCCESS

            } else {
                // TODO ADDING FAILED
                throw new Exception('Failed to save bill item');
            }

        } else {
            // TODO FAILED LOGIN
            throw new Exception('Failed to login');
        }

        //if saving was not successful, throw an exception


        //if the $bill_id isn't set yet, it means we need to create a new todo item
//        if( is_null($this->bill_id) || !is_numeric($this->bill_id) ) {
//            //the todo id is the current time
//            $this->bill_id = time();
//        }

        $bill_item_array = $this->toArray();

        return $bill_item_array;

    }

    // NOT USING
    public function updateBill($username, $userpass)
    {

        // create the connection to the DB
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // create message array to be used as JSON
        $message = array();
        $is_there = '';
        // get the users_id
        $user_id = SignUserIn($username, $userpass);

        if ($user_id != 0) {
            // check to see if the bill_id is null exists
            if (isset($this->bill_id)) {
                // check to see if the bill_id exists
                //check to see if the bill_id exists
                $sql1 = "SELECT * FROM UserBills WHERE bill_id = '{$this->bill_id}'";
                $result = $conn->query($sql1);

                if ($result->num_rows > 0) {
                    $is_there = 1; // true
                } else {
                    $is_there = 0; // false
                }
            } else {
                $message['success'] = 'false';
                $message['message'] = 'bill id was not sent!';
            }


            //if the bill exists in the DB update it
            if ($is_there) {
                $rows_updated = 0; // keep count of updated cells
                $rows_not_updated = 0; // keep count of cells that did not update

                if (isset($this->is_gain)) {
                    $sql = "UPDATE UserBills SET is_gain = '{$this->is_gain}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated += 1;
                    }
                }
                if (isset($this->bill_name)) {
                    $sql = "UPDATE UserBills SET bill_name = '{$this->bill_name}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated += 1;
                    }
                }
                if (isset($this->frequency)) {
                    $sql = "UPDATE UserBills SET frequency = '{$this->frequency}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated += 1;
                    }
                }
                if (isset($this->due_period)) {
                    $sql = "UPDATE UserBills SET due_period= '{$this->due_period}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated += 1;
                    }
                }
                if (isset($this->every_x_days)) {
                    $sql = "UPDATE UserBills SET every_x_days = '{$this->every_x_days}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated += 1;
                    }
                }
                if (isset($this->on_the_x)) {
                    $sql = "UPDATE UserBills SET on_the_x = '{$this->on_the_x}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated .= 1;
                    }
                }
                if (isset($this->amount)) {
                    $sql = "UPDATE UserBills SET amount = '{$this->amount}' WHERE bill_id = '{$this->bill_id}'";
                    if ($conn->query($sql) === TRUE) {
                        $rows_updated += 1;
                    } else {
                        $rows_not_updated += 1;
                    }
                }

                $message['success'] = 'true';
                $message['message'] = 'the number of cells updated: ' . $rows_updated . '. the number of rows that failed: ' . $rows_not_updated . '.';
            } else {
                $message['is_there'] = 'false';
            }

        } else {
            $message['success'] = 'false';
            $message['message'] = 'Logging in failed user id:' . $user_id . 'username: ' . $username . 'userpass: ' . $userpass;
        }

        return json_encode($message);
    }

    public function toArray()
    {
        return array(
            'success' => 'true',
            'is_gain' => $this->is_gain,
            'bill_name' => $this->bill_name,
            'frequency' => $this->frequency,
            'due_period' => $this->due_period,
            'every_x_days' => $this->every_x_days,
            'on_the_x' => $this->on_the_x,
            'amount' => $this->amount
        );
        //return an array version of the todo item
    }


}
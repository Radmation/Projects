<?php
class User
{
    private $_params;

    public function __construct($params)
    {
        $this->_params = $params;
    }

    public function createAction()
    {
        // create a new user here
        $user = new UserItem();

        $user->first_name = $this->_params['first_name'];
        $user->last_name = $this->_params['last_name'];
        $user->email = $this->_params['email'];
        $user->password = $this->_params['password'];

        //return the todo item in array format
        return $user->createUser(); // CALLS TO ARRAY FUNCTION IN CLASS - gets echo'd out on index.php page
    }

    // returns UserId as INT
    public function readAction()
    {
        // instantiate new userObject
        $user = new UserItem();

        // assign the username and password
        $user->email = $this->_params['email'];
        $user->password = $this->_params['password'];

        // returns userId as INT
        return $user->getUserId();
    }

    public function updateAction()
    {

    }

    public function deleteAction()
    {
        $bill = new BillItem();
        $bill->bill_id = $this->_params['bill_id'];
        $deleted =  $bill->deleteBill( $this->_params['username'], $this->_params['userpass']);
        return $deleted;
    }
}
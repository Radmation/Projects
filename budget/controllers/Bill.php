<?php
class Bill
{
    private $_params;

    public function __construct($params)
    {
        $this->_params = $params;
    }

    public function createAction()
    {
        //create a new todo item
        $bill = new BillItem();
        $bill->is_gain = $this->_params['is_gain']; // bill name/type todo add me
        $bill->bill_name = $this->_params['bill_name']; // bill name/type todo change me from bill type
        $bill->frequency = $this->_params['frequency']; // how often todo SINGLE WEEKLY BI-WEEKLY MONTHLY
        $bill->due_period = $this->_params['due_period']; // how often todo enum('eom','bom')
        $bill->every_x_days = $this->_params['every_x_days']; // how often todo int add me
        $bill->on_the_x = $this->_params['on_the_x']; // how often todo int add me
        $bill->amount = $this->_params['amount']; // dollar amount

        //pass the user's username and password to authenticate the user
        $bill->save( $this->_params['username'], $this->_params['userpass'] ); // save into DB

        //return the todo item in array format
        return $bill->toArray(); // CALLS TO ARRAY FUNCTION IN CLASS - gets echo'd out on index.php page
    }

    // DO NOT NEED TO JSON_ENCODE
    public function readAction()
    {

        $bill = new BillItem();
        $bills = $bill->getBills( $this->_params['username'], $this->_params['userpass']);

//        var_dump($this->_params);
//        $bills = $bill->getBills( 'radley', 'radley123');
        return  $bills;
        //return $bill->getBills();


    }

    public function updateAction()
    {
        // TODO TODO WORKING HERE
        $bill = new BillItem();
        $bill->bill_id = $this->_params['bill_id']; // the bill you are editing
        $bill->is_gain = $this->_params['is_gain']; // bill name/type todo add me
        $bill->bill_name = $this->_params['bill_name']; // bill name/type todo change me from bill type
        $bill->frequency = $this->_params['frequency']; // how often todo SINGLE WEEKLY BI-WEEKLY MONTHLY
        $bill->due_period = $this->_params['due_period']; // how often todo enum('eom','bom')
        $bill->every_x_days = $this->_params['every_x_days']; // how often todo int add me
        $bill->on_the_x = $this->_params['on_the_x']; // how often todo int add me
        $bill->amount = $this->_params['amount']; // dollar amount
        $updated_bill =  $bill->updateBill( $this->_params['username'], $this->_params['userpass'] );
        return $updated_bill;
    }

    public function deleteAction()
    {
        $bill = new BillItem();
        $bill->bill_id = $this->_params['bill_id'];
        $deleted =  $bill->deleteBill( $this->_params['username'], $this->_params['userpass']);
        return $deleted;
    }
}
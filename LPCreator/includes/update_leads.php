<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/31/2016
 * Time: 11:57 AM
 */

// get all the id's and select all the leads and if the id matches any id, then change that rows exported to true

// array of exported
if(!empty($_POST['exported'])) {

    $servername = "localhost_";
    $username = "username_";
    $password = "password_";
    $dbname = "myDB_";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //******************************
    //   select all rows
    //******************************

    $imploded_ids = implode($_POST['exported']);

    //$sql = "SELECT * FROM TblCows WHERE id IN '$table_id'";


    //******************************
    //  create csv file
    //******************************
    $select = "SELECT * FROM TblCows WHERE id IN '$table_id'";

    $export = mysqli_query ( $select ) or die ( "Sql error : " . mysqli_error( ) );

    $fields = mysqli_num_fields ( $export );

    for ( $i = 0; $i < $fields; $i++ )
    {
        $header .= mysqli_field_name( $export , $i ) . ",";
    }

    while( $row = mysqli_fetch_row( $export ) )
    {
        $line = '';
        foreach( $row as $value )
        {
            if ( ( !isset( $value ) ) || ( $value == "" ) )
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . ",";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
    $data = str_replace( "\r" , "" , $data );

    if ( $data == "" )
    {
        $data = "\n(0) Records Found!\n";
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=lead_data.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$data";



    //******************************
    //    update exported column
    //******************************

    $sql = "UPDATE TABLENAME SET exported='True' WHERE id IN '$table_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }



    $conn->close();
}

// redirect to leads.php

//header('location:../leads.php');
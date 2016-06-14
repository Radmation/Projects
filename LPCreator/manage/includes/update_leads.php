<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/31/2016
 * Time: 11:57 AM
 */
session_start();

// get all the id's and select all the leads and if the id matches any id, then change that rows exported to true

// array of exported
if( !empty($_POST['exported'])  ) {

    // connect to db
//    $host = "localhost";
//    $username = "radley";
//    $password = "1Animation2";
//    $db_name = "custompapercup";

    $host = "68.178.217.38";
    $username = "radcustompaper";
    $password = "Y38HWcEeGPExvG4J!";
    $db_name = "radcustompaper";

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //******************************
    //   select all rows
    //******************************

    $imploded_ids = implode($_POST['exported']);

    //var_dump($imploded_ids);

    //$sql = "SELECT * FROM TblCows WHERE id IN '$table_id'";


    //******************************
    //  create csv file
    //******************************
    $select = "SELECT * FROM Leads WHERE lead_id IN ('$imploded_ids')";
//    $select = "SELECT * FROM Leads";

    $export = mysqli_query($conn, $select) or die ( "Sql error : " . mysqli_error( ) );

    $fields = mysqli_num_fields ($export);

    for ( $i = 0; $i < $fields; $i++ )
    {
        while ($property = mysqli_fetch_field($export)) {
            //echo $property->name;
            $header .= $property->name . ",";
        }
//        $header .= mysqli_field_name( $export , $i ) . ",";
    }

    // fix headers
    $header = rtrim($header, ",");
    $header = $header .  "\n";
    //echo $header;

    // headers are build

    // build rows


    while( $row = mysqli_fetch_row( $export ) )
    {
        $line = '';
        foreach( $row as $value )
        {
            // if value is empty - make value a comma else replace quotes with double quotes
            if ( ( !isset( $value ) ) || ( $value == "" ) )
            {
                $value = ",";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . ",";
            }
            $line .= $value;
        }
        $data .= rtrim( $line, ",") . "\n";
    }
    $data = str_replace( "\r" , "" , $data );

    if ( $data == "" )
    {
        $data = "\n(0) Records Found!\n";
    }

//    $myfile = fopen("../reports/" .time() ."newfile.csv", "w") or die("Unable to open file!");
//    fwrite($myfile, $header);
//    fwrite($myfile, $data);
//    fclose($myfile);

//    header("Content-type: text/csv");
////    header("Content-type: application/octet-stream");
//    header("Content-Disposition: attachment; filename=lead_data.csv");
////    header('Content-Disposition: attachment; filename="'.$myfile.'"');
//    header("Pragma: no-cache");
//    header("Expires: 0");

    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=file.csv");
    // Disable caching
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
    header("Pragma: no-cache"); // HTTP 1.0
    header("Expires: 0"); // Proxies


    //print "record2,record3,record4\n";

    echo "$header\n$data";



    //******************************
    //    update exported column
    //******************************

    $sql = "UPDATE Leads SET exported=1 WHERE lead_id IN ('$imploded_ids')";
    //echo $sql;

    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
    } else {
        //echo "Error updating record: " . $conn->error;
    }
//
//
//
//    $conn->close();
}

// redirect to leads.php
//$_SESSION["message"] = "CSV File Created Successfully!";
//header('location:../leads.php');

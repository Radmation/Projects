<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/26/2016
 * Time: 2:46 PM
 */
// echos out json to page
header("Access-Control-Allow-Origin: *");

$myfile = fopen("words.json", "r") or die("Unable to open file!");
echo fread($myfile,filesize("words.json"));
fclose($myfile);
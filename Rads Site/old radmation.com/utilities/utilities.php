<?php


function ratingStars($rating){
    $rating_stars="";
    for($i =1; $i<=$rating; $i++ ){
        $rating_stars .= "<img src='images/ratefill.png'>";
    }
    return $rating_stars;
}
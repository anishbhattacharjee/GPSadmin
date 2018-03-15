<?php
global $con;
$con = mysqli_connect('bigperl.cqhgvggnarsv.us-east-2.rds.amazonaws.com', 'root', 'bigperlroot');

mysqli_select_db($con,'bigperldb');
?>
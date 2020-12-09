<?php
include "../backend/function.inc.php";
include "../backend/dbh.inc.php";
$array = getAllReviewCustomer($conn,7);
print_r($array);
//was a success
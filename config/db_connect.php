<?php
// comment to database
$conn = mysqli_connect('localhost','root','','ninjapizza');
if(!$conn){
    echo "Connection Error". mysqli_connect_error();
}

?>
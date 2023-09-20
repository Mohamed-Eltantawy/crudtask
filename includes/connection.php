<!-- connection -->

<?php
    $conn = mysqli_connect('localhost' , 'root' , '' , 'employees');
    if(!$conn) {
        die('Connection Failed: ' . mysqli_connect_error());
    }
    
?>
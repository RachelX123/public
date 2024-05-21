<?php

$conn = mysqli_connect('mxiao02.webhosting3.eeecs.qub.ac.uk', 'mxiao02', 'lp6vnh7l7Fc45Dxp', 'mxiao02');

// check connect successfully
if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
} else {
    echo "Successful connection to the database!";
    
    
}

// Close the database connection (if no longer needed)
mysqli_close($conn);
?>
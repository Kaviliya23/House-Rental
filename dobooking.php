<?php
session_start();
include("connection.php");

$tenantid = $_GET['t'] ?? null; 
$houseid = $_GET['h'] ?? null;
$booking_date = $_GET['b'] ?? null;
$period = $_GET['p'] ?? null;
$price = $_GET['pr'] ?? null;
$agreement = $_GET['a'] ?? null; 

if (isset($_GET['submit'])) {
    if ($tenantid != "" && $houseid != "" && $booking_date != "" && $agreement != "" && $price != "") {
        $query = "INSERT INTO booking (t_id, h_id, booking_date, period, price, agreement) VALUES ('$tenantid', '$houseid', '$booking_date', '$period', '$price', '$agreement')";
        $data = mysqli_query($conn, $query);
        
        if ($data) {
            echo "<script type='text/javascript'>alert('Added successfully');
            window.location.href='booking.php';
            </script>";
        } else {
            echo "<script type='text/javascript'>alert('Unsuccessful');
            window.location.href='booking.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please fill in all fields.')
		window.location.href='booking.php';;</script>";
    }
}
?>

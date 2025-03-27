<?php
session_start();
include("connection.php");


$fname = isset($_GET['f']) ? $_GET['f'] : '';
$lname = isset($_GET['l']) ? $_GET['l'] : '';
$email = isset($_GET['e']) ? $_GET['e'] : '';
$pwd = isset($_GET['p']) ? $_GET['p'] : '';
$mob = isset($_GET['m']) ? $_GET['m'] : '';
$occ = isset($_GET['o']) ? $_GET['o'] : ''; 

if (isset($_GET['submit'])) {
    if ($fname != "" && $lname != "" && $email != "" && $pwd != "" && $mob != "") {
        $query = "INSERT INTO tenant (fname, lname, email, pwd, mobile_no, occupation) 
                  VALUES ('$fname', '$lname', '$email', '$pwd', '$mob', '$occ')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            $_SESSION['uname'] = $fname;
            header('location:home.php');
        } else {
            echo "<script type='text/javascript'>alert('Sign up unsuccessful');
            window.location.href='index.html';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please fill in all required fields.');
        window.location.href='index.html';
        </script>";
    }
}
?>

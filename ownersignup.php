<?php 
session_start();
include("connection.php");

$name = isset($_POST['f']) ? $_POST['f'] : '';
$email = isset($_POST['e']) ? $_POST['e'] : '';
$pwd = isset($_POST['p']) ? $_POST['p'] : '';
$mob = isset($_POST['m']) ? $_POST['m'] : '';
$occ = isset($_POST['o']) ? $_POST['o'] : '';
$nhouse = isset($_POST['n']) ? $_POST['n'] : '';
$country = isset($_POST['c']) ? $_POST['c'] : '';
$state = isset($_POST['s']) ? $_POST['s'] : '';
$city = isset($_POST['ci']) ? $_POST['ci'] : '';
$add = isset($_POST['a']) ? $_POST['a'] : '';

if (isset($_POST['submit'])) {
    if ($name != "" && $email != "" && $pwd != "" && $mob != "") {
        // Sanitize input
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $pwd = mysqli_real_escape_string($conn, $pwd);
        $mob = mysqli_real_escape_string($conn, $mob);
        $nhouse = mysqli_real_escape_string($conn, $nhouse);
        $country = mysqli_real_escape_string($conn, $country);
        $city = mysqli_real_escape_string($conn, $city);
        $add = mysqli_real_escape_string($conn, $add);

        $query = "INSERT INTO owner(name, email, pwd, mobile_no, no_of_houses, country, city, address) 
                  VALUES ('$name', '$email', '$pwd', '$mob', '$nhouse', '$country',  '$city', '$add')";
        
        $data = mysqli_query($conn, $query);

        if ($data) {
            $_SESSION['uname'] = $name;
            header('location:home.php');
            exit();
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

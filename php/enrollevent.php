<?php
//get ssn from query string
if(!isset($_GET['Event_id'])) {
    header("location:./home.php");
}
session_start();
include("connection.php");

$userId = $_SESSION["UserID"];
$eventId = $_GET['Event_id'];

//create the query
$sql = "insert into enrolled_by (User_id, Event_id)
VALUES ($userId, $eventId)";

try {
    $result = mysqli_query($mysqli, $sql);

    header("location: ./enrolledevents.php");
} catch (mysqli_sql_exception $e) {
    echo '
    <script>
        window.location.href="./activeevents.php";
        alert("Failed to enroll for event. Please check if you are already enrolled for this event.'.$e->getMessage().'")
    </script>
    ';
    } 
//close connection
$mysqli->close();
?>
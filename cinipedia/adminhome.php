<?php


$servername = "localhost";//Server Name
$username = "root";//Server User Name
$password = "";//Server Password
$dbname = "review";//Database Name

//Create DB Connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $image=$_POST["image"];
    $story=$_POST["story"];

    $sql =("INSERT INTO movie (name,rating,image,story) VALUES ('$name','$rating','$image','$story')");
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
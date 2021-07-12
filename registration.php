<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
    $conn = mysqli_connect("localhost","root","","registration");
    if(!$conn)
        die("Connection failed: " . mysqli_connect_error());
    else   
        echo "Successfully Connected";
        echo "<br>";
    $sql = "CREATE TABLE persons (
        firstname VARCHAR(30) NOT NULL,
        pass VARCHAR(30) NOT NULL,
        email  varchar(255),
        phone  varchar(10)
        )";
    
    if (mysqli_query($conn, $sql)) {
        echo "Table MyGuests created successfully";
    }
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $name=$_POST['name'];
        $pwd=$_POST['pass'];
        $email=$_POST['email'];
        $PhoneNumber=$_POST['PhoneNumber'];

        $sql = "INSERT INTO persons  VALUES ('$name','$pwd','$email','$PhoneNumber')";
        
        $query=mysqli_query($conn,$sql);

        // if the query is inserted successfully.

        if($query){
         echo "<table><tr><th>Name</th><th>password</th><th>email</th><th>mobile</th></tr>";
            echo "<tr><td>".$name."</td><td>".$pwd."</td><td>".$email."</td><td>".$PhoneNumber."</td></tr>";
        echo "</table>";
       
        }
        else{
            echo "oops! Error Occurred";
        }
        
        
    }

?>
</body>
</html>

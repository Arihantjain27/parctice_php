
<?php
    $insert = false;
    $server = "localhost";
    $username = "root";
    $password = "";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password);

    // Check connection
    /*if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connection successful";*/

    // Collect form data if POST request is made
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $rank = $_POST["rank"];
        $gun = $_POST["gun"];
        $skin = $_POST["skin"];

        // SQL query to insert data
        $sql = "INSERT INTO `valo`.`valorant` (`Name`, `email`, `age`, `rank`, `gun`, `skin`, `time`) VALUES ('$name', '$email', '$age', '$rank', '$gun', '$skin', current_timestamp());";
        
        // Debugging output
        echo "<br>";
       // echo $sql;

        // Execute query
        if($con->query($sql) === true){
            $insert = true;
           // echo "Record inserted successfully";
        }
        else {
            echo "Error: $sql <br> $con->error";
        }

        // Close connection
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorant World</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <img class="bg" src="bg.jpg" alt="Reaver">
    <div class="container">
        <h1>Valorant Lovers</h1>
        <p>Enter your details</p>
        <?php
            if($insert == true){
                echo "<p class='stb'> thnaks for your deatils</p>";
            }
            
        ?>

        <!-- HTML Form -->
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter name" required>
            <input type="email" name="email" id="email" placeholder="Enter email" required>
            <input type="text" name="age" id="age" placeholder="Enter age" required>
            <input type="text" name="rank" id="rank" placeholder="Enter your rank" required>
            <input type="text" name="gun" id="gun" placeholder="Enter favorite gun" required>
            <input type="text" name="skin" id="skin" placeholder="Enter favorite skin" required>
            <button type="submit" class="btn"><a href="index.php"></a> Submit</button>
        </form>
    </div>
</body>
</html>

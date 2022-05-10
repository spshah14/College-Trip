<?php
    $insert = false;
    if (isset($_POST['name'])) {
        # code...
        $server = "localhost";
        $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());

    }
    
        // echo "Server connected sucessfully";
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $mail = $_POST["email"];
    $phone = $_POST["phone"];
    
    $sql = "INSERT INTO `info`.`info` (`name`, `gender`, `age`, `email`, `phone`, `dt`) VALUES ('$name', '$gender', '$age', '$mail', '$phone', current_timestamp())";
    // echo $sql;
    if($con -> query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    $con -> close();
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US trip for college student</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Welcom to SVIT, Vasad US Trip form</h1>
        <p>Enter the details for confirm your participation in US trip</p>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
            }
        ?>
        <form action="index.php" method="post">
            <label for="name">
                Name: <input type="text" name="name" id="name" placeholder="Enter Your Name" class = "form-data" ><br>
            </label>
            <label for="gender">
                Gender:
                Male<input type="radio" name="gender" id="gender" value="Male">
                Female<input type="radio" name="gender" id="gender" value="Female"><br>
            </label>
            <label for="age">
                Age: <input type="number" name="age" placeholder="Enter Your Age" class = "form-data" ><br>
            </label>
            <label for="email">
                Email: <input type="email" name="email" id="email" placeholder="Enter Your Email ID" class = "form-data" ><br>
            </label>
            <label for="phone">
                Phone: <input type="tel" name="phone" id="phone" placeholder="Enter Your Phone Number" class = "form-data" ><br>
            </label>
            <button type="submit">SUBMIT</button>
        </form>
    </div>
    <!-- INSERT INTO `info` (`sr_no`, `name`, `gender`, `age`, `email`, `phone`, `dt`) VALUES ('1', 'SMART', 'male', '20', 'this@this.com', '1234567891', current_timestamp()); -->
</body>

</html>
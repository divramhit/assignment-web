<?php include_once('application_top.php'); ?>
<?php

    //get data from signup page
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $phonenum = $_POST["phonenum"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    //find existing users with the same username or email;
    $stmt = $conn -> prepare("SELECT * FROM client WHERE password = ? OR email = ?");
    $stmt -> bind_param("ss", $password, $email);
    $stmt -> execute();
    $result  = $stmt ->get_result();

    if ($result->num_rows > 0) {
        echo json_encode("Account with this email or username already exists");
        return false;
    }

    //Insert into DB
    $stmt = $conn -> prepare("INSERT INTO client (fname, lname, phonenum, dob, email, password, street, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param("ssssssss", $fname, $lname, $phonenum, $dob, $email, $password, $street, $city);

    //If Statement execution is not successfull, display error
    $response = $stmt->execute();
    if ($response == false) {
        echo json_encode(htmlspecialchars($stmt->error));
        return false;
    }

    //If all of the above statements are succesfull display the following
    echo json_encode("New user succesfully created");
    return true;
?>

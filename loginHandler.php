<?php include_once('application_top.php'); ?>
<?php

    //get data from login form
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn -> prepare("SELECT * FROM client WHERE email = ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result  = $stmt ->get_result();

    if ($result->num_rows <= 0) {
        echo json_encode("Account with the email " . $email . " does not exist");
        return false;
    }

    $user = $result->fetch_assoc();
    if (strcmp($user["password"], $password) != 0) {  //Statement to compare password in DB with password input
        echo json_encode("Wrong password for the account " . $email);
        return false;
    }

    $loggedUser = [
        "ClientID" => $user["ClientID"],
        "email" => $user["email"],
        "fname" => $user["fname"]
    ];

    $_SESSION["user"] = $loggedUser;
    echo json_encode("Login success");
    return true;
?>

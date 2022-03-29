<?php
    session_start();
    include_once("db.php");

    //get data from login form
    // $fname = filter_input(INPUT_POST, "fname" , FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $stmt = $conn -> prepare("SELECT * FROM client WHERE email = ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result  = $stmt ->get_result();

    if ($result->num_rows <= 0) {
        echo "Account with the email " . $email . " does not exist";
        return false;
    }

    $user = $result->fetch_assoc();
    if (strcmp($user["password"], $password) != 0) {
        echo "Wrong password for the account " . $email;
        return false;
    }

    $loggedUser = [
        "ClientID" => $user["ClientID"],
        "email" => $user["email"],
        "fname" => $user["fname"]
    ];

    $_SESSION["user"] = $loggedUser;
    echo "Login success!";
    return true;
?>

<?php
    session_start();
    include_once("db.php");

    $detailID = $_POST["detailID"];
    $quantity = $_POST["quantity"];
    $action = $_POST["action"];
    // $quantity = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_STRING);
    // $action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

    if (strcmp($action, "update") == 0) {
        $stmt = $conn -> prepare("UPDATE order_details SET quantity = ? WHERE detail_id = ?");
        $stmt -> bind_param("ii", $quantity, $detailID);
        $stmt->execute();

        $stmt = $conn -> prepare("SELECT * FROM order_details WHERE detail_id = ?");
        $stmt -> bind_param("i", $detailID);
        $stmt->execute();
        $result  = $stmt ->get_result();

        $details = $result->fetch_assoc();
        $data = array("detailID" => $details["detail_id"], "quantity" => $details["quantity"], "price" => $details["price"]);

        echo json_encode($data);
        return false;
    }

    if (strcmp($action, "remove") == 0) {
        $stmt = $conn -> prepare("DELETE FROM cart WHERE id = ?");
        $stmt -> bind_param("i", $cartid);
        $stmt -> execute();
    }
?>
<?php include_once('application_top.php'); ?>
<?php

   
        $action = $_POST["action"];

    if (strcmp($action, "update") == 0) {

        $detailID = $_POST["detailID"];
        $quantity = $_POST["quantity"];


        $stmt = $conn -> prepare("UPDATE order_details SET quantity = ? WHERE detail_id = ?");
        $stmt -> bind_param("ii", $quantity, $detailID);
        $stmt->execute();

        $stmt = $conn -> prepare("SELECT * FROM order_details WHERE detail_id = ?");
        $stmt -> bind_param("i", $detailID);
        $stmt->execute();
        $result  = $stmt ->get_result();
        $details = $result->fetch_assoc();

        $orderId  = $details['order_id'];


        $stmt2 = $conn -> prepare("SELECT sum(price*quantity) as sum_price FROM order_details WHERE order_id = ?");
        $stmt2 -> bind_param("i", $orderId);
        $stmt2->execute();
        $result2  = $stmt2 ->get_result();
        $details2 = $result2->fetch_assoc();
        $cart_total_price = $details2['sum_price'];

        
        $data = array("detailID" => $details["detail_id"], "quantity" => $details["quantity"], "price" => $details["price"],'total_price'=>$details["price"] * $details["quantity"], 'total_price_display'=>'Rs '.$details["price"] * $details["quantity"], 'cart_total_price'=> $cart_total_price ,'cart_total_price_display'=> 'Rs '.$cart_total_price);

        echo json_encode($data);
        return false;
    }elseif (strcmp($action, "remove_one") == 0) {

        $detailID = $_POST["detailID"];   
       

        $stmt = $conn -> prepare("SELECT * FROM order_details WHERE detail_id = ?");
        $stmt -> bind_param("i", $detailID);
        $stmt->execute();
        $result  = $stmt ->get_result();
        $details = $result->fetch_assoc();
        $orderId  = $details['order_id'];

        $stmt = $conn -> prepare("DELETE FROM order_details WHERE detail_id = ?");
       $stmt -> bind_param("i", $detailID);
       $stmt->execute();

        
        $stmt2 = $conn -> prepare("SELECT sum(price*quantity) as sum_price FROM order_details WHERE order_id = ?");
        $stmt2 -> bind_param("i", $orderId);
        $stmt2->execute();
        $result2  = $stmt2 ->get_result();
        $details2 = $result2->fetch_assoc();
        $cart_total_price = $details2['sum_price'];

        
        $data = array('cart_total_price'=> $cart_total_price ,'cart_total_price_display'=> 'Rs '.$cart_total_price);

        echo json_encode($data);

    }elseif (strcmp($action, "remove_all") == 0) {

        $orderId = $_POST["orderId"];   
       

        $stmt = $conn -> prepare("DELETE FROM order_details WHERE order_id = ?");
       $stmt -> bind_param("i", $orderId);
       $stmt->execute();


       $stmt2 = $conn -> prepare("DELETE FROM ordertable WHERE order_id = ?");
       $stmt2 -> bind_param("i", $orderId);
       $stmt2->execute();

       unset($_SESSION["order"]["order_id"]);

        
        $data = array('redirect'=>1,'cart_total_price'=> 0 ,'cart_total_price_display'=> 'Rs 0');

        echo json_encode($data);

    }elseif (strcmp($action, "add_cart") == 0) {

        $productId = $_POST["productId"];  

        if (isset($_SESSION["user"])){
            $clientId = $_SESSION["user"]["ClientID"];
        }  


        // check if order exist

        $stmt2 = $conn -> prepare("SELECT count(*) as count_order FROM ordertable WHERE clientID = ?");
        $stmt2 -> bind_param("i", $clientId);
        $stmt2->execute();
        $result2  = $stmt2 ->get_result();
        $details2 = $result2->fetch_assoc();
        $count_order = $details2['count_order'];

        if( empty($_SESSION["order"]["order_id"])){            
        
            $date = date('Y-m-d');
            $order_status = 0; 
            $stmt = $conn->prepare("INSERT INTO ordertable (clientID,order_date,order_status) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $clientId, $date , $order_status);
            $stmt->execute();
            $order_id = $conn->insert_id;
            $_SESSION["order"]["order_id"] = $order_id;

        }else{
            $order_id = $_SESSION["order"]["order_id"];
        }



        $stmt22 = $conn -> prepare("SELECT count(*) as count_order_detail FROM  order_details  WHERE order_id = ? and product_id = ? ");
        $stmt22 -> bind_param("ii", $order_id,$productId);
        $stmt22->execute();
        $result22  = $stmt22 ->get_result();
        $details22 = $result22->fetch_assoc();
        $count_order_detail = $details22['count_order_detail'];




        $stmt22 = $conn -> prepare("SELECT * FROM  product  WHERE ProductID = ? ");
        $stmt22 -> bind_param("i", $productId);
        $stmt22->execute();
        $result22  = $stmt22 ->get_result();
        $details22 = $result22->fetch_assoc();
        $price = $details22['ListPrice'];

       


        if($count_order_detail == 0){
            //insert
            $quantity = 1;

            $stmt = $conn->prepare("INSERT INTO order_details (product_id,order_id,quantity,price) VALUES (?, ?, ? , ?)");
            $stmt->bind_param("iiii", $productId, $order_id ,$quantity,$price);
            $stmt->execute();
            $order_detail_id = $conn->insert_id;    

        }else{
            $stmt = $conn->prepare(" UPDATE order_details SET quantity = (quantity + 1) , price = ? WHERE order_id = ? and product_id = ? ");
            $stmt -> bind_param("iii", $price,$order_id,$productId);
            $stmt->execute();
        }
        $data = array('status'=>'added');

        echo json_encode($data);

    }


 function insertOrder($conn){

    if (isset($_SESSION["user"])){
        $clientId = $_SESSION["user"]["ClientID"];
    }
     
    $stmt = $conn->prepare("INSERT INTO ordertable (clientID,order_date,order_status) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $clientId, date('Y-m-d'), 0);
    $stmt->execute();


 }


?>
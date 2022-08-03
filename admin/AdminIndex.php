<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >

  <script type="text/javascript" src="./src/js/functionAjax.js"></script>
  <script type="text/javascript" src="./src/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

        <?php
            include "./adminHeader.php";
            include "./sidebar.php";

            include_once "./config/dbconnect.php";
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Users:</h4>
                    <h5 id="number-of-clients" style="color:white;">
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Categories:</h4>
                    <h5 id="number-of-categories" style="color:white;">
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                <h4 style="color:white;">Total Products:</h4>
                <h5 id="number-of-products" style="color:white;"></h5>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total orders:</h4>
                    <h5 id="total-orders" style="color:white;">
                   </h5>
                </div>
            </div>
        </div>

    </div>



</body>
<script>
    $(document).ready(function(){
            //Get all Products
            $.ajax({
              type: "GET",
              url: 'http://localhost:8000/api/get-allproducts',
              dataType: 'json',
              success: function(response)
              {
                  console.log(Object.keys(response).length);
                  $('#number-of-products').html(Object.keys(response).length); //Add the count of products

              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

            //Get all Clients using API
            $.ajax({
              type: "GET",
              url: 'http://localhost:8000/api/get-allclients',
              dataType: 'json',
              success: function(response)
              {
                  console.log(Object.keys(response).length);
                  $('#number-of-clients').html(Object.keys(response).length);

              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

            //Get all Categories using API
            $.ajax({
              type: "GET",
              url: 'http://localhost:8000/api/get-allcategories',
              dataType: 'json',
              success: function(response)
              {
                  console.log(Object.keys(response).length);
                  $('#number-of-categories').html(Object.keys(response).length);

              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

            
            //Get all orders using API
            $.ajax({
              type: "GET",
              url: 'http://localhost:8000/api/get-allorders',
              dataType: 'json',
              success: function(response)
              {
                  console.log(Object.keys(response).length);
                  $('#total-orders').html(Object.keys(response).length);

              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });

    });

        //DELETE Product using API
        const deleteProduct = (productID) => {
        $.ajax({
            type: "POST",
            data: JSON.stringify({"product_id": productID}),
            url: 'http://localhost:8000/api/delete-product',
            dataType: 'json',
            success: function(response)
            {
                // console.log(Object.keys(response).length);
                // $('#number-of-categories').html(Object.keys(response).length);
                console.log(response);
                window.location.reload();   

            },
            error: function(response)
            {
            alert("Invalid Credentials");
            }
        }); 
    }
</script>

</html>

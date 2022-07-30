function showCustomers(){
    $.ajax({
        url:"./view_customers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showCategory(){
    $.ajax({
        url:"./view_category.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showProductItems(){
    $.ajax({
        url:"./view_products.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showOrders(){
    $.ajax({
        url:"./view_order.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
/*function showReviews(){
    $.ajax({
        url:"./view_reviews.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}*/

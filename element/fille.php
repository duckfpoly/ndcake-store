<?php 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else {
        $page = '';
    }
    if($page == "products") {
        include('products.php');
    }
    elseif($page == "about"){
        include('about.php');
    }
    elseif($page == "contact"){
        include('contact.php');
    }
    elseif($page == "product_detail"){
        include('product_detail.php');
    }
    elseif($page == "profile_guest"){
        include('profile_guest.php');
    }
    elseif($page == "spc"){
        include('shoppingcart.php');
    }
    elseif($page == "order"){
        include('order.php');
    }
    elseif($page == "ordersucces"){
        include('ordersucces.php');
    }
    elseif($page == "myorder"){
        include('myorder.php');
    }
    elseif($page == "myordetail"){
        include('myordetail.php');
    }
    elseif($page == "search"){
        include('search.php');
    }
    elseif($page == "products_search"){
        include('products_search.php');
    }
    elseif($page == "news"){
        include('news.php');
    }
    elseif($page == "fixuser"){
        include('fixuser.php');
    }
    elseif($page == "sendmail"){
        include('sendmail/send.php');
    }
    else {
        include('home.php');
    }
?>

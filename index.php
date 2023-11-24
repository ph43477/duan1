<?php
    include "view/header.php";
    if (isset($_GET['act'])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'about':
            include "view/about.php";
            break;
        
        default:
            include "view/home.php";
            break;

        case 'shop':
            include "view/shop.php";
            break;

        case 'detail':
            include "view/detail.php";
            break;

        case 'giohang':
            include "view/giohang.php";
            break;

        case 'checkout':
            include "view/checkout.php";
            break;

    }
}else{
    include "view/home.php";
}
    
    include "view/footer.php";
    
?>
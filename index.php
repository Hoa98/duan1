<?php
ob_start();
require_once "golbal.php";
require_once "libs/categories.php";
require_once "libs/products.php";
require_once "libs/gallery.php";
require_once "libs/comments.php";
require_once "libs/users.php";
extract($_REQUEST);
$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
    case '':
    case 'home':
        $view_page = "site/home.php";
        break;
    case 'detail':
        $pro = product_list_one($id);
        $title = $pro['name'];
        $view_page = "site/detail.php";
        break;
    case 'product-list':
        $view_page = "site/product-list.php";
        break;
    case 'cart':
        $view_page = "site/cart.php";
        break;
    case 'contact':
        $view_page = "site/contact.php";
        break;
    case 'introduce':
        $view_page = "site/introduce.php";
        break;
    case 'sale':
        $view_page = "site/product-sale.php";
        break;
    case 'new':
        $view_page = "site/product-new.php";
        break;
    case 'profile':
        $view_page = "site/profile.php";
        break;
    case 'search':
        $view_page = "site/search.php";
        break;
    case 'deleteCart':
        $view_page = "site/deleteCart.php";
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('location:' . ROOT);
        die();
        break;
    default:
    $view_page = "site/404.php";
        break;
}
include_once "layout/layout.php";
if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
ob_end_flush();

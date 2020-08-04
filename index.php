<?php
ob_start();
require_once "golbal.php";
require_once "libs/libraries.php";
require_once "libs/members.php";
require_once "libs/services.php";

extract($_REQUEST);
$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
    case '':
    case 'home':
        $view_page = "site/home.php";
        break;
    case 'product-detail':
        // $pro = product_list_one($id);
        // $title = $pro['name'];
        $view_page = "site/product-detail.php";
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
    case 'service':
        $view_page = "site/service.php";
        break;
    case 'blog':
        $view_page = "site/blog.php";
        break;
        case 'blog-detail':
            $view_page = "site/blog-detail.php";
            break;
    case 'profile':
        $view_page = "site/profile.php";
        break;
    case 'search':
        $view_page = "site/search.php";
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

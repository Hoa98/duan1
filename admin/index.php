<?php
ob_start();
require_once '../golbal.php';
$page = isset($_GET['page']) ? $_GET['page'] : '';
require_once '../libs/categories.php';
require_once '../libs/products.php';
require_once '../libs/types.php';
require_once '../libs/services.php';
require_once '../libs/word_time.php';
include_once 'template/header.php';
// check_role();
switch ($page) {
    case '':
    case 'home':
        include_once 'home/home.php';
        break;
    case 'category':
        //Lấy hành động trong categories
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                //Thêm vào giao diện hiển thị categories
                include_once 'categories/index.php';
                break;
            case 'add':
                include_once 'categories/create.php';
                break;
            case 'edit':
                include_once 'categories/edit.php';
                break;
        }
        break;
    case 'product':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'products/index.php';
                break;
            case 'add':
                include_once 'products/create.php';
                break;
            case 'search':
                include_once 'products/search.php';
                break;
            case 'edit':
                include_once 'products/edit.php';
                break;
        }
        break;
        case 'type':
            //Lấy hành động trong categories
            $action = isset($_GET['action']) ? $_GET['action'] : '';
            switch ($action) {
                case '':
                    //Thêm vào giao diện hiển thị categories
                    include_once 'types/index.php';
                    break;
                case 'add':
                    include_once 'types/create.php';
                    break;
                case 'edit':
                    include_once 'types/edit.php';
                    break;
            }
            break;
        case 'service':
            $action = isset($_GET['action']) ? $_GET['action'] : '';
            switch ($action) {
                case '':
                    include_once 'services/index.php';
                    break;
                case 'add':
                    include_once 'services/create.php';
                    break;
                case 'search':
                    include_once 'services/search.php';
                    break;
                case 'edit':
                    include_once 'services/edit.php';
                    break;
            }
            break;
            case 'time':
                $action = isset($_GET['action']) ? $_GET['action'] : '';
                switch ($action) {
                    case '':
                        include_once 'times/index.php';
                        break;
                    case 'add':
                        include_once 'times/create.php';
                        break;
                    case 'edit':
                        include_once 'times/edit.php';
                        break;
                }
                break;
    case 'logout':
        unset($_SESSION['user']);
        header('location:' . ROOT . 'admin/login.php');
        die;
        break;
    default:
        echo "404 Not found";
        break;
}

include_once 'template/footer.php';

if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
?>

<?php
ob_end_flush();

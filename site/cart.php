<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$products = product_list_one('id',$id);
if(isset($_SESSION['customer'])){
	if (isset($_REQUEST['add-to-cart'])) {
		$quantity = $_REQUEST['qty'];
		if (!isset($_SESSION['cartCustom'][$_SESSION['customer']['id']][$id])) {
			$_SESSION['cartCustom'][$_SESSION['customer']['id']][$id] = array(
				"id" => $products['id'],
				"name" => $products['name'],
				"images" => $products['images'],
				"quantity" => $quantity,
				"price" => $products['price'],
				"sale"=>$products['sale']
			);
		} else {
			$_SESSION['cartCustom'][$_SESSION['customer']['id']][$id]['quantity'] += $quantity;
		}
	}
	if (!empty($_SESSION['cartCustom'][$_SESSION['customer']['id']])) {
		$cartCustom = $_SESSION['cartCustom'][$_SESSION['customer']['id']];
	}
}else{
	if (isset($_REQUEST['add-to-cart'])) {
		$quantity = $_REQUEST['qty'];
		if (!isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id] = array(
				"id" => $products['id'],
				"name" => $products['name'],
				"images" => $products['images'],
				"quantity" => $quantity,
				"price" => $products['price'],
				"sale"=>$products['sale']
			);
		} else {
			$_SESSION['cart'][$id]['quantity'] += $quantity;
		}
		
	}
	if (!empty($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
}

?>
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay">
    <h3>Giỏ hàng</h3>
</div>
<!-- bradcam_area_end -->
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <?php if(isset($cartCustom) && isset($_SESSION['customer'])): ?>
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cartCustom as $c): ?>
                            <tr>
                                <td class="cart-pic first-row"><img src="images/products/<?=$c['images']?>" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5><?=$c['name']?></h5>
                                </td>
                                <td class="p-price first-row"><?=$c['price']?></td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="<?=$c['quantity']?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row"><?=($c['price']*$c['quantity'])?></td>
                                <td class="close-td first-row"><i class="ti-close"></i></td>
                                <td class="close-td first-row"><i class="ti-save"></i></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>$240.00</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php elseif (isset($cart)) : ?>
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cart as $c): ?>
                            <tr>
                                <td class="cart-pic first-row"><img src="images/products/<?=$c['images']?>" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5><?=$c['name']?></h5>
                                </td>
                                <td class="p-price first-row"><?=$c['price']?></td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="<?=$c['quantity']?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row"><?=($c['price']*$c['quantity'])?></td>
                                <td class="close-td first-row"><i class="ti-close"></i></td>
                                <td class="close-td first-row"><i class="ti-save"></i></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>$240.00</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="empty-cart">
                <div class="cart"></div>
                <div class="title">Giỏ hàng của bạn còn trống</div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
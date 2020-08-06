<?php 
$pro = product_list_one('id',isset($_GET['id']) ? $_GET['id'] : '');
$gallery = gallery_list(isset($_GET['id']) ? $_GET['id'] : '');
$product_list = product_list_category($pro['id_category'], $pro['id'],0,4);
update_view($pro['id']);
?>
 <!-- bradcam_area_start -->
 <div class="bradcam_area breadcam_bg overlay">
 	<h3>Chi tiet san pham</h3>
 </div>
 <!-- bradcam_area_end -->

<div class="container section-padding">
    <main>
        <div class="row mt-3">
            <div class="col-md-12">
                <article>
                    <section class="section section-sm section-first bg-default">
                        <div class="container">
                            <div class="row row-50">
                                <div class="col-lg-6">
                                    <!-- Slider anh san pham -->
                                    <div class="slides">
                                        <ul class="pgwSlideshow">
                                            <?php foreach ($gallery as $gall) : ?>
                                                <li><img src="images/products/<?= $gall['images'] ?>" alt="">
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="single-product">
                                        <h4 class="font-weight-normal"><?= $pro['name'] ?></h4>
                                        <div class="group-md group-middle mt-3">
                                            <div class="single-product-price bg-light pt-3 pl-3 mb-3">
                                                <?php if ($pro['sale'] > 0) : ?>
                                                    <div class="old-price d-inline-block mr-4">
                                                        <del> <?=number_format($pro['price'],0,',','.').' đ'; ?></del>
                                                    </div>
                                                <?php endif; ?>
                                                <p class="list-price d-inline-block">  <?=number_format($price= $pro['price']-($pro['price']*$pro['sale']),0,',','.').' đ';?></p>
                                                <?php if ($pro['sale'] > 0) : ?>
                                                    <div class="sale d-inline-block ml-4">
                                                        <span class="percent">-<?= ($pro['sale'] * 100) . '%' ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="status">
                                            <p>Trạng thái: <?= ($pro['status'] == 1) ? 'Còn hàng' : 'Hết hàng' ?></p>
                                        </div>
                                        <div class="view">
                                            <p>Lượt xem: <?= $pro['views'] ?></p>
                                        </div>
                                      
                                        <form action="?page=cart&id=<?= $pro['id'] ?>" method="post">
                                            <div class="group-sm group-middle mt-3 d-inline-block">
                                                <div class="product-stepper d-inline-block mr-5">
                                                    <input class="form-input" type="number" name="qty" value="1" min="1" max="1000">
                                                </div>
                                                <div class="add-cart d-inline-block ml-5">
                                                    <button class="btn text-uppercase" name="add-to-cart">Thêm vào giỏ</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="mt-3">
                                            <span class="social-title">Chia sẻ</span>
                                            <div class="socials-share">
                                                <a class="bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo getCurURL(); ?>" target="_blank"><span class="fa fa-facebook-f"></span> Share</a>
                                                <a class="bg-twitter" href="https://twitter.com/share?text=<?php echo urlencode($pro['name']); ?>&url=<?php echo getCurURL(); ?>" target="_blank"><span class="fa fa-twitter"></span> Tweet</a>
                                                <a class="bg-email" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to&su=<?= $pro['name'] ?>&body=<?php echo getCurURL(); ?>" target="_blank"><span class="fa fa-envelope"></span> Gmail</a>
                                                <a class="bg-pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo getCurURL(); ?>&media=http://localhost/Ass_duanmau/images/products/<?= $pro['images'] ?>&description=<?= $pro['name'] ?>" target="_blank"><span class="fa fa-pinterest"></span> Pinterest</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bootstrap tabs-->
                            <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-5">
                                <!-- Nav tabs-->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item" role="presentation"><a class="nav-link active text-uppercase" href="#tabs-5-1" data-toggle="tab">Bình luận</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link text-uppercase" href="#tabs-5-2" data-toggle="tab">Thông tin chi tiết</a></li>
                                </ul>
                                <!-- Tab panes-->
                                <div class="tab-content mb-5">
                                    <div class="tab-pane fade show active p-3 border border-top-0" id="tabs-5-1">
                                     <!-- Binh luan  -->

                                    </div>
                                    <div class="tab-pane fade p-3 border border-top-0" id="tabs-5-2">
                                        <p class="text-justify"><?= $pro['description'] ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Slider sản phẩm liên quan -->
                    <section class="section section-sm section-last bg-default">
                        <div class="container">
                            <h4 class="text-uppercase text-center mb-5">sản phẩm liên quan</h4>
                            <div class="slider">
                                <div class="product-active">
                                    <?php foreach ($product_list as $pro_list) : ?>
                                        <div class="slider-item">
                                          <div class="product-item">
 									<div class="pi-pic">
 										<a href="<?=ROOT?>?page=product-detail&id=<?=$pro_list['id']?>">
                                         <img src="images/products/<?= $pro_list['images'] ?>" alt="<?= $pro_list['name'] ?>" width="270" height="303" title="<?= $pro_list['name'] ?>">
                                         </a>
 										<?php if ($pro_list['sale'] > 0) : ?>
 											<div class="sale pp-sale"><?= ($pro_list['sale'] * 100) . '%' ?></div>
 										<?php endif; ?>
 										<ul>
 											<li class="w-icon active"><a href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
 											<li class="quick-view"><a href="shopping-cart.html">+ Thêm</a></li>
 											<li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
 										</ul>
 									</div>
 									<div class="pi-text">
 										<a href="<?=ROOT?>?page=product-detail&id=<?=$pro_list['id']?>">
 											<h5><?= substr($pro_list['name'], 0, 28) . $str = (strlen($pro_list['name']) > 28 ? '...' : '') ?></h5>
 										</a>
 										<div class="product-price">
                                             <?= number_format($pro_list['price'], 0, ',', '.') . 'đ' ?>
                                             <span><i class="fa fa-eye ml-3 mr-1" aria-hidden="true"></i><?=$pro_list['views']?></span>
 										</div>
 									</div>
 								</div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                           
                        </div>
                    </section>
                    <script>
                       
                    </script>
                </article>
            </div>
        </div>
    </main>
</div>
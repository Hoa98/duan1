 <!-- footer -->
 <footer class="footer">
     <div class="footer_top">
         <div class="container">
             <div class="row">
                 <div class="col-xl-3 col-md-6 col-lg-3">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                             Tham gia với chúng tôi
                         </h3>
                         <p class="footer_text doanar">
                             <a class="popup-with-form" href="#test-form">Đặt lịch hẹn</a>
                             <br />
                             <a href="#">+10 378 478 2789</a>
                         </p>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6 col-lg-3">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                             Địa chỉ
                         </h3>
                         <p class="footer_text">
                             154, Cầu Giấy, Hà Nội <br />
                             +10 367 267 2678 <br />
                             <a class="domain" href="#">contact@barbershop.com</a>
                         </p>
                         <div class="socail_links">
                             <ul>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-facebook-square"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-twitter"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-instagram"></i>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-2 col-md-6 col-lg-2">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                             Menu
                         </h3>
                         <ul>
                             <li><a href="#">Trang chủ</a></li>
                             <li><a href="#">Giới thiệu</a></li>
                             <li><a href="#">Dịch vụ</a></li>
                             <li><a href="#">Tin tức</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-4 col-md-6 col-lg-4">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                             Bản tin
                         </h3>
                         <form action="#" class="newsletter_form">
                             <input type="text" placeholder="Nhập địa chỉ email của bạn" />
                             <button type="submit">Đăng ký</button>
                         </form>
                         <p class="newsletter_text">
                             Đăng ký nhận tin mới của chúng tôi
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="copy-right_text">
         <div class="container">
             <div class="footer_border"></div>
             <div class="row">
                 <div class="col-xl-12">
                     <p class="copy_right text-center">
                         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                         Copyright &copy;
                         <script>
                         document.write(new Date().getFullYear());
                         </script>
                         All rights reserved | This template is made with
                         <i class="fa fa-heart-o" aria-hidden="true"></i> by
                         <a href="https://colorlib.com" target="_blank">Poly-barber</a>
                         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- footer -->
 <!-- link that opens popup -->

 <!-- form itself end-->
 <form id="test-form" class="white-popup-block mfp-hide">
     <div class="popup_box">
         <div class="popup_inner">
             <h3>Đặt lịch hẹn</h3>
             <form action="" method="POST">
                 <div class="row">
                     <div class="col-xl-6 col-md-6">
                         <select name="day" id="day" class="form-select wide" required>
                             <option value="">Chọn ngày hẹn</option>
                             <option value="<?= date("Y-m-d") ?>">Hôm nay: <?= date("Y-m-d") ?></option>
                             <option value="<?= $date1 = date_format(date_modify($date, "+1 day"), "Y-m-d") ?>">Ngày
                                 mai: <?= $date1 ?></option>
                             <option value="<?= $date2 = date_format(date_modify($date, "+1 day"), "Y-m-d") ?>">Ngày
                                 kia: <?= $date2 ?></option>
                         </select>
                         <div class="invalid-feedback">
                             Vui lòng chọn ngày hẹn
                         </div>
                     </div>

                     <div class="col-xl-6 col-md-6">
                         <select class="form-select wide" id="default-select" class="">
                             <option data-display="Chọn stylelist">Chọn stylelist</option>
                             <?php foreach($member as $m): ?>
                             <option value="<?=$m['id']?>"><?=$m['fullname']?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-xl-6 col-md-6 select-service">
                         <select class="mul-select form-select wide" multiple="true">
                             <?php foreach($service as $s): ?>
                             <option value="<?=$s['id']?>"><?=$s['name']?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="col-xl-6 col-md-6" id="result">
                     </div>
                 </div>
                 <div class="row mt-3">
                     <div class="col-xl-6 col-md-6">
                         <input type="text" placeholder="Tên của bạn" />
                     </div>
                     <div class="col-xl-6 col-md-6">
                         <input type="text" placeholder="Số điện thoại" />
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-xl-12">
                         <button type="submit" class="boxed-btn3">Đặt lịch</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </form>
 <!-- form itself end -->
 <!-- form-login -->
 <form  action="" id="login-form" class="white-popup-block mfp-hide">
        <div class="popup_box">
            <div class="popup_inner">
                <form action="">
                    <h3>Welcome to PolyBarber</h3> 
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <img src="" class="img-fluid" alt="">
                        </div>
                        <div class="col-xd-6 col-md-6">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="" placeholder="Tên đăng nhập hoặc số điện thoại ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="password" class="" placeholder="Mật khẩu">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input style="width:auto;height:auto; margin-right: 10px" id="my-input"  type="checkbox" name=""><label for="my-input">Nhớ đăng nhập</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <button  type="submit" class="btn boxed-btn3">Đăng nhập</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <a  href="">Quên mật khẩu?</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
 <!-- form-login -->

 <script src="content/js/vendor/jquery-2.1.3.min.js"></script>
 <!-- JS here -->
 <script src="content/js/vendor/modernizr-3.5.0.min.js"></script>
 <!-- <script src="content/js/vendor/jquery-1.12.4.min.js"></script> -->
 <script src="content/js/popper.min.js"></script>
 <script src="content/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
 <script src="content/js/owl.carousel.min.js"></script>
 <script src="content/js/isotope.pkgd.min.js"></script>
 <script src="content/js/ajax-form.js"></script>
 <script src="content/js/waypoints.min.js"></script>
 <script src="content/js/jquery.counterup.min.js"></script>
 <script src="content/js/imagesloaded.pkgd.min.js"></script>
 <script src="content/js/scrollIt.js"></script>
 <script src="content/js/jquery.scrollUp.min.js"></script>
 <script src="content/js/wow.min.js"></script>
 <script src="content/js/nice-select.min.js"></script>
 <script src="content/js/jquery.slicknav.min.js"></script>
 <script src="content/js/jquery.magnific-popup.min.js"></script>
 <script src="content/js/plugins.js"></script>
 <script src="content/js/gijgo.min.js"></script>
 <script src="content/js/pgwslideshow.min.js"></script>
 <!--contact js-->
 <script src="content/js/contact.js"></script>
 <script src="content/js/jquery.ajaxchimp.min.js"></script>
 <script src="content/js/jquery.form.js"></script>
 <script src="content/js/jquery.validate.min.js"></script>
 <script src="content/js/mail-script.js"></script>
 <script src="content/js/bootstrap-input-spinner.js"></script>


 <script src="content/js/main.js"></script>
 <script>
$(document).ready(function() {
    $(".mul-select").select2({
        placeholder: "Chọn dịch vụ",
        tags: true,
        tokenSeparators: ['/', ',', ',', " "]
    });
    $('#default-select').change(function() {
        var id = $('#default-select').val();
        var day = $('#day').val();
        $.post("site/xulyTime.php", {
            id: id,
            day: day
        }, function(data) {
            $('#result').html(data);
        });
    });
    $('#day').change(function() {
        var id = $('#default-select').val();
        var day = $('#day').val();
        $.post("site/xulyTime.php", {
            id: id,
            day: day
        }, function(data) {
            $('#result').html(data);
        });
    });
});
$("#datepicker").datepicker({
    iconsLibrary: "fontawesome",
    disableDaysOfWeek: [0, 0],
    //     icons: {
    //      rightIcon: '<span class="fa fa-caret-down"></span>'
    //  }
});
$("#datepicker2").datepicker({
    iconsLibrary: "fontawesome",
    icons: {
        rightIcon: '<span class="fa fa-caret-down"></span>',
    },
});
var timepicker = $("#timepicker").timepicker({
    format: "HH.MM",
});
 </script>
 </body>

 </html>
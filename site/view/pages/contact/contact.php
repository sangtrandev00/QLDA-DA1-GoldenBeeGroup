<style>
.message-box input {
    margin-bottom: 5px;
}
</style>
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80 section">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-photo">
                        <img class="col-12 col-xl-8 d-flex align-items-center justify-content-center"
                            src="assets/images/banner/contact-us-banner.png" alt="Error">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper section">

    <!-- ADDRESS SECTION START -->
    <div class="address-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-address box-shadow">
                        <i class="zmdi zmdi-pin"></i>
                        <h6> Tòa nhà T, QTSC9, Tô Ký, Quận 12, Thành phố Hồ Chí Minh</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-address box-shadow">
                        <i class="zmdi zmdi-phone"></i>
                        <h6><a href="tel:0866732171">0866732171</a></h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-address box-shadow">
                        <i class="zmdi zmdi-email"></i>
                        <h6><a href="mailto:dan11102003net@gmail.com">dan11102003net@gmail.com</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADDRESS SECTION END -->

    <!-- GOOGLE MAP SECTION START -->
    <div class="google-map-section">
        <div class="container-fluid">
            <div class="google-map plr-185">

                <iframe class="w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.448398387047!2d106.62473744906903!3d10.85345983653495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528dfcf546de7%3A0xf872809fb8deded!2zVHLGsMahzIBuZyBDYW8gxJDEg8yJbmcgRlBUIFBvbHl0ZWNobmljIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1678973574476!5m2!1svi!2s"
                    width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </div>
    <!-- GOOGLE MAP SECTION END -->

    <!-- MESSAGE BOX SECTION START -->
    <div class="message-box-section mt-50 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="message-box box-shadow white-bg">
                        <form id="contact-form" action="index.php?act=feedback-ct" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="blog-section-title border-left mb-30">Liên Lạc</h4>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Tên của bạn">
                                    <p class="error-message">
                                        <?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email của bạn">
                                    <p class="error-message">
                                        <?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="title" placeholder="Chủ đề">
                                    <p class="error-message">
                                        <?php echo isset($error['title']) ? $error['title'] : ''; ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" placeholder="Điện thoại của bạn">
                                    <p class="error-message">
                                        <?php echo isset($error['phone']) ? $error['phone'] : ''; ?></p>
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="custom-textarea" name="content"
                                        placeholder="Tin nhắn của bạn"></textarea>
                                    <p class="error-message">
                                        <?php echo isset($error['content']) ? $error['content'] : ''; ?></p>
                                </div>
                                <input type="submit" name="guitn" value="Gửi tin nhắn"
                                    class="submit-btn-1 mt-30 btn-hover-1">
                            </div>
                            <p class="form-message"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MESSAGE BOX SECTION END -->
</section>
<!-- End page content -->
<!-- Bootstrap bundle JS -->
<script src="admin/assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="admin/assets/js/jquery.min.js"></script>
<script src="admin/assets/js/pace.min.js"></script>

<!-- Jquery Validate https://jqueryvalidation.org/documentation/ cdn lib-->
<!-- Jquery Validate https://jqueryvalidation.org/documentation/ cdn lib-->
<script src="site/assets/js/jquery.validate.min.js"></script>
<script src="site/assets/js/additional-methods.min.js"></script>
<script src="site/assets/js/validate.js"></script>
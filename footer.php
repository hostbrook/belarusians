
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">

                            <!-- Widget area: Footer-Info (Left) -->
                            <?php dynamic_sidebar( 'footer-info' ); ?>
                            <!-- /Widget area -->

                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">

                        <!-- Widget area: Footer-Menu (Left) -->
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                        <!-- /Widget area -->

                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">

                        <!-- Widget area: Footer-Menu (Right) -->
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                        <!-- /Widget area -->

                    </div>

                    <div class="col-lg-4 col-md-6 ">
                        <div class="footer-newsletter">

                            <!-- Widget area: Footer-newsletter (Right) -->
                            <?php dynamic_sidebar( 'footer-newsletter' ); ?>
                            <!-- /Widget area -->

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">

                        <!-- Widget area: Copyright Left -->
                        <?php dynamic_sidebar( 'copyright-left' ); ?>
                        <!-- /Widget area -->

                    </div>
                </div>
    
                <div class="order-first order-lg-last">
                    <div class="copyright">

                        <!-- Widget area: Copyright Right -->
                        <?php dynamic_sidebar( 'copyright-right' ); ?>
                        <!-- /Widget area -->

                    </div>
                </div>
    
            </div>
        </div>


    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= get_theme_file_uri('/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Glightbox - pure javascript lightbox to display images, iframes, inline content and videos -->
    <script src="<?= get_theme_file_uri('/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <!-- Isotope - Filter & sort magical layouts -->
    <script src="<?= get_theme_file_uri('/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <!-- Swiper - Most modern mobile touch slider and framework with hardware accelerated transitions -->
    <script src="<?= get_theme_file_uri('/vendor/swiper/swiper-bundle.min.js'); ?>"></script>

    <!-- WP -->
    <?php wp_footer(); ?>
    <!-- /WP -->
</body>

</html>
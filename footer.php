
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
                        <h4>Суполкі</h4>
<?php  wp_nav_menu(array( 'theme_location' => 'footerMenuLeft', 'depth' => 1, 'container' => '', 'before' => '<i class="bx bx-chevron-right"></i> ' )); ?>
                        <!--<ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.belarusian.ca/be/ottawa-chapter/" target="_blank">Суполка ў Аттаве</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.belarusian.ca/be/toronto-chapter/" target="_blank">Суполка ў Таронта</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.facebook.com/groups/260880037671053" target="_blank">Суполка ў Калгары</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.facebook.com/groups/belbc/" target="_blank">Беларусы ў ВС</a></li>
                        </ul>-->
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Партнёры</h4>
<?php  wp_nav_menu(array( 'theme_location' => 'footerMenuRight', 'depth' => 1, 'container' => '', 'before' => '<i class="bx bx-chevron-right"></i> ' )); ?>
                        <!--<ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="http://www.radabnr.org/" target="_blank">Рада БНР</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://binim.org" target="_blank">БІНіМ Канады</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://ceecouncil.org" target="_blank">CEE Council</a></li>
                        </ul>-->
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

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h4>Згуртаванне Беларусаў Канады</h4>
                            <p>
                            524 St. Clarens Ave, <br>
                            Toronto, ON<br>
                            Canada, M6H 3W7
                            <br><br>
                            <strong>E-mail:</strong> bca@belarusians.ca<br>
                            </p>
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

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Наша рассылка</h4>
                        <form action="" method="post">
                            <input type="email" name="email" placeholder="Ваш E-mail"><input type="submit" value="Падпісацца">
                        </form>
                        <div class="social-links mt-3">
                            <a href="http://twitter.com/belaruscanada"><i class="bx bxl-twitter"></i></a>
                            <a href="http://facebook.com/belarusian.canadian.alliance"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.linkedin.com/company/belarusian-canadian-alliance"><i class="bx bxl-linkedin"></i></a>
                            <a href="https://www.instagram.com/belaruscanada/"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        <p>&copy;2022 <a class="credits" href="https://belarusian.ca">belarusians.ca</a></p>
                    </div>
                </div>
    
                <div class="order-first order-lg-last">
                    <div class="copyright">
                        <a class="credits" href="<?= get_theme_file_uri('/privacy-policy'); ?>">Палітыка прыватнасці.</a>
                        <a class="credits" href="<?= get_theme_file_uri('/terms-and-conditions'); ?>">Ужыванне тэрмінаў.</a>
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

    <!-- Template Main JS File -->
    <script src="<?= get_theme_file_uri('/js/main.js'); ?>"></script>

<?php wp_footer(); ?>
</body>

</html>
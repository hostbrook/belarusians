<?php
/**
 * Template to show page "About"
 */
get_header();

while(have_posts()) {
    the_post(); ?>
    
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h2><?php the_title(); ?></h2>
        <ol>
            <li><a href="<?= site_url(); ?>">Галоўная</a></li>
            <li><?php the_title(); ?></li>
        </ol>
        </div>

    </div>
    </section><!-- End Breadcrumbs -->

    <?php the_content(); ?>

</main><!-- End #main -->

<?php 
}

get_footer();
?>
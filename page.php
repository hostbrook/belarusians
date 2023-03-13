<?php
/**
 * Template to show single pages
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
            <li><a href="<?= site_url(); ?>"><?php if (lang('en')): ?>Home<?php else :?>Галоўная<?php endif; ?></a></li>
            <li><?php the_title(); ?></li>
        </ol>
        </div>

    </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Page ======= -->
    <section id="page" class="page">
        <div class="container">

        <?php the_content(); ?>

        </div>
    </section><!-- End Page -->

</main><!-- End #main -->

<?php 
}

get_footer();
?>
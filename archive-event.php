<?php
/**
 * Template to show all events
 */
get_header();
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h2>Падзеi</h2>
    <ol>
        <li><a href="<?= site_url(); ?>">Галоўная</a></li>
        <li>Падзеi</li>
    </ol>
    </div>

</div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">

            <!-- Blog posts -->
            <div class="col-lg-8">

                <div class="row gy-4 posts-list">
                <?php 
                while (have_posts()) :
                    the_post();
                    $eventDate = new DateTime(get_field('event_date'));
                    $today = date('Y-m-d H:i');
                ?>

                    <article class="d-flex flex-column events">

                        <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                        <div class="post-img">
                            <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                        </div>
                        <?php endif; ?>
    
                        <h2 class="title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
    
                        <ul class="event-info">
                            <li><i class="bi bi-geo-alt"></i> <?php the_field('event_location'); ?></li>
                            <li><i class="bi bi-clock"></i> <?= $eventDate->format('F j, Y g:i a'); ?>
                            <?php if ($today > get_field('event_date')): ?>
                                <span class="badge rounded-pill bg-danger">Event completed!</span>
                            <?php endif; ?></li>
                        </ul>
    
                        <div class="content">
                        <?= has_excerpt() ? the_excerpt() : the_content(); ?>
                        </div>
        
                        <div class="read-more mt-auto align-self-end">
                            <a href="<?php the_permalink(); ?>">Чытаць болей</a>
                        </div>

                    </article>

                <?php endwhile; ?>
                </div>
                <!-- End blog posts list -->

                <!-- Pagination -->
                <?php the_posts_pagination(); ?>
                <!-- End Pagination -->

            </div>
            <!-- End Blog posts -->

            <?php get_sidebar(); ?>

        </div>
    </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->

<?php get_footer(); ?>
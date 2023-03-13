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
    <h2><?php if (lang('en')): ?>Events<?php else :?>Падзеi<?php endif; ?></h2>
    <ol>
        <li><a href="<?= site_url(); ?>"><?php if (lang('en')): ?>Home<?php else :?>Галоўная<?php endif; ?></a></li>
        <li><?php if (lang('en')): ?>Events<?php else :?>Падзеi<?php endif; ?></li>
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

                $today = date('Y-m-d H:i');
                $events = new WP_Query([
                    'post_type' => 'event',
                    'posts_per_page' => 20,
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'meta_query' => [
                        [
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today
                        ]
                    ]
                ]);

                $eventsQty = $events->found_posts;

                while($events->have_posts()) {
                    $events->the_post();
                    $eventDate = new DateTime(get_field('event_date'));
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
                                <span class="badge rounded-pill bg-danger"><?php if (lang('en')): ?>Event completed!<?php else :?>Падзея закончылась.<?php endif; ?></span>
                            <?php endif; ?></li>
                            <li><i class="bi bi-eye"></i> <?= hb_get_post_view(); ?> <?php if (lang('en')): ?>Views<?php else :?>Праглядаў.<?php endif; ?></li>
                        </ul>
    
                        <div class="content">
                            <?= has_excerpt() ? the_excerpt() : wp_trim_words(get_the_content(), 20); ?>
                        </div>
        
                        <div class="read-more mt-auto align-self-end">
                            <a href="<?php the_permalink(); ?>"><?php if (lang('en')): ?>Read more<?php else :?>Чытаць болей<?php endif; ?></a>
                        </div>

                    </article>

                <?php } 
                if ($eventsQty == 0) : ?>

                <div class="alert alert-info" role="alert">
                    <?php if (lang('en')): ?>Right now no any upcoming events.<?php else :?>На гэты час няма бліжэйшых падзей.<?php endif; ?>
                </div>

                <?php endif; ?>
                </div>
                <!-- End blog posts list -->

                <!-- Pagination -->
                <?php //the_posts_pagination(); ?>
                <!-- End Pagination -->
                
                <div class="mt-5 pt-5 border-top">
                        <a href="/past-events<?php if (lang('en')): ?>_en<?php endif; ?>" class="primary-button"><?php if (lang('en')): ?>Past events<?php else :?>Мінулыя Падзеі<?php endif; ?> <i class="bi bi-arrow-right"></i></a>
                </div>

            </div>
            <!-- End Blog posts -->

            <?php get_sidebar(); ?>

        </div>
    </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->

<?php get_footer(); ?>
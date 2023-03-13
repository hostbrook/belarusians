<?php
/**
 * Template to show single event
 */
get_header();

while(have_posts()) {
    the_post(); 
    hb_set_post_view();
    $eventDate = new DateTime(get_field('event_date'));
    $today = date('Y-m-d H:i');
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?php if (lang('en')): ?>Events<?php else :?>Падзеі<?php endif; ?></h2>
            <ol>
                <li><a href="<?= site_url(); ?>"><?php if (lang('en')): ?>Home<?php else :?>Галоўная<?php endif; ?></a></li>
                <li><a href="/events"><?php if (lang('en')): ?>Events<?php else :?>Падзеі<?php endif; ?></a></li>
                <li><?= $eventDate->format('F j, Y'); ?> </li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">

            <!-- Blog article -->
            <div class="col-lg-8">

                <article class="blog-details events">
    
                    <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                    <div class="post-img">
                        <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                    </div>
                    <?php endif; ?>
    
                    <h2 class="title"><?php the_title(); ?></h2>

                    <ul class="event-info">
                        <li><i class="bi bi-geo-alt"></i> <?php the_field('event_location'); ?></li>
                        <li><i class="bi bi-clock"></i> <?= $eventDate->format('F j, Y g:i a'); ?> 
                        <?php if ($today > get_field('event_date')): ?>
                            <span class="badge rounded-pill bg-danger"><?php if (lang('en')): ?>Event completed!<?php else :?>Падзея закончылась.<?php endif; ?></span>
                        <?php endif; ?></li>
                        <li><i class="bi bi-eye"></i> <?= hb_get_post_view(); ?> <?php if (lang('en')): ?>Views<?php else :?>Праглядаў<?php endif; ?></li>
                    </ul>
    
                    <div class="content">
                        <?php the_content(); ?>
                    </div><!-- End post content -->
                    <?php
                        $post_tags = get_the_tags();
                        if ( $post_tags ) : ?>
                    <div class="meta-bottom">                        
                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                        <?php foreach( $post_tags as $tag ) : ?>
                            <li><a href="<?= esc_attr( get_tag_link( $tag->term_id ) ); ?>"><?= $tag->name; ?></a></li>'; 
                        <?php endforeach; ?>
                        </ul>
                    </div><!-- End meta bottom -->
                    <?php endif; ?> 
    
                </article><!-- End blog post -->
    
                <div class="comments">
                    <p><strong><?php if (lang('en')): ?>Comments are turned off.<?php else :?>Каментарыi адключаны.<?php endif; ?></strong></p>
                </div><!-- End blog comments -->
    
            </div>
            <!-- End Blog article -->

            <!-- Sidebar -->
<?php get_sidebar(); ?>
            <!-- End Sidebar -->

        </div>
    </div>
</section><!-- End Blog Single Section -->

</main><!-- End #main -->

<?php
    }
get_footer();
?>
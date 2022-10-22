<?php
/**
 * Template to show single post
 */
get_header();

while(have_posts()) {
    the_post(); ?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Навіны</h2>
            <ol>
                <li><a href="<?= site_url(); ?>">Галоўная</a></li>
                <li><a href="/news">Навіны</a></li>
                <li><?php the_time('d M, Y'); ?></li>
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

                <article class="blog-details">
    
                    <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                    <div class="post-img">
                        <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                    </div>
                    <?php endif; ?>
    
                    <h2 class="title"><?php the_title(); ?></h2>
    
                    <div class="meta-top">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?php the_author_posts_link(); ?></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d M, Y'); ?></time></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html"><?= get_comments_number(); ?> Каментарыяў</a></li>
                        </ul>
                    </div><!-- End meta top -->
    
                    <div class="content">
                    <?php the_content(); ?>
                    </div><!-- End post content -->
    
                    <div class="meta-bottom">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            <li><a href="#"><?php echo get_the_category_list(', '); ?></a></li>
                        </ul>
   
                        <?php
                        $post_tags = get_the_tags();
                        if ( $post_tags ) : ?>
                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                        <?php
                            foreach( $post_tags as $tag ) {
                                echo '<li><a href="'.esc_attr( get_tag_link( $tag->term_id ) ).'">'.$tag->name.'</a></li>'; 
                            } ?>
                        </ul>
                        <?php endif; ?> 

                    </div><!-- End meta bottom -->
    
                </article><!-- End blog post -->
    
                <div class="post-author d-flex align-items-center">
                  <img src="<?= get_avatar_url(get_the_author_meta('ID')); ?>" class="rounded-circle flex-shrink-0" alt="">
                  <div>
                    <h4><?= get_the_author_meta('first_name'); ?> <?= get_the_author_meta('last_name'); ?></h4>
                    <div class="social-links">
                      <a href="mailto:<?= get_the_author_meta('user_email'); ?>"><i class="bi bi-envelope"></i> <?= get_the_author_meta('user_email'); ?></a>
                    </div>
                    <p>
                    <?= get_the_author_meta('description'); ?>
                    </p>
                  </div>
                </div><!-- End post author -->
    
                <div class="comments">
    
                    <h4 class="comments-count">Comments are turned off.</h4>
    
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
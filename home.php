<?php 
/**
 * Template to show latest posts (blog/news)
 */
get_header(); ?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h2>Навіны</h2>
    <ol>
        <li><a href="<?= site_url(); ?>">Галоўная</a></li>
        <li>Навіны</li>
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
                    <?php while (have_posts()) :
                        the_post();
                    ?>

                    <div class="col-md-6">
                        <article class="d-flex flex-column">
    
                            <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                            <div class="post-img">
                                <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                            </div>
                            <?php endif; ?>
        
                            <h2 class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
        
                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d M, Y'); ?></time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html"><?= get_comments_number(); ?> Каментарыяў</a></li>
                                </ul>
                            </div>
        
                            <div class="content">
                                <?= wp_trim_words(get_the_content(), 20); ?>
                            </div>
            
                            <div class="read-more mt-auto align-self-end">
                                <a href="<?php the_permalink(); ?>">Чытаць болей</a>
                            </div>
    
                        </article>
                    </div>

                    <?php endwhile; ?>
                </div>

                <!-- Blog-pagination -->
                <?php the_posts_pagination(); ?>
                <!-- End blog-pagination -->

            </div>
            <!-- End Blog posts -->

            <?php get_sidebar(); ?>

        </div>
    </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->

<?php get_footer(); ?>
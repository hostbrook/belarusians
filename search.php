<?php
/**
 * Template to show posts for category/author/date or etc.
 */
get_header();
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h2>Пошук</h2>
    <ol>
        <li><a href="<?= site_url(); ?>">Галоўная</a></li>
        <li>Пошук</li>
    </ol>
    </div>

</div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">

            <div class="col-lg-8">

                <!-- Search form -->
                <div class="row">
                    <div class="col-md-8 mx-auto pb-5">
                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="input-group top-search-group">
                                <input 
                                    class="form-control rounded-start border-end-0 mb-0" 
                                    type="text" 
                                    name="s" 
                                    autofocus 
                                    placeholder="Пошук на сайце" 
                                    value="<?php echo get_search_query(); ?>"
                                >
                                <button type="submit" class="btn btn-grad m-0">Шукаць</button>
                            </div>
                        </form>
                    </div>
                    <a class="position-absolute top-0 end-0 mt-3 me-3 text-end" data-bs-toggle="collapse" href="#search-open"><i class="fa fa-window-close"></i></a>
                </div>
                <!-- END Search form -->

                <?php if (!have_posts()) : ?>
                <div class="alert alert-danger" role="alert">
                    Sorry, but nothing matched your search terms.
                </div>
                <?php else : 
                    global $wp_query;
                    ?>
                <div class="alert alert-primary mb-5" role="alert">
                    <?php echo $wp_query->found_posts; ?> posts matched your search terms
                </div>
                
                <!-- Search results -->
                <div class="row gy-4 posts-list">
                <?php 
                while (have_posts()) :
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
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2022-01-01"><?php the_time('d M, Y'); ?></time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html"><?= get_comments_number(); ?> Каментарыяў</a></li>
                                </ul>
                            </div>
        
                            <div class="content">
                                <?php the_excerpt(); ?>
                            </div>
            
                            <div class="read-more mt-auto align-self-end">
                                <a href="<?php the_permalink(); ?>">Чытаць болей</a>
                            </div>
    
                        </article>
                    </div>

                <?php endwhile; ?>
                </div>
                <!-- End blog posts list -->

                <!-- Pagination -->
                <?php the_posts_pagination(); ?>
                <!-- End Pagination -->

                <?php endif; ?>

            </div>
            <!-- End Blog posts -->

            <?php get_sidebar(); ?>

        </div>
    </div>
</section><!-- End Blog Section -->

</main><!-- End #main -->

<?php get_footer(); ?>
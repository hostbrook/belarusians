<?php 
/**
 * Template for front page
 */

get_header(); ?>

    <!-- ======= Slides Section ======= -->
    <?php
        $slides = new WP_Query([
            'post_type' => 'slide',
            'posts_per_page' => -1
        ]);
        $slidesQty = $slides->found_posts;
        $activeSlide = true;
    ?>
    <section id="slides">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < $slidesQty; $i++) :?>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?=$i;?>" <?= $activeSlide ? 'class="active"' : '';?>></button>
                <?php $activeSlide = false; endfor; ?>
            </div>
            <div class="carousel-inner">
                <?php
                    $activeSlide = true;
                    while($slides->have_posts()) {
                        $slides->the_post();
                ?>

                <div class="carousel-item <?= $activeSlide ? 'active' : '';?>" data-bs-interval="5000">
                    <img src="<?php the_field('image'); ?>" class="d-block w-100 carousel-image" alt="">
                    <?php if (get_field('slogan_title') != '' or get_field('slogan_text') != ''): ?>
                        <div class="carousel-caption d-none d-md-block">
                            <?php if (get_field('slogan_title') != ''): ?><h4 class="animate__animated animate__fadeInDown"><?=get_field('slogan_title');?></h4><?php endif; ?>
                            <?php if (get_field('slogan_text') != ''): ?><p class="animate__animated animate__fadeInUp"><?=get_field('slogan_text');?></p><?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php 
                        $activeSlide = false;
                    } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- ======= End Slides Section ======= -->

    <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
            <div class="col-lg-6">

                <!-- Widget area: Front Page Top-Left -->
                <?php dynamic_sidebar( 'front-page-top-left' ); ?>
                <!-- /Widget area -->

            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">

                <!-- Widget area: Front Page Top-Right -->
                <?php dynamic_sidebar( 'front-page-top-right' ); ?>
                <!-- /Widget area -->

            </div>
        </div>

      </div>
    </section><!-- End About Section -->

        <!-- =======  Section ======= -->
        <section id="live" style="padding-top:20px;">
            <div class="container">
                <div class="row">

                    <!-- Latest news content -->
                    <div class="col-lg-8 recent-posts pe-lg-5">
                        <div class="section-title" style="padding-top:40px;padding-bottom:40px;">
                            <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">
                                <?php if (lang('en')): ?>News<?php else :?>Навіны<?php endif; ?>
                            </h2>
                        </div>

                        <!-- Latest news -->
                        <div class="row gy-5">
                            <?php 
                                $query = new WP_Query(['post_type'=>'post', 'posts_per_page' => '6', 'lang' => 'be,en']);
                                while ($query->have_posts()) :
                                $query->the_post();
                            ?>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-box">
                                    <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                                    <div class="post-img">
                                        <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                                    </div>
                                    <?php endif; ?>
                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d M, Y'); ?></time></a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?php the_permalink(); ?>"><?= get_comments_number(); ?></a></li>
                                            <!--<li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-up"></i> <a href="<?php the_permalink(); ?>">8</a></li>-->
                                            <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="<?php the_permalink(); ?>"><?= hb_get_post_view(); ?></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="post-title"><?php the_title(); ?></h3>
                                    <?= has_excerpt() ? the_excerpt() : wp_trim_words(get_the_content(), 20); ?>
                                    <a href="<?php the_permalink(); ?>" class="readmore stretched-link"><span>Чытаць болей</span><i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <!-- Right sidebar -->
                    <div class="col-lg-4 section-bg sidebar">

                        <!-- Events -->
                        <div class="events">

                        <div class="section-title pt-2">
                            <h2><?php if (lang('en')): ?>Events<?php else :?>Падзеі<?php endif; ?></h2>
                        </div>

                        <?php
                        $today = date('Y-m-d H:i');
                        $events = new WP_Query([
                            'post_type' => 'event',
                            'posts_per_page' => 3,
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

                        <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                            <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                        <?php else: ?>
                            <p><strong><?php the_title(); ?></strong></p>
                        <?php endif; ?>

                        <ul class="event-info">
                            <li><i class="bi bi-geo-alt"></i> <?php the_field('event_location'); ?></li>
                            <li><i class="bi bi-clock"></i> <?= $eventDate->format('F j, Y g:i a'); ?></li>
                        </ul>

                        <p><?= has_excerpt() ? the_excerpt() : wp_trim_words(get_the_content(), 20); ?></p>

                        <p style="padding-bottom:20px;"><a href="<?php the_permalink(); ?>"><?php if (lang('en')): ?>Read more<?php else :?>Чытаць болей<?php endif; ?> <i class="bi bi-arrow-right"></i></a></p>

                        <?php } 

                        if ($eventsQty >= 3) : ?>
                        <a href="/events" class="primary-button"><?php if (lang('en')): ?>All Events<?php else :?>Усе падзеi<?php endif; ?> <i class="bi bi-arrow-right"></i></a>
                        <?php endif;

                        if ($eventsQty == 0) : ?>
                        <div class="alert alert-info" role="alert">
                            <?php if (lang('en')): ?>There are no upcomming events.<?php else :?>На гэты час няма бліжэйшых падзей.<?php endif; ?>                            
                        </div>
                        <?php endif; ?>

                        </div>
                        <!-- /Events -->

                        <?php if ($eventsQty < 3) : ?>
                        <!-- Widget area: Front Page right sidebar -->
                        <?php dynamic_sidebar( 'front-page-right' ); ?>
                        <!-- /Widget area -->
                        <?php endif; ?>

                        <!-- Tags -->
                        <?php if ($eventsQty == 0) : ?>
                        <div class="section-title">
                            <h2><?php if (lang('en')): ?>Tags<?php else :?>Важкiя Тэгі<?php endif; ?></h2>
                        </div>
                        
                        <div class="tags">
                            <ul class="mt-3">
                            <?php
                            $tags = get_tags([
                                'number' => 20,
                                'orderby' => 'count', 
                                'order' => 'DESC',
                                'lang' => 'en,be'
                            ]);
                            if ( $tags ) :
                                foreach ( $tags as $tag ) : ?>
                                    <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <!-- /Tags -->

                    </div>

                </div>
            </div>
        </section><!-- End  Section -->

        <?php while(have_posts()) {
            the_post(); 
            the_content();
        }
        ?>


    </main><!-- End #main -->

<?php get_footer(); ?>
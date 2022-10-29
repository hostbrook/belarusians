<?php 
/**
 * Template for front page
 */

get_header(); ?>

    <!-- ======= Slides Section ======= -->
    <section id="slides">
        <div id="slidesCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="slides-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

            <?php
                $slides = new WP_Query([
                    'post_type' => 'slide'
                ]);

                $activeSlide = true;

                while($slides->have_posts()) {
                    $slides->the_post();
                ?>

                <div class="carousel-item <?= $activeSlide ? 'active' : '';?> " style="background-image: url(<?php the_field('image'); ?>)">
                <?php if (get_field('slogan_title') != '' or get_field('slogan_text') != ''): ?>
                    <div class="carousel-container">
                        <div class="container">
                            <?php if (get_field('slogan_title') != ''): ?><h2 class="animate__animated animate__fadeInDown"><?=get_field('slogan_title');?></h2><?php endif; ?>
                            <?php if (get_field('slogan_text') != ''): ?><p class="animate__animated animate__fadeInUp"><?=get_field('slogan_text');?></p><?php endif; ?>
                            <?php if (get_field('button') != ''): ?><a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto"><?=get_field('button');?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                </div>

                <?php 
                    $activeSlide = false;
                } ?>

            </div>

            <a class="carousel-control-prev" href="#slidesCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#slidesCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Slides -->

    <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2>Згуртаванне<br> Беларусаў Канады</h2>
            <h3>Аб’ядноўваем беларусаў Канады з 1948г.</h3>
            
            <p class="fst-italic">
            Вядучая арганізацыя дыяспары, прызнаная ва ўсім свеце, задзейнічае вялікі пул навукоўцаў, спецыялістаў і экспертаў па ўсёй Канадзе, ЗША і свеце, каб даць інфармаванае і ўзважанае меркаванне па пытаннях, звязаных з Беларуссю.
            </p>
            <p class="pb-4"><a href="/about" class="primary-button">Падрабязней <i class="bi bi-arrow-right"></i></a></p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Згуртаванне беларусаў Канады было заснавана ў 1948 годзе для прадстаўлення беларуска-канадскай супольнасці перад народам і ўрадам Канады. Місія ЗБК заключаецца ў захаванні беларускай культурнай і гістарычнай спадчыны і прасоўванні беларускай мовы, а таксама ў падтрымцы і садзейнічанні дэмакратычным зменам у Беларусі.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Захоўваем беларускую гісторыка-культурную спадчыну і беларускую мову.</li>
              <li><i class="bi bi-check2-all"></i> Прадстаўляем беларуска – канадскую супольнасць перад народам і ўрадам Канады.</li>
              <li><i class="bi bi-check2-all"></i> Падтрымліваем беларускую дыяспару ў Канадзе і садзейнічаем дэмакратычным зменам у Беларусі.</li>
            </ul>
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
                            <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">Навіны</h2>
                        </div>

                        <!-- Latest news -->
                        <div class="row gy-5">
                            <?php 
                                $query = new WP_Query(['post_type'=>'post', 'posts_per_page' => '6']);
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
                    <div class="col-lg-4 section-bg events">

                        <!-- Events -->
                        <div class="section-title" style="padding-top:40px;padding-bottom:40px;">
                            <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">Падзеі</h2>
                        </div>

                        <?php
                        $today = date('Y-m-d H:i');
                        $eventsdoNotExist = true;
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

                        while($events->have_posts()) {
                            $events->the_post();
                            $eventDate = new DateTime(get_field('event_date'));
                            $eventsdoNotExist = false;
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

                        <?= has_excerpt() ? the_excerpt() : wp_trim_words(get_the_content(), 20); ?>

                        <p class="pb-4"><a href="<?php the_permalink(); ?>" class="primary-button">Чытаць болей</a></p>

                        <?php } 
                        if ($eventsdoNotExist) : ?>
                        <p>Right now no upcoming events.</p>
                        <?php endif; ?>
                        <!-- /Events -->

                        <div class="section-title" style="padding-top:40px;padding-bottom:40px;">
                            <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">Маменты</h2>
                        </div>

                        <div class="ratio ratio-16x9 pb-5">
                            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fbelarusian.canadian.alliance%2Fvideos%2F1318819258525556%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>                        
                        </div>

                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.facebook.com/plugins/video.php?height=306&href=https%3A%2F%2Fwww.facebook.com%2Fbelarusian.canadian.alliance%2Fvideos%2F1341138656313841%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                        </div>
<!--
                        <div class="section-title pt-5 pb-3">
                            <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">Важкiя Тэгі</h2>
                        </div>

                         Tags 
                        <div class="tags">
                            <ul class="mt-3">
                            <?php
                            $tags = get_tags([
                                'number' => 20,
                                'orderby' => 'count', 
                                'order' => 'DESC'
                            ]);
                            if ( $tags ) :
                                foreach ( $tags as $tag ) : ?>
                                    <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </ul>
                        </div>-->

                    </div>

                </div>
            </div>
        </section><!-- End  Section -->

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container p-0">
                <div class="row g-0">
                    <div class="content d-flex flex-column justify-content-center h-100">

                        <h3>Паважаныя сябры!</h3>
                        <p>Мы старанна працуем на працягу ўжо некалькіх гадоў і выконваем сваю місію.</p>
                        <p class="fst-italic">
                            Калі б кожны, хто чытае гэта, ахвяраваў $5 CAD замест кубка кавы, альбо $10 CAD замест гамбургера, альбо $20 CAD замест пачкі цыгарэт
                            мы маглі б ажыццявіць тое, тое і вон тое. 
                        </p>
                        <p>Але не кожны можа зрабіць ахвяраванне, а з тых, хто можа — не кожны зробіць. І ў гэтым няма нічога дрэннага. Кожны год хапае тых, хто вырашае зрабіць падарунак. У гэтым годзе, калі ласка, падумайце як вы можаце дапамагчы і падтрымць ЗБК.</p>
                        <a href="#" class="read-more align-self-start"><span>Ахвяраваць</span><i class="bi bi-arrow-right"></i></a>

                    </div>
                </div>
            </div>
        </section><!-- End On Focus Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">Наша місія</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>Згуртаванне беларусаў Канады было заснавана ў 1948 годзе для прадстаўлення беларуска-канадскай супольнасці перад народам і ўрадам Канады. Місія ЗБК заключаецца ў захаванні беларускай культурнай і гістарычнай спадчыны і прасоўванні беларускай мовы, а таксама ў падтрымцы і садзейнічанні дэмакратычным зменам у Беларусі.</p>
                        <p>Вядучая арганізацыя дыяспары, прызнаная ва ўсім свеце, задзейнічае вялікі пул навукоўцаў, спецыялістаў і экспертаў па ўсёй Канадзе, ЗША і свеце, каб даць інфармаванае і ўзважанае меркаванне па пытаннях, звязаных з Беларуссю.</p>
                        <p class="fst-italic">
                            Паводле перапісу 2016 года, у Канадзе пражывае крыху менш за 21 000 канадцаў беларускага паходжання, што робіць дыяспару пятым па велічыні беларускім насельніцтвам пасля Расіі, Украіны, Польшчы і ЗША.
                        </p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <img src="<?= get_theme_file_uri('/images/zbk-2.jpg'); ?>" alt="" class="img-fluid" style="border-radius: 5px;">
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->

<?php get_footer(); ?>
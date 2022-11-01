            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
    
                    <!-- Sidebar categories 
                    <div class="sidebar-item categories">
                        <div class="section-title" style="padding-top:30px;padding-bottom:10px;">
                            <h2 style="font-size: 16px;color:#aaaaaa;font-weight: 600;">Разделы</h2>
                        </div>
                        <ul class="mt-3">
                            <li><a href="#">Навіны <span>(25)</span></a></li>
                            <li><a href="#">Падзеі <span>(12)</span></a></li>
                            <li><a href="#">Праграмы <span>(3)</span></a></li>
                            <li><a href="#">Суполкі<span>(5)</span></a></li>
                        </ul>
                    </div>-->
    
                    <!-- Recent posts -->
                    <div class="sidebar-item recent-posts">
                        <div class="section-title pt-2">
                            <h2>Навіны</h2>
                        </div>
        
                        <?php 
                            $query = new WP_Query(['post_type'=>'post', 'posts_per_page' => '5']);
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                        <div class="post-item clearfix">
                                <?php  if (has_post_thumbnail( $post->ID ) ): ?>
                            <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" alt="">
                                <?php endif; ?>
                            
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <time datetime="2020-01-01"><?php the_time('d M, Y'); ?></time>
                        </div>
                        <?php endwhile; ?>        
                    </div>
                    <!-- /Recent posts -->

                    <!-- Events -->
                    <div class="events">
                        <div class="section-title">
                            <h2>Падзеі</h2>
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
                                'key' => 'event_date',
                                'compare' => '>=',
                                'value' => $today
                            ]
                        ]);

                        while($events->have_posts()) : ?>
                        <div style="padding-bottom:40px;">
                        <?php 
                            $events->the_post();
                            $eventDate = new DateTime(get_field('event_date'));
                            $eventsdoNotExist = false;

                            if (has_post_thumbnail( $post->ID ) ): ?>

                            <a href="<?php the_permalink(); ?>">
                                <img src="<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" class="img-fluid" alt="">
                            </a>

                            <?php else: ?>
                            <p><strong><?php the_title(); ?></strong></p>
                            <?php endif; ?>
                            <ul class="event-info">
                                <li><i class="bi bi-geo-alt"></i> <?php the_field('event_location'); ?></li>
                                <li><i class="bi bi-clock"></i> <?= $eventDate->format('F j, Y g:i a'); ?></li>
                            </ul>
                            <p><?= has_excerpt() ? the_excerpt() : wp_trim_words(get_the_content(), 40); ?></p>
                            <p><a href="<?php the_permalink(); ?>">Чытаць болей <i class="bi bi-arrow-right"></i></a></p>
                        </div>
                        <?php endwhile; ?>
                        
                        <?php if ($eventsdoNotExist) : ?>

                        <p>Right now no upcoming events.</p>

                        <?php endif; ?>
                    </div>
                    <!-- /Events -->
        
                    <!-- Tags -->
                    <div class="sidebar-item tags">
                        <div class="section-title">
                            <h2>Важкiя Тэгі</h2>
                        </div>
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
                    </div>
                    <!-- /Tags -->
    
                </div>
            </div>
            <!-- /End Sidebar -->
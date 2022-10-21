<?php
/**
 * Template to show single event
 */
get_header();

while(have_posts()) {
    the_post(); 
    $eventDate = new DateTime(get_field('event_date'));
    $today = date('Y-m-d H:i');
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Падзеі</h2>
            <ol>
                <li><a href="<?= site_url(); ?>">Галоўная</a></li>
                <li><a href="/events">Падзеі</a></li>
                <li><?php the_title(); ?></li>
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
                            <span class="badge rounded-pill bg-danger">Event completed!</span>
                        <?php endif; ?></li>
                    </ul>
    
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
                        <?php foreach( $post_tags as $tag ) : ?>
                            <li><a href="<?= esc_attr( get_tag_link( $tag->term_id ) ); ?>"><?= $tag->name; ?></a></li>'; 
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?> 

                    </div><!-- End meta bottom -->
    
                </article><!-- End blog post -->
    
                <div class="comments">
    
                  <h4 class="comments-count">8 Comments</h4>
    
                  <div id="comment-1" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                          Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                        </p>
                      </div>
                    </div>
                  </div><!-- End comment #1 -->
    
                  <div id="comment-2" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                        </p>
                      </div>
                    </div>
    
                    <div id="comment-reply-1" class="comment comment-reply">
                      <div class="d-flex">
                        <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                        <div>
                          <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                          <time datetime="2020-01-01">01 Jan,2022</time>
                          <p>
                            Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.
    
                            Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.
    
                            Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                          </p>
                        </div>
                      </div>
    
                      <div id="comment-reply-2" class="comment comment-reply">
                        <div class="d-flex">
                          <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                          <div>
                            <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                            <time datetime="2020-01-01">01 Jan,2022</time>
                            <p>
                              Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                            </p>
                          </div>
                        </div>
    
                      </div><!-- End comment reply #2-->
    
                    </div><!-- End comment reply #1-->
    
                  </div><!-- End comment #2-->
    
                  <div id="comment-3" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-5.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                          Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                        </p>
                      </div>
                    </div>
    
                  </div><!-- End comment #3 -->
    
                  <div id="comment-4" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                        </p>
                      </div>
                    </div>
    
                  </div><!-- End comment #4 -->
    
                  <div class="reply-form">
    
                    <h4>Leave a Reply</h4>
                    <p>Your email address will not be published. Required fields are marked * </p>
                    <form action="">
                      <div class="row">
                        <div class="col-md-6 form-group">
                          <input name="name" type="text" class="form-control" placeholder="Your Name*">
                        </div>
                        <div class="col-md-6 form-group">
                          <input name="email" type="text" class="form-control" placeholder="Your Email*">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col form-group">
                          <input name="website" type="text" class="form-control" placeholder="Your Website">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col form-group">
                          <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Post Comment</button>
    
                    </form>
    
                  </div>
    
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
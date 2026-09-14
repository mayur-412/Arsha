<?php
/**
 * Template Name: Blog details
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Arsha
 */

get_header();
?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Blog Details</li>
          </ol>
        </nav>
        <h1>Blog Details</h1>
      </div>
    </div><!-- End Page Title -->

   <div class="container">
  <div class="row">
     <div class="col-lg-8">
      <!-- Blog Details Section -->
 
<?php // Check value exists.
if( have_rows('blog_data') ):

// Loop through rows.
while ( have_rows('blog_data') ) : the_row();

// Case: Paragraph layout.
if( get_row_layout() == 'hero_section' ):
    $url = get_the_post_thumbnail_url();
    $hero_btn = get_sub_field('hero_btn');
    $blog_head = get_sub_field('blog_head');
    $content_desc = get_sub_field('content_desc');
    $cont_img = get_sub_field('cont_img');
    $img_caption = get_sub_field('img_caption');
    $web_title = get_sub_field('web_title');
    $web_desc = get_sub_field('web_desc');
    $list_item = get_sub_field('list_item');
    $high_light = get_sub_field('high_light');
    $optimiz = get_sub_field('optimiz');
    $opti_desc = get_sub_field('opti_desc');
    $blockquote = get_sub_field('blockquote');
    $blockquote_desc = get_sub_field('blockquote_desc');
    $info_card = get_sub_field('info_card');
    $look_title = get_sub_field('look_title');
    $look_desc = get_sub_field('look_desc');
    $meta_bottom = get_sub_field('meta_bottom');
    
?> <section id="blog-details" class="blog-details section">
        <div class="container" data-aos="fade-up">

          <article class="article">

            <div class="hero-img" data-aos="zoom-in">
              <img src="<?php echo $url; ?>" alt="Featured blog image" class="img-fluid" loading="lazy">
              <div class="meta-overlay">
                <?php foreach ($hero_btn as $btn_top) {
                  ?> <div class="meta-categories">
                  <a href="<?php echo $btn_top['btn_link']['url']; ?>" title="<?php echo $btn_top['btn_link']['title']; ?>" class="category"><?php echo $btn_top['btn_link']['title']; ?></a>
                  <span class="divider">•</span>
                  <span class="reading-time"><i class="bi bi-clock"></i> <?php echo $btn_top['btn_span']; ?></span>
                </div> <?php
                } ?>
              </div>
            </div>

            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
            <?php foreach ($blog_head as $heaing) {
              $blog_meta = $heaing['blog_meta'];
            ?> <div class="content-header">
                <h1 class="title"><?php echo $heaing['blog_title']; ?></h1>
                <div class="author-info">
                  <div class="author-details">
                    <img src="<?php echo $heaing['person_bg']; ?>" alt="Author" class="author-img">
                    <div class="info">
                      <h4><?php echo $heaing['peron_name']; ?></h4>
                      <span class="role"><?php echo $heaing['person_role']; ?></span>
                    </div>
                  </div>
                  <div class="post-meta">
                    <?php foreach ($blog_meta as $info) {
                    ?> <span class="<?php echo $info['meta_class']; ?>"><?php if(!empty($info['meta_icon'])){ ?> <i class="<?php echo $info['meta_icon']; ?>"></i> <?php } ?> <?php echo $info['meta_text']; ?></span> <?php
                    } ?>
                  </div>
                </div>
              </div> <?php
            } ?>

              <div class="content">
              <?php foreach ($content_desc as $caption) {
                ?> <p class="<?php if(!empty($caption['cont_cls'])){ ?> <?php echo $caption['cont_cls']; ?> <?php } ?>"><?php echo $caption['cont_p']; ?></p> <?php
              } ?>

                <div class="content-image right-aligned">
                  <img src="<?php echo $cont_img; ?>" class="img-fluid" alt="Modern web development tools" loading="lazy">
                  <figcaption><?php echo $img_caption; ?></figcaption>
                </div>

                <h2><?php echo $web_title; ?></h2>
                <p><?php echo $web_desc; ?></p>
                <ul>
                  <?php foreach ($list_item as $item_dp) {
                    ?> <li><?php echo $item_dp['item_tx']; ?></li> <?php
                  } ?>
                </ul>

                 <?php foreach ($high_light as $light) {
                  $trend_item = $light['trend_item'];
                  ?> <div class="highlight-box">
                  <h3><?php echo $light['high_title']; ?></h3>
                  <ul class="trend-list">
                    <?php foreach ($trend_item as $item_up) {
                     ?> <li>
                      <i class="<?php echo $item_up['treand_icon']; ?>"></i>
                      <span><?php echo $item_up['trend_text']; ?></span>
                    </li> <?php
                    } ?>
                  </ul>
                </div> <?php
                 } ?>

                <h2><?php echo $optimiz; ?></h2>
                <p><?php echo $opti_desc; ?></p>

                <blockquote>
                  <p><?php echo $blockquote; ?></p>
                  <cite><?php echo $blockquote_desc; ?></cite>
                </blockquote>

                <div class="content-grid">
                  <div class="row g-4">
                    <?php foreach ($info_card as $info_jb) {
                     ?> <div class="col-md-6">
                      <div class="info-card">
                        <i class="<?php echo $info_jb['info_icon']; ?>"></i>
                        <h4><?php echo $info_jb['info_title']; ?></h4>
                        <p><?php echo $info_jb['info_desc']; ?></p>
                      </div>
                    </div> <?php
                    } ?>
                  </div>
                </div>

                <h2><?php echo $look_title; ?></h2>
                <p><?php echo $look_desc; ?></p>
              </div>

              <div class="meta-bottom">
                <?php foreach ($meta_bottom as $bottom_ak) {
               $tags = $bottom_ak['tags'];
               ?>  <div class="<?php echo $bottom_ak['main_class']; ?>">
                  <h4><?php echo $bottom_ak['main_title']; ?></h4>
                    <div class="<?php echo $bottom_ak['sub_class']; ?>">
                      <?php foreach ($tags as $tag_hp) {
                        ?> <a href="<?php echo $tag_hp['main_link']['url']; ?>" class="<?php echo $tag_hp['link_class']; ?>" title="<?php echo $tag_hp['main_link']['title']; ?>"><?php if(!empty($tag_hp['link_iocn'])){ ?> <i class="<?php echo $tag_hp['link_iocn']; ?>"></i> <?php } ?><?php echo $tag_hp['main_link']['title']; ?></a> <?php
                      } ?>
                      </div>
                </div> <?php
              } ?>
              </div>
            </div>

          </article>

        </div>
      </section> <?php

// Case: Download layout.
elseif( get_row_layout() == 'comment_section' ): 
    $com_title = get_sub_field('com_title');
    $com_label = get_sub_field('com_label');
    $comment_card = get_sub_field('comment_card');
?>  <!-- Blog Comments Section -->
<section id="blog-comments" class="blog-comments section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="blog-comments-4">
      <div class="comments-header">
        <h3 class="title"><?php echo $com_title; ?></h3>
        <div class="comments-stats">
          <?php foreach ($com_label as $com_tx) {
            ?> <span class="<?php echo $com_tx['com_class']; ?>"><?php echo $com_tx['com_span']; ?></span> <?php
          } ?>
        </div>
      </div>

      <div class="comments-container">
      <?php foreach ($comment_card as $top_list) {
       $action_bar = $top_list['action_bar'];
       $replay_box = $top_list['replay_box'];
       ?> <div class="comment-thread">
          <div class="comment-box">
            <div class="comment-wrapper">
              <div class="avatar-wrapper">
                <img src="<?php echo $top_list['people_bg']; ?>" alt="Avatar" loading="lazy">
                <span class="status-indicator"></span>
              </div>

              <div class="comment-content">
                <div class="comment-header">
                  <div class="user-info">
                    <h4><?php echo $top_list['user_name']; ?></h4>
                    <span class="time-badge">
                      <i class="<?php echo $top_list['clock_icon']; ?>"></i><?php echo $top_list['time_spend']; ?></span>
                  </div>
                  <div class="engagement">
                    <span class="likes">
                      <i class="<?php echo $top_list['like_icon']; ?>"></i><?php echo $top_list['link_no']; ?></span>
                  </div>
                </div>

                <div class="comment-body">
                  <p><?php echo $top_list['com_body']; ?></p>
                </div>

                <div class="comment-actions">
                  <?php foreach ($action_bar as $like_bar) {
                    ?> <button class="action-btn <?php echo $like_bar['act_class']; ?>" aria-label="<?php echo $like_bar['act_icon']; ?>"><i class="<?php echo $like_bar['act_icon']; ?>"></i>
                      <span><?php echo $like_bar['act_text']; ?></span>
                  </button> <?php
                  } ?>
                </div>
              </div>
            </div>
          </div>

           <?php if(!empty($replay_box)){ ?> 
            <!-- Replies Container -->
                <div class="replies-container">
                  <?php foreach ($replay_box as $repo_mm) {
                   $repo_act = $repo_mm['repo_act'];
                    ?> <div class="comment-box reply">
                    <div class="comment-wrapper">
                      <div class="avatar-wrapper">
                        <img src="<?php echo $repo_mm['rep_bg']; ?>" alt="Avatar" loading="lazy">
                        <span class="status-indicator"></span>
                      </div>

                      <div class="comment-content">
                        <div class="comment-header">
                          <div class="user-info">
                            <h4><?php echo $repo_mm['rep_title']; ?></h4>
                            <span class="time-badge">
                              <i class="<?php echo $repo_mm['clock_i']; ?>"></i><?php echo $repo_mm['clock_t']; ?></span>
                          </div>
                          <div class="engagement">
                            <span class="likes">
                              <i class="<?php echo $repo_mm['like_i']; ?>"></i><?php echo $repo_mm['rep_lk']; ?>
                            </span>
                          </div>
                        </div>

                        <div class="comment-body">
                          <p><?php echo $repo_mm['rep_body']; ?></p>
                        </div>

                        <div class="comment-actions">
                         <?php foreach ($repo_act as $mm_mac) {
                          ?> <button class="action-btn <?php echo $mm_mac['repo_cls']; ?>" aria-label="<?php echo $mm_mac['repo_lab']; ?>">
                            <i class="<?php echo $mm_mac['repo_i']; ?>"></i>
                            <span><?php echo $mm_mac['repo_span']; ?></span>
                          </button> <?php
                         } ?>
                        </div>
                      </div>
                    </div>
                  </div> <?php
                  } ?>
                </div>
           <?php } ?>

        </div> <?php
      } ?>
      </div>
    </div>

  </div>

</section><!-- /Blog Comments Section --> <?php

endif;

// End loop.
endwhile;

// No value.
else :
    // Do something...
endif; ?>

     

      <!-- Blog Comment Form Section -->
      <section id="blog-comment-form" class="blog-comment-form section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <?php echo do_shortcode('[contact-form-7 id="172058f" title="Comment form"]'); ?>

        </div>

      </section><!-- /Blog Comment Form Section -->

    </div>

    <div class="col-lg-4 sidebar">
      <?php get_sidebar(); ?>
    </div>

  </div>
 </div>

</main>

<?php
get_footer();

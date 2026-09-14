<?php
/**
 * Template Name: Blog page
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
          <li class="current">Blog</li>
        </ol>
      </nav>
      <h1>Blog</h1>
    </div>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">

<?php // Check value exists.
if( have_rows('blog_fild') ):

    // Loop through rows.
    while ( have_rows('blog_fild') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'blgo_post' ):
            $post_date = get_sub_field('post_date');
            $pagination = get_sub_field('pagination');
?> <div class="col-lg-8">

        <!-- Blog Posts Section -->
  <section id="blog-posts" class="blog-posts section">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
            <?php foreach ($post_date as $postbar) {
              $meta_top = $postbar['meta_top'];
   ?>  <div class="col-lg-6">
          <article>
            <div class="post-img">
              <img src="<?php echo $postbar['post_img']; ?>" alt="" class="img-fluid">
            </div>
            <h2 class="title">
              <a href="<?php echo $postbar['post_link']['url']; ?>"><?php echo $postbar['post_link']['title']; ?></a>
            </h2>
            <div class="meta-top">
              <ul>
                <?php foreach ($meta_top as $metabar) {
                  $meta_icon = $metabar['meta_icon'];
                  $meta_link = $metabar['meta_link'];
                  ?> <li class="d-flex align-items-center"><i class="<?php echo $meta_icon; ?>"></i> <a href="<?php echo $meta_link['url']; ?>"><?php echo $meta_link['title']; ?></a></li> <?php
                } ?>
              </ul>
            </div>
            <div class="content">
              <p><?php echo $postbar['post_desc']; ?></p>
              <div class="read-more">
                <a href="<?php echo $postbar['link_top']['url']; ?>"><?php echo $postbar['link_top']['title']; ?></a>
              </div>
            </div>
          </article>
        </div><!-- End post list item --> <?php
      } ?>
      </div><!-- End blog posts list -->

    </div>

  </section><!-- /Blog Posts Section -->

        <!-- Pagination 2 Section -->
        <section id="pagination-2" class="pagination-2 section">
          <div class="container">
            <div class="d-flex justify-content-center">
              <ul>
                <?php foreach ($pagination as $page_up) {
                  ?> <li><a href="<?php echo $page_up['page_link']['url']; ?>" class="<?php if(!empty($page_up['page_class']))?> <?php echo $page_up['page_class']; ?> <?php ?>"><?php if(!empty($page_up['page_icon'])){ ?> <i class="<?php echo $page_up['page_icon']; ?>"></i> <?php } ?><?php echo $page_up['page_link']['title']; ?></a></li><?php
                }  ?>
              </ul>
            </div>
          </div>

        </section><!-- /Pagination 2 Section -->
      </div> <?php

        // Case: Download layout.
        elseif( get_row_layout() == 'post_bar' ): 
            $post_item_title = get_sub_field('post_item_title');
            $recent_post = get_sub_field('recent_post');
            $post_bottom = get_sub_field('post_bottom');
            
?>  <div class="col-lg-4 sidebar">
       <?php get_sidebar(); ?>
    </div> <?php

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif; ?>


    </div>
  </div>

</main>	

<?php
get_footer();

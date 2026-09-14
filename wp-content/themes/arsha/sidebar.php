<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Arsha
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar">
	<div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

           <!-- Search Widget -->
          <div class="search-widget widget-item">

			  <h3 class="widget-title">Search</h3>

			  <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search..." required>
			    <button type="submit" title="Search">
			      <i class="bi bi-search"></i>
			    </button>
			  </form>

		 </div><!--/Search Widget -->

        <!-- Recent Posts Widget -->
<!-- Recent Posts Widget -->

<div class="recent-posts-widget widget-item">

    <h3 class="widget-title">Recent Posts</h3>

    <?php
    $recent_posts = new WP_Query(
        array(
            'post_type'      => 'post',
            'posts_per_page' => 5,
            'post_status'    => 'publish',
        )
    );

    if ( $recent_posts->have_posts() ) :

        while ( $recent_posts->have_posts() ) :

            $recent_posts->the_post();
    ?>

        <div class="post-item">

            <?php if ( has_post_thumbnail() ) : ?>

                <a href="<?php the_permalink(); ?>">
                    <?php
                    the_post_thumbnail(
                        'thumbnail',
                        array(
                            'class' => 'flex-shrink-0',
                        )
                    );
                    ?>
                </a>

            <?php endif; ?>

            <div>

                <h4>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>

                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
                </time>

            </div>

        </div>

    <?php
        endwhile;

        wp_reset_postdata();

    endif;
    ?>

</div>

<!-- /Recent Posts Widget -->

       <!-- Categories Widget -->
<div class="categories-widget widget-item">

    <h3 class="widget-title">Categories</h3>

    <ul class="mt-3">
        <?php
        wp_list_categories(
            array(
                'title_li'   => '',
                'show_count' => true,
                'hide_empty' => true,
            )
        );
        ?>
    </ul>

</div>
<!-- /Categories Widget -->

        <!-- Tags Widget -->
<!-- Tags Widget -->
<div class="tags-widget widget-item">

    <h3 class="widget-title">Tags</h3>

    <ul>

        <?php
        $tags = get_tags();

        if ( ! empty( $tags ) ) :
            foreach ( $tags as $tag ) :
        ?>

            <li>
                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
                    <?php echo esc_html( $tag->name ); ?>
                </a>
            </li>

        <?php
            endforeach;
        endif;
        ?>

    </ul>

</div>
<!-- /Tags Widget -->

      </div>
</aside><!-- #secondary -->

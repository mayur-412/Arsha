<?php
/**
 * Template Name: Protfolio datelis
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
$heating_title = get_field('heating_title', 'option');
?>

 <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <?php
             $portfolio_btn = get_field('portfolio_btn', 'option');
             foreach ($portfolio_btn as $pro_btn) {
               $portfolio_link = $pro_btn['portfolio_link'];
               $portfolio_class = $pro_btn['portfolio_class'];
               ?> <li class="<?php if(!empty($portfolio_class)){ ?> <?php echo $portfolio_class; ?> <?php  } ?>"><a href="<?php echo $portfolio_link['url']; ?>" title="<?php echo $portfolio_link['title']; ?>"><?php echo $portfolio_link['title']; ?></a></li> <?php
             }
            ?>
          </ol>
        </nav>
        <h1><?php echo $heating_title; ?></h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">
                <?php 
                $swiper_slide = get_field('swiper_slide', 'option');
                foreach ($swiper_slide as $img_item) {
                   ?> <div class="swiper-slide">
                  <img src="<?php echo $img_item['slide_bg']; ?>" alt="">
                </div> <?php
                } ?>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <?php
            $info_title = get_field('info_title', 'option');
            $info_item = get_field('info_item', 'option');
            $caption_desc = get_field('caption_desc', 'option');
            $caption_title = get_field('caption_title', 'option');
            ?>
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3><?php echo $info_title; ?></h3>
              <ul>
                <?php foreach ($info_item as $cap_up) {
                  $info_label = $cap_up['info_label'];
                  $info_link = $cap_up['info_link'];
                  $info_label_t = $cap_up['info_label_t'];
                  ?> <li><strong><?php echo $info_label; ?></strong>: <?php if(!empty($info_link)){ ?> <a href="<?php echo $info_link['url']; ?>" title="<?php echo $info_link['title']; ?>"><?php echo $info_link['title']; ?></a> <?php } ?><?php echo $info_label_t; ?></li> <?php
                } ?>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2><?php echo $caption_title; ?></h2>
              <p><?php echo $caption_desc; ?></p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>

<?php
get_footer();

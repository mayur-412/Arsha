<?php
/**
 * Template Name: Home page
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

<?php // Check value exists.
if( have_rows('body_part') ):

// Loop through rows.
while ( have_rows('body_part') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'hero_section' ):
        $hero_bg = get_sub_field('hero_bg');
        $hero_title = get_sub_field('hero_title');
        $hero_desc = get_sub_field('hero_desc');
        $hero_btn = get_sub_field('hero_btn');
?> <!-- Hero Section -->
<section id="hero" class="hero section dark-background">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
        <h1><?php echo $hero_title; ?></h1>
        <p><?php echo $hero_desc; ?></p>
        <div class="d-flex">
          <?php foreach ($hero_btn as $btn) {
            $hero_link = $btn['hero_link'];
            $btn_class = $btn['btn_class'];
            $btn_icon = $btn['btn_icon'];
            ?> <a href="<?php echo $hero_link['url']; ?>" class="<?php echo $btn_class; ?>"><i class="<?php if(!empty($btn_icon)){ ?> <?php echo $btn_icon; ?> <?php } ?>"></i> <?php echo $hero_link['title']; ?></a><?php
          } ?>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="<?php echo $hero_bg; ?>" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section><!-- /Hero Section --> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'clients_section' ): 
        $clients_slider = get_sub_field('clients_slider');
?> <!-- Clients Section -->
<section id="clients" class="clients section light-background">
  <div class="container" data-aos="zoom-in">
    <div class="swiper init-swiper">
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
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 40
            },
            "480": {
              "slidesPerView": 3,
              "spaceBetween": 60
            },
            "640": {
              "slidesPerView": 4,
              "spaceBetween": 80
            },
            "992": {
              "slidesPerView": 5,
              "spaceBetween": 120
            },
            "1200": {
              "slidesPerView": 6,
              "spaceBetween": 120
            }
          }
        }
      </script>
      <div class="swiper-wrapper align-items-center">
        <?php foreach ($clients_slider as $slide) {
          ?> <div class="swiper-slide">
          <img src="<?php echo $slide['slide_bg']; ?>" class="img-fluid" alt="">
        </div> <?php
        } ?>
      </div>
    </div>
  </div>
</section><!-- /Clients Section --> <?php


    // Case: Download layout.
    elseif( get_row_layout() == 'about_section' ): 
        $about_title = get_sub_field('about_title');
        $content_one = get_sub_field('content_one');
        $content_two = get_sub_field('content_two');
        $about_link = get_sub_field('about_link');
        $about_date = get_sub_field('about_date');
        $arrow_right = get_sub_field('arrow_right');
?> <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $about_title; ?></h2>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p><?php echo $content_one; ?></p>
            <ul>
              <?php foreach ($about_date as $date) {
                $date_fild = $date['date_fild'];
                $date_icon = $date['date_icon'];
                ?> <li><i class="<?php echo $date_icon; ?>"></i> <span><?php echo $date_fild; ?></span></li> <?php
              } ?>
            </ul>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p><?php echo $content_two; ?><p>
            <a href="<?php echo $about_link['url']; ?>" class="read-more"><span><?php echo $about_link['title']; ?></span><i class="<?php echo $arrow_right; ?>"></i></a>
          </div>

        </div>

      </div>
 </section> <?php


    // Case: Download layout.
    elseif( get_row_layout() == 'why_us_section' ): 
        $why_title = get_sub_field('why_title');
        $why_desc = get_sub_field('why_desc');
        $why_bg = get_sub_field('why_bg');
        $why_faq = get_sub_field('why_faq');
?> <section id="why-us" class="section why-us light-background" data-builder="section">
      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><?php echo $why_title; ?></h3>
              <p><?php echo $why_desc; ?></p>
            </div>
            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
              <?php foreach ($why_faq as $faq) {
                ?> <div class="faq-item faq-active">
                <h3><?php echo $faq['faq_title']; ?></h3>
                <div class="faq-content">
                  <p><?php echo $faq['faq_desc']; ?></p>
                </div>
                <i class="<?php echo $faq['fqa_class']; ?>"></i>
              </div> <?php
              } ?>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="<?php echo $why_bg; ?>" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>
      </div>
    </section> <?php


 // Case: Download layout.
    elseif( get_row_layout() == 'skill_section' ): 
        $skill_bg = get_sub_field('skill_bg');
        $skill_title = get_sub_field('skill_title');
        $skill_desc = get_sub_field('skill_desc');
        $progressbar = get_sub_field('progressbar');
?> <section id="skills" class="skills section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-6 d-flex align-items-center">
            <img src="<?php echo $skill_bg; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3><?php echo $skill_title; ?></h3>
            <p class="fst-italic"><?php echo $skill_desc; ?></p>
            <div class="skills-content skills-animation">
              <?php foreach ($progressbar as $progres) {
                ?> <div class="progress">
                    <span class="skill"><span><?php echo $progres['progres_title']; ?></span> <i class="<?php echo $progres['progres_icon']; ?>"><?php echo $progres['progres_number']; ?>%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progres['progres_number']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
              </div> <?php
              } ?>
            </div>

          </div>
        </div>
      </div>
    </section> <?php

     // Case: Download layout.
    elseif( get_row_layout() == 'services_section' ): 
        $services_title = get_sub_field('services_title');
        $services_desc = get_sub_field('services_desc');
        $section_class = get_sub_field('section_class');
        $section_id = get_sub_field('section_id');
        $box_section = get_sub_field('box_section');
?> <section id="<?php echo $section_id; ?>" class="<?php echo $section_class; ?>">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $services_title; ?></h2>
        <p><?php echo $services_desc; ?></p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <?php foreach ($box_section as $box) {
            $box_item = $box['box_item'];
            ?> <div class="<?php echo $box['box_class']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $box['date_dealy']; ?>">
            <div class="<?php echo $box['class_two']; ?>">
              <?php if(!empty($box['box_bg'])){ ?> <div class="steps-image">
                <img src="<?php echo $box['box_bg']; ?>" alt="Step 1" class="img-fluid" loading="lazy">
              </div> <?php } ?>
              <?php if(!empty($box['box_icon'])){ ?> <div class="icon"><i class="<?php echo $box['box_icon']; ?>"></i></div> <?php } ?>
              <?php if(!empty($box['box_title'])){ ?> <h4><a href="" class="stretched-link"><?php echo $box['box_title']; ?></a></h4> <?php } ?>
              <?php if(!empty($box['box_desc'])){ ?> <p><?php echo $box['box_desc']; ?></p> <?php } ?>
              <?php if(!empty($box['content_class'])){ ?>
                <div class="<?php echo $box['content_class']; ?>">
                  <div class="steps-number"><?php echo $box['box_no']; ?></div>
                  <h3><?php echo $box['title_two']; ?></h3>
                  <p><?php echo $box['desc_two']; ?></p>
                  <div class="steps-features">
                      <?php foreach ($box_item as $item_dp) {
                     ?>  <div class="feature-item">
                    <i class="<?php echo $item_dp['item_icon']; ?>"></i>
                    <span><?php echo $item_dp['item_tx']; ?></span>
                  </div> <?php
                  } ?>
                  </div>
                </div>
               <?php } ?>
             
            </div>
          </div> <?php
          } ?>
        </div>
      </div>
  </section> <?php


      // Case: Download layout.
        elseif( get_row_layout() == 'call_section' ): 
            $call_bg = get_sub_field('call_bg');
            $call_title = get_sub_field('call_title');
            $call_desc = get_sub_field('call_desc');
            $call_link = get_sub_field('call_link');
?>  <section id="call-to-action" class="call-to-action section dark-background">
      <img src="<?php echo $call_bg; ?>" alt="">
      <div class="container">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3><?php echo $call_title; ?></h3>
            <p><?php echo $call_desc; ?></p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="<?php echo $call_link['url']; ?>" title="<?php echo $call_link['title']; ?>"><?php echo $call_link['title']; ?></a>
          </div>
        </div>
      </div>
    </section> <?php


        // Case: Download layout.
      elseif( get_row_layout() == 'portfolio_section' ): 
          $portfolio_title = get_sub_field('portfolio_title');
          $portfolio_desc = get_sub_field('portfolio_desc');
          $portfolio_tab = get_sub_field('portfolio_tab');
          $portfolio_content = get_sub_field('portfolio_content');
?> <section id="portfolio" class="portfolio section">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $portfolio_title; ?></h2>
        <p><?php echo $portfolio_desc; ?></p>
      </div>
      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
         <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
          <?php foreach ($portfolio_tab as $tab_tx) {
               ?> <li data-filter="<?php echo $tab_tx['date_id']; ?>" class="<?php if(!empty($tab_tx['date_class'])){ ?> <?php echo $tab_tx['date_class']; ?> <?php } ?>"><?php echo $tab_tx['date_text']; ?></li> <?php
          } ?>
          </ul>
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($portfolio_content as $port_cont) {
              $content_link = $port_cont['content_link'];
                ?> <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?php echo $port_cont['content_id']; ?>">
              <img src="<?php echo $port_cont['content_bg']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $port_cont['content_title']; ?></h4>
                <p><?php echo $port_cont['content_label']; ?></p>
                <?php foreach ($content_link as $tab_link) {
                  ?> <a href="<?php echo $tab_link['content_btn']['url']; ?>" title="<?php echo $tab_link['content_btn']['title']; ?>" data-gallery="portfolio-gallery-app" class="<?php echo $tab_link['link_class']; ?>"><i class="<?php echo $tab_link['content_class']; ?>"></i></a> <?php
                } ?>
              </div>
            </div> <?php
            } ?>
          </div>
        </div>
      </div>
    </section> <?php


        // Case: Download layout.
      elseif( get_row_layout() == 'team_section' ): 
          $team_title = get_sub_field('team_title');
          $tema_desc = get_sub_field('tema_desc');
          $team_card = get_sub_field('team_card');
?> <section id="team" class="team section">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $team_title; ?></h2>
        <p><?php echo $tema_desc; ?></p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <?php foreach ($team_card as $card) {
            $media = $card['media'];
            ?> <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="<?php echo $card['team_bg']; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $card['team_heading']; ?></h4>
                <span><?php echo $card['team_label']; ?></span>
                <p><?php echo $card['team_content']; ?></p>
                <div class="social">
                  <?php foreach ($media as $social) {
                     ?> <a href=""><i class="<?php echo $social['m_class']; ?>"></i></a> <?php
                  } ?>
                </div>
              </div>
            </div>
          </div> <?php
          } ?>
        </div>
      </div>
    </section> <?php


        // Case: Download layout.
  elseif( get_row_layout() == 'pricing_section' ): 
          $pricing_title = get_sub_field('pricing_title');
          $pricing_desc = get_sub_field('pricing_desc');
          $pricing_card = get_sub_field('pricing_card');
?>  <section id="pricing" class="pricing section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $pricing_title; ?></h2>
        <p><?php echo $pricing_desc; ?></p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <?php foreach ($pricing_card as $pro_card) {
            $price_date = $pro_card['price_date'];
             ?> <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="<?php echo $pro_card['delay_date']; ?>">
            <div class="pricing-item">
              <h3><?php echo $pro_card['price_label']; ?></h3>
              <h4><?php echo $pro_card['price_title']; ?></h4>
              <ul>
                <?php foreach ($price_date as $price_tx) {
                  ?> <li class="<?php if(!empty($price_tx['price_class'])){ ?> <?php echo $price_tx['price_class']; ?> <?php } ?>"><i class="<?php echo $price_tx['price_icon']; ?>"></i> <span><?php echo $price_tx['price_text']; ?></span></li> <?php
                } ?>
              </ul>
              <a href="<?php echo $pro_card['price_link']['url']; ?>" title="<?php echo $pro_card['price_link']['title']; ?>" class="buy-btn"><?php echo $pro_card['price_link']['title']; ?></a>
            </div>
          </div> <?php
          } ?>
        </div>
      </div>
    </section> <?php

         // Case: Download layout.
  elseif( get_row_layout() == 'testimonials_section' ): 
          $testimonials_title = get_sub_field('testimonials_title');
          $testimonials_desc = get_sub_field('testimonials_desc');
          $slide_bar = get_sub_field('slide_bar');
?> <section id="testimonials" class="testimonials section">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $testimonials_title; ?></h2>
        <p><?php echo $testimonials_desc; ?></p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
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
          <div class="swiper-wrapper">
            <?php foreach ($slide_bar as $slide_up) {
               $slide_star = $slide_up['slide_star'];
               ?> <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo $slide_up['slide_bg']; ?>" class="testimonial-img" alt="">
                <h3><?php echo $slide_up['slide_title']; ?></h3>
                <h4>Ceo & Founder</h4>
                <div class="stars">
                  <?php foreach ($slide_star as $star) {
                    ?> <i class="<?php echo $star['star_icon']; ?>"></i> <?php
                  } ?>
                </div>
                <p>
                  <i class="<?php echo $slide_up['left_icon']; ?>"></i>
                  <span><?php echo $slide_up['slide_content']; ?></span>
                  <i class="<?php echo $slide_up['right_icon']; ?>"></i>
                </p>
              </div>
            </div> <?php
            } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section> <?php

             // Case: Download layout.
  elseif( get_row_layout() == 'faq_section' ): 
          $faq_title = get_sub_field('faq_title');
          $faq_desc = get_sub_field('faq_desc');
          $faq_item = get_sub_field('faq_item');
?> <section id="faq-2" class="faq-2 section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $faq_title; ?></h2>
        <p><?php echo $faq_desc; ?></p>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="faq-container">
              <?php foreach ($faq_item as $item_up) {
                ?> <div class="faq-item <?php if(!empty($item_up['faq_class'])){ ?> <?php echo $item_up['faq_class']; ?> <?php } ?>" data-aos="fade-up" data-aos-delay="<?php echo $item_up['faq_delay']; ?>">
                <i class="<?php echo $item_up['faq_circle']; ?>"></i>
                <h3><?php echo $item_up['item_title']; ?></h3>
                <div class="faq-content">
                  <p><?php echo $item_up['item_desc']; ?></p>
                </div>
                <i class="<?php echo $item_up['faq_icon']; ?>"></i>
              </div> <?php
              } ?>
            </div>
          </div>
        </div>
      </div>
    </section> <?php


                 // Case: Download layout.
  elseif( get_row_layout() == 'subscribe_section' ): 
          $subscribe_title = get_sub_field('subscribe_title');
          $subscribe_desc = get_sub_field('subscribe_desc');
          $subscribe_bg = get_sub_field('subscribe_bg');
?> <section id="subscribe" class="subscribe section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-between align-items-center">
          <div class="col-lg-6">
            <div class="cta-content" data-aos="fade-up" data-aos-delay="200">
              <h2><?php echo $subscribe_title; ?></h2>
              <p><?php echo $subscribe_desc; ?></p>
              <form action="forms/newsletter.php" method="post" class="php-email-form cta-form" data-aos="fade-up" data-aos-delay="300">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email address..." aria-label="Email address" aria-describedby="button-subscribe">
                  <button class="btn btn-primary" type="submit" id="button-subscribe">Subscribe</button>
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your subscription request has been sent. Thank you!</div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cta-image" data-aos="zoom-out" data-aos-delay="200">
              <img src="<?php echo $subscribe_bg; ?>" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section> <?php


  elseif( get_row_layout() == 'blog_section' ): 
          $blog_title = get_sub_field('blog_title');
          $blog_desc = get_sub_field('blog_desc');
          $blog_box = get_sub_field('blog_box');
?>  <section id="recent-blog-postst" class="recent-blog-postst section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $blog_title; ?></h2>
        <p><?php echo $blog_desc; ?></p>
      </div>
      <div class="container">
        <div class="row gy-5">
          <?php foreach ($blog_box as $post_up) {
            ?> <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="<?php echo $post_up['blog_delay']; ?>">
              <div class="post-img position-relative overflow-hidden">
                <img src="<?php echo $post_up['blog_bg']; ?>" class="img-fluid" alt="">
                <span class="post-date"><?php echo $post_up['post_date']; ?></span>
              </div>
              <div class="post-content d-flex flex-column">
                <h3 class="post-title"><?php echo $post_up['post_title']; ?></h3>
                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="<?php echo $post_up['person_icon']; ?>"></i> <span class="ps-2"><?php echo $post_up['person_name']; ?></span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="<?php echo $post_up['folder_icon']; ?>"></i> <span class="ps-2"><?php echo $post_up['folder_name']; ?></span>
                  </div>
                </div>
                <hr>
                <a href="<?php echo $post_up['post_link']['url']; ?>" class="readmore stretched-link"><span>"<?php echo $post_up['post_link']['title']; ?></span><i class="<?php echo $post_up['right_class']; ?>"></i></a>
              </div>
            </div>
          </div> <?php
          } ?>
        </div>
      </div>
    </section> <?php

      elseif( get_row_layout() == 'contact_section' ): 
          $contact_title = get_sub_field('contact_title');
          $contact_desc = get_sub_field('contact_desc');
          $info_box = get_sub_field('info_box');
?> <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $contact_title; ?></h2>
        <p><?php echo $contact_desc; ?></p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-5">
            <div class="info-wrap">
              <?php foreach ($info_box as $info_date) {
                ?> <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="<?php echo $info_date['info_delay']; ?>">
                <i class="<?php echo $info_date['info_class']; ?>"></i>
                <div>
                  <h3><?php echo $info_date['info_title']; ?></h3>
                  <p><?php echo $info_date['info_address']; ?></p>
                </div>
              </div> <?php
              } ?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
          <div class="col-lg-7">
           <div class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <?php echo do_shortcode('[contact-form-7 id="f5cc88f" title="Contact form"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </section> <?php
    
    endif;

// End loop.
endwhile;

// No value.
else :
    // Do something...
endif; ?>


</main>

<?php
get_footer();

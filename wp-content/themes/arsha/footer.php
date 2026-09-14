<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Arsha
 */

?>

<footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <?php
            $newsletter_title = get_field('newsletter_title', 'option');
            $newsletter_desc = get_field('newsletter_desc', 'option'); 
             ?>
            <h4><?php echo $newsletter_title; ?></h4>
            <p><?php echo $newsletter_desc; ?></p>
            <div class="php-email-form">
                <?php echo do_shortcode('[contact-form-7 id="79683a3" title="Newsletter form"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <?php
      $f_logo = get_field('footer_logo', 'option');
      $address_card = get_field('address_box', 'option'); 
      ?>
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename"><?php echo $f_logo ?></span>
          </a>
          <div class="footer-contact pt-3">
            <?php foreach ($address_card as $address) {
              $address_text = $address['address_text'];
              $address_class = $address['address_class'];
              ?> <p class="<?php if(!empty($address_class)){ ?> <?php echo $address_class; ?> <?php } ?>"><?php echo $address_text; ?></p> <?php
            } ?>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <?php $f_title = get_field('footer_title', 'option'); ?>
          <h4><?php echo $f_title; ?></h4>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-about',
            'container'      => false,
          ) );
          ?>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <?php $titile_one = get_field('footer_title_one', 'option'); ?>
          <h4><?php echo $titile_one; ?></h4>
          <?php 
          wp_nav_menu( array(
            'theme_location' => 'menu-services',
            'container'      => false,
          ) );
           ?>
        </div>

        <div class="col-lg-4 col-md-12">
          <?php 
          $title_two = get_field('footer_title_two', 'option'); 
          $footer_content = get_field('footer_content', 'option'); 
          $footer_icon = get_field('footer_icon', 'option'); 
          ?>
          <h4><?php echo $title_two; ?></h4>
          <p><?php echo $footer_content; ?></p>
          <div class="social-links d-flex">
            <?php foreach ($footer_icon as $f_icon) {
              ?> <a href=""><i class="<?php echo $f_icon['icon_class'] ?>"></i></a> <?php
            } ?>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <?php
       $copyright_label = get_field('copyright_label', 'option'); 
       $copyright_link = get_field('copyright_link', 'option'); 
       ?>
      <p><?php echo $copyright_label; ?></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package assessment-task
 */

?>

<footer id="colophon" class="site-footer">
    <?php 
        // Get background image URL
        $background_fimage_url = get_field('footer_background_image', 'option')['url'];
    ?>
    <div class="footer" style="background-image: url('<?php echo $background_fimage_url; ?>');">
        <div class="container">
            <div class="footer-outter">
                <?php
					$footer_logo = get_field('footer_logo', 'option');
					if ($footer_logo) {
						$footer_logo_url = $footer_logo['url']; // Get the URL property from the array
						echo '<img src="' . $footer_logo_url . '" alt="Footer Logo">';
					}
				?>
            </div>
            <div class="footer-inner">
                <div class="footer-info">
                    <h2><?php echo get_field('footer_info_title', 'option'); ?></h2>
                    <p><?php echo get_field('footer_info_description', 'option'); ?></p>
                </div>
                <div class="quick-links">
                    <h2><?php echo get_field('quick_links_title', 'option'); ?></h2>
                    <?php if( have_rows('quick_links', 'option') ): ?>
                    <ul class="quick-links">
                        <?php while( have_rows('quick_links', 'option') ): the_row();  ?>
                        <li>
                            <a href="<?php the_sub_field('quick_links_url'); ?>"><?php the_sub_field('quick_link'); ?>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>




            <div class="copy-right">
                <p><?php the_field('footer_copy_right', 'option'); ?></p>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->


<script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
$(document).ready(function() {
    $(".hero-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        autoplay: false,
        asNavFor: ".slider-nav",
    });

    $(".slider-nav").slick({
        slidesToShow: 5, // Adjust this value based on the number of brand logos
        slidesToScroll: 1,
        asNavFor: ".hero-slider",
        dots: false,
        centerMode: true,
        focusOnSelect: true,
    });
});
</script>




<!--***************************************************************************************************************
 									Services slider 
*****************************************************************************************************************-->

<script>
jQuery(document).ready(function($) {
    $('.services-tabs').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.service-slider',
        focusOnSelect: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000, // Adjust the autoplay speed (in milliseconds) as needed
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                centerMode: true,
            }
        }]
    });

    $('.service-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.services-tabs',
        autoplay: true,
        autoplaySpeed: 2000, // Adjust the autoplay speed (in milliseconds) as needed
    });
});
</script>

<?php wp_footer(); ?>

</body>

</html>
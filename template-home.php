<?php
/**
 * The Home page template file
 *
 * Template Name: Home Page 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package assessment-task
 */

get_header();
?>


<main id="primary" class="site-main">

    <!-- Hero Slider -->

    <div class="slider-main">
        <div class="hero-slider">
            <?php while (have_rows('hero_slider')) : the_row(); ?>
            <?php 
                // Get background image URL
                $background_image_url = get_sub_field('slider_background_image')['url'];
            ?>
            <div class="slider-item" style="background-image: url('<?php echo $background_image_url; ?>');">
                <p><?php echo get_sub_field('sub_heading'); ?></p>
                <h2><?php echo get_sub_field('main_title'); ?></h2>
                <div class="es-year">
                    <img src="http://localhost/assessment-task/wp-content/uploads/2024/02/fav.png" alt="">
                    <p class="year"><span>منذ عـــــــــــــــــــــــــــام
                        </span><?php echo get_sub_field('year_established'); ?></p>
                </div>
                <a href="<?php echo get_sub_field('button_url'); ?>"><?php echo get_sub_field('button_text'); ?></a>
            </div>
            <?php endwhile; ?>
        </div>

        <!-- Navigation Slider -->
        <div class="slider-nav brand-logos">
            <?php 
            if (have_rows('brand_logos')) :
                while (have_rows('brand_logos')) : the_row();
                    $brand_logo = get_sub_field('brand_logo');
                    if ($brand_logo) : ?>
            <div class="logo-item">
                <img src="<?php echo $brand_logo['url']; ?>" alt="<?php echo $brand_logo['alt']; ?>">
            </div>
            <?php endif;
                endwhile;
            endif;
        ?>
        </div>
    </div>




    <!-- Hero Slider End Here -->

    <!-- Services Section Start Here -->
    <div class="services">
        <div class="container">
            <h2>Services</h2>

            <!-- <div class="services-slider"> -->
            <!-- ************************************************************************************* -->



            <?php
// Query services custom post type
$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1, // -1 to retrieve all posts
));

// Check if there are any services
if ($services_query->have_posts()) :
?>
            <div class="services-tabs">
                <?php
        while ($services_query->have_posts()) : $services_query->the_post();
            // Get featured image URL
            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
                <div class="service-tab" style="background-image: url('<?php echo $featured_image_url; ?>');">
                    <h2><?php the_title(); ?></h2>
                </div>
                <?php
        endwhile;
        wp_reset_postdata(); // Reset post data
        ?>
            </div>

            <div class="service-content">
                <div class="service-slider">
                    <?php
            // Loop through services again to output service content
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => -1, // -1 to retrieve all posts
            ));

            while ($services_query->have_posts()) : $services_query->the_post();
                // Get service content
                $content = get_the_content();
                // Get gallery images
                $gallery_images = get_field('service_gallery');
            ?>
                    <div class="service-slide">
                        <div class="service-item">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo $content; ?></p>
                            <div class="service-gallery">
                                <?php
                            // Output each image from the gallery
                            if (!empty($gallery_images)) {
                                foreach ($gallery_images as $image) {
                                    echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '">';
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php
else :
    // No services found
    echo '<p>No services found.</p>';
endif;
?>




            <!-- ************************************************************************************* -->
            <!-- </div> -->
        </div>
    </div>
    <!-- Services Section End Here -->

</main><!-- #main -->

<?php
get_footer();
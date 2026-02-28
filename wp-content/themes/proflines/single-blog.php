<?php get_header(); ?>
<main class="single-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>blog/">Blog</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="single">
        <div class="container">
            <div class="single__body">
                <div class="single__head">
                    <div class="single-head__body">
                        <div class="single-head__badge">
                            <span>
                            <?php
                            $categories = get_the_category();

                            if ( ! empty($categories) ) {
                                foreach ( $categories as $cat ) {
                                    if ( $cat->parent != 0 ) {
                                        $parent = get_category( $cat->parent );
                                        if ( $parent->slug === 'blog' ) {
                                            echo esc_html( $cat->name );
                                            break;
                                        }
                                    }
                                }
                            }
                            ?>
                            </span>
                        </div>
                        <div class="single-head__title">
                            <h1>
                                <?php
                                $title = get_the_title();
                                preg_match('/^([^.!?:;]+[.!?:;]?)/u', $title, $matches);
                                
                                if (!empty($matches[0])) {
                                    $first_part = $matches[0];
                                    $rest_part = trim(substr($title, strlen($first_part)));

                                    if (!empty($rest_part)) {
                                        echo '<span style="color: #CBCBCB;">' . esc_html($first_part) . '</span> ' . esc_html($rest_part);
                                    } else {
                                        echo esc_html($title);
                                    }
                                } else {
                                    echo esc_html($title);
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="single-head__text">
                            <p><?php the_content(); ?></p>
                        </div>
                        <div class="single-head__date">
                            <span><?php echo get_the_date('j. F Y'); ?></span>
                        </div>
                    </div>
                    <div class="single-head__img">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>" loading="lazy" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Dynamic Content from ACF -->
                <div class="single__content">
                    <div class="single-content__body">
                        <?php the_field('single_main_content'); ?>
                    </div>

                    <!-- Conditional Banner -->
                    <?php if( get_field('single_content_banner_enabled') ): 
                        $banner_image = get_field('single_content_banner_image');
                        $banner_caption = get_field('single_content_banner_caption');
                        $banner_title = get_field('single_content_banner_title');
                        $banner_text = get_field('single_content_banner_text');
                    ?>
                    <div class="single-content__banner" style="background-image: url('<?php echo esc_url($banner_image['url']); ?>');">
                        <div class="single-content-banner__body">
                            <?php if( $banner_caption ): ?>
                            <div class="single-content-banner__caption">
                                <span><?php echo $banner_caption; ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if( $banner_title ): ?>
                            <div class="single-content-banner__title">
                                <h2><?php echo $banner_title; ?></h2>
                            </div>
                            <?php endif; ?>
                            <?php if( $banner_text ): ?>
                            <div class="single-content-banner__text">
                                <p><?php echo $banner_text; ?></p>
                            </div>
                            <?php endif; ?>
                            <div class="single-content-banner__button">
                                <a href></a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="single__side">
                    <!-- Top Offer -->
                    <div class="single-side__offer">
                        <div class="single-side__title">
                            <h3><?php the_field('single_side_offer_title'); ?></h3>
                        </div>
                        <?php if( have_rows('single_side_offer_list') ): ?>
                        <ul class="single-side__list">
                            <?php while( have_rows('single_side_offer_list') ) : the_row(); 
                                $list_item = get_sub_field('list_item');
                            ?>
                            <li><?php echo $list_item; ?></li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                        <div class="single-side__button button">
                            <a href><?php the_field('single_side_offer_button_text'); ?></a>
                        </div>
                    </div>

                    <!-- Bottom CTA -->
                    <div class="single-side__cta">
                        <div class="single-side__title">
                            <h4><?php the_field('single_side_cta_title'); ?></h4>
                        </div>
                        <div class="single-side__text">
                            <p><?php the_field('single_side_cta_text'); ?></p>
                        </div>
                        <div class="single-side__button">
                            <a href><?php the_field('single_side_cta_button_text'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
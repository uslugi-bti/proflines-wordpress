<?php get_header(); ?>
<main class="home-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>">Domov</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero__body">
                <div class="hero__badge">
                    <p><?php the_field('hero_badge'); ?></p>
                </div>
                <div class="hero__title">
                    <h1>
                        <?php the_field('hero_title_part1'); ?> <span style="color: #CBCBCB;"><?php the_field('hero_title_part2_grey'); ?></span> <?php the_field('hero_title_part3'); ?>
                        <span class="hero-title__images">
                            <span class="hero-title__img --1">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/hero/01.svg" loading="lazy" alt="chatGPT">
                            </span>
                            <span style="font-weight: 700;"><?php the_field('hero_text_after_img1'); ?></span>
                            <span class="hero-title__img --2">
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/hero/02.svg" loading="lazy" alt="Perplexity AI">
                            </span>
                        </span>
                    </h1>
                </div>
                <div class="hero__text">
                    <p><?php the_field('hero_subtitle'); ?></p>
                </div>
                <div class="hero__buttons">
                    <a href="<?php echo home_url('/'); ?>#packages"><?php the_field('hero_button_1_text'); ?></a>
                    <a href="<?php echo home_url('/'); ?>#services"><?php the_field('hero_button_2_text'); ?></a>
                </div>
                <div class="hero__inscription">
                    <p><?php the_field('hero_inscription'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Companys Section -->
    <section class="companys">
        <div class="container">
            <div class="companys__title">
                <h1><?php the_field('companys_title'); ?></h1>
            </div>
            <?php if( have_rows('companys_logos') ): ?>
            <div class="companys__body">
                <div class="companys__marquee">
                    <div class="companys__track">
                        <div class="companys__items">
                            <?php while( have_rows('companys_logos') ) : the_row();
                                $logo = get_sub_field('companys_logos'); // Assuming it's a sub-field of a gallery? Actually gallery field returns array directly. Let's adjust.
                            ?>
                            <?php endwhile; ?>
                            <?php
                            // Correct way: get the gallery array and loop through it.
                            $gallery_images = get_field('companys_logos');
                            if( $gallery_images ): ?>
                                <?php foreach( $gallery_images as $image ): ?>
                                    <div class="companys__item">
                                        <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="companys__items">
                            <?php if( $gallery_images ): ?>
                                <?php foreach( $gallery_images as $image ): ?>
                                    <div class="companys__item">
                                        <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Expertise Section -->
    <section class="expertise">
        <div class="container">
            <div class="expertise__title">
                <h1><?php the_field('expertise_title'); ?></h1>
            </div>
            <?php if( have_rows('expertise_items') ): ?>
            <div class="columns__body">
                <?php while( have_rows('expertise_items') ) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" loading="lazy" alt="<?php echo esc_attr($icon['alt']); ?>">
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
                <div class="columns__item choose">
                    <div class="columns-item__button button">
                        <a href="<?php echo home_url('/'); ?>#services"><?php the_field('expertise_button_text'); ?></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="packages" id="packages">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('packages_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('packages_subtitle'); ?></p>
                </div>
            </div>
            <?php if( have_rows('packages_items') ): ?>
            <div class="packages__body">
                <?php while( have_rows('packages_items') ) : the_row();
                    $plan = get_sub_field('plan');
                    $description = get_sub_field('description');
                    $price = get_sub_field('price');
                    $main_text = get_sub_field('main_text');
                    $button_text = get_sub_field('button_text');
                    $inscription = get_sub_field('inscription');
                    $is_dark = get_sub_field('is_dark');
                    $dark_class = $is_dark ? 'dark' : '';
                ?>
                <div class="packages__item <?php echo $dark_class; ?>">
                    <div class="packages-item__sticker">
                        <span>SK+EN verzia</span>
                    </div>
                    <div class="packages-item__plan">
                        <span><?php echo $plan; ?></span>
                    </div>
                    <div class="packages-item__description">
                        <p><?php echo $description; ?></p>
                    </div>
                    <div class="packages-item__price">
                        <div class="packages-item-price__number">
                            <span>€</span>
                            <p><?php echo number_format((float)$price, 2, '.', ''); ?></p>
                        </div>
                    </div>
                    <div class="packages-item__text">
                        <?php echo $main_text; ?>
                    </div>
                    <div class="packages-item__button button">
                        <a href="<?php echo home_url('/'); ?>#services"><?php echo $button_text; ?></a>
                    </div>
                    <div class="packages-item__inscription">
                        <span><?php echo $inscription; ?></span>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container">
            <div class="services__columns">
                <div class="services__title">
                    <h1><?php the_field('services_title'); ?></h1>
                </div>
                <div class="services__img">
                    <?php $services_image = get_field('services_background_image'); ?>
                    <img src="<?php echo esc_url($services_image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($services_image['alt']); ?>">
                    <div class="services-img__parallax-container">
                        <div class="services-img__icon --1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/services/ai/01.svg" loading="lazy" alt="01">
                        </div>
                        <div class="services-img__icon --2">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/services/ai/02.svg" loading="lazy" alt="01">
                        </div>
                        <div class="services-img__icon --3">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/services/ai/03.svg" loading="lazy" alt="01">
                        </div>
                    </div>
                </div>
                <div class="services__body" data-count="5">
                    <div class="columns__body">
                        <?php
                        $services_query = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => 'services',
                            'posts_per_page' => -1,
                            'order' => 'ASC'
                        ));
                        
                        while($services_query->have_posts()) : $services_query->the_post();
                        ?>
                        <div class="columns__item">
                            <a href="<?php the_permalink(); ?>brif">
                                <div class="columns-item__head">
                                    <div class="columns-item__icon">
                                        <?php echo get_the_post_thumbnail(); ?>
                                    </div>
                                    <div class="columns-item__title">
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                </div>
                                <div class="columns-item__text">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    <div class="services__button">
                        <button id="Zobraziť menej">Zobraziť viac</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Section -->
    <section class="partnership">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('partnership_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('partnership_subtitle'); ?></p>
                </div>
            </div>
            <?php if( have_rows('partnership_items') ): ?>
            <div class="columns__body">
                <?php while( have_rows('partnership_items') ) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" loading="lazy" alt="<?php echo esc_attr($icon['alt']); ?>">
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process">
        <div class="container">
            <div class="process__title">
                <h1><?php the_field('process_title'); ?></h1>
            </div>
            <?php if( have_rows('process_items') ): ?>
            <div class="columns__body">
                <?php 
                $step_counter = 1;
                while( have_rows('process_items') ) : the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <span><?php echo str_pad($step_counter, 2, '0', STR_PAD_LEFT); ?></span>
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
                <?php 
                $step_counter++;
                endwhile; 
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('mission_title'); ?></h1>
                </div>
            </div>
            <?php if( have_rows('mission_items') ): ?>
            <div class="columns__body">
                <?php while( have_rows('mission_items') ) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" loading="lazy" alt="<?php echo esc_attr($icon['alt']); ?>">
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="mission__img">
            <?php $mission_image = get_field('mission_background_image'); ?>
            <?php if( $mission_image ): ?>
                <img src="<?php echo esc_url($mission_image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($mission_image['alt']); ?>">
            <?php endif; ?>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="testimonials__title">
                <h1><?php the_field('testimonials_title'); ?></h1>
            </div>
            <?php if( have_rows('testimonials_items') ): ?>
            <div class="testimonials__body">
                <?php while( have_rows('testimonials_items') ) : the_row();
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    $name = get_sub_field('name');
                    $profession = get_sub_field('profession');
                ?>
                <div class="testimonials__item">
                    <div class="testimonials-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                    <div class="testimonials-item__body">
                        <div class="testimonials-item__img">
                            <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        <div class="testimonials-item__content">
                            <div class="testimonials-item__name">
                                <h2><?php echo $name; ?></h2>
                            </div>
                            <div class="testimonials-item__profession">
                                <p><?php echo $profession; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <div class="testimonials__cover">
                    <div class="testimonials-cover__button button">
                        <a href="<?php echo home_url('/'); ?>kontakt"><?php the_field('testimonials_button_text'); ?></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-us">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('why_us_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('why_us_subtitle'); ?></p>
                </div>
            </div>
            <?php if( have_rows('why_us_items') ): ?>
            <div class="columns__body">
                <?php while( have_rows('why_us_items') ) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" loading="lazy" alt="<?php echo esc_attr($icon['alt']); ?>">
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio">
        <div class="portfolio__cover"></div>
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('portfolio_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('portfolio_subtitle'); ?></p>
                </div>
            </div>
            <?php if( have_rows('portfolio_items') ): ?>
            <div class="portfolio__body swiper">
                <div class="portfolio__wrapper swiper-wrapper">
                    <?php while( have_rows('portfolio_items') ) : the_row();
                        $image = get_sub_field('image');
                        $project_name = get_sub_field('project_name');
                        $project_badge = get_sub_field('project_badge');
                        $short_text = get_sub_field('short_text');
                        $description = get_sub_field('description');
                        $button_text = get_sub_field('button_text');
                    ?>
                    <div class="portfolio__item swiper-slide">
                        <div class="portfolio-item__img">
                            <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                            <div class="portfolio-item-img__badge">
                                <?php if( have_rows('results_list') ): ?>
                                <ul class="portfolio-item-img__result">
                                    <?php while( have_rows('results_list') ) : the_row(); 
                                        $result_text = get_sub_field('result_text');
                                    ?>
                                    <li><?php echo $result_text; ?></li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php endif; ?>
                                <?php if( have_rows('technologies_list') ): ?>
                                <ul class="portfolio-item-img__technologies">
                                    <?php while( have_rows('technologies_list') ) : the_row(); 
                                        $tech_name = get_sub_field('tech_name');
                                    ?>
                                    <li><?php echo $tech_name; ?></li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="portfolio-item__body">
                            <div class="portfolio-item__head">
                                <div class="portfolio-item-head__title">
                                    <h2><?php echo $project_name; ?></h2>
                                </div>
                                <div class="portfolio-item-head__badge">
                                    <span><?php echo $project_badge; ?></span>
                                </div>
                            </div>
                            <div class="portfolio-item__text">
                                <p><?php echo $short_text; ?></p>
                            </div>
                            <div class="portfolio-item__title">
                                <h3>Čo sme robili</h3>
                            </div>
                            <div class="portfolio-item__description">
                                <p><?php echo $description; ?></p>
                            </div>
                            <div class="portfolio-item__button">
                                <a href>
                                    <span><?php echo $button_text; ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <div class="team__body">
                <div class="team__content">
                    <div class="team-content__title">
                        <h1><?php the_field('team_title'); ?></h1>
                    </div>
                    <div class="team-content__qoute">
                        <p>„<?php the_field('team_quote'); ?>“</p>
                    </div>
                </div>
                <div class="team__img">
                    <?php $team_image = get_field('team_image'); ?>
                    <?php if( $team_image ): ?>
                        <img src="<?php echo esc_url($team_image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($team_image['alt']); ?>">
                    <?php endif; ?>
                    <?php if( have_rows('team_members') ): ?>
                        <?php while( have_rows('team_members') ) : the_row();
                            $coord_top = get_sub_field('coord_top');
                            $coord_left = get_sub_field('coord_left');
                            $name = get_sub_field('name');
                            $description = get_sub_field('description');
                        ?>
                        <div class="team-img__point" style="top: <?php echo $coord_top; ?>%; left: <?php echo $coord_left; ?>%;">
                            <button></button>
                            <div class="team-img__badge">
                                <div class="team-img__title">
                                    <h2><?php echo $name; ?></h2>
                                </div>
                                <div class="team-img__text">
                                    <p><?php echo $description; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <div class="faq__title">
                <h1><?php the_field('faq_title'); ?></h1>
            </div>
            <?php if( have_rows('faq_items') ): ?>
            <div class="faq__body">
                <?php 
                $faq_items = get_field('faq_items');
                $half_count = ceil(count($faq_items) / 2);
                $first_column = array_slice($faq_items, 0, $half_count);
                $second_column = array_slice($faq_items, $half_count);
                ?>
                <div class="faq__column">
                    <?php foreach( $first_column as $item ): ?>
                    <div class="faq__item">
                        <div class="faq-item__title">
                            <h2><?php echo $item['question']; ?></h2>
                            <button></button>
                        </div>
                        <div class="faq-item__text">
                            <p><?php echo $item['answer']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="faq__column">
                    <?php foreach( $second_column as $item ): ?>
                    <div class="faq__item">
                        <div class="faq-item__title">
                            <h2><?php echo $item['question']; ?></h2>
                            <button></button>
                        </div>
                        <div class="faq-item__text">
                            <p><?php echo $item['answer']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="faq__button">
                <button id="Zobraziť menej"><?php the_field('faq_button_text'); ?></button>
            </div>
        </div>
    </section>

    <!-- Banner gradient -->
    <section class="banner gradient">
        <div class="container">
            <div class="banner__body">
                <div class="banner__container">
                    <div class="banner__title">
                        <h1><?php the_field('banner_gradient_title'); ?></h1>
                    </div>
                    <div class="banner__text">
                        <p><?php the_field('banner_gradient_text'); ?></p>
                    </div>
                    <div class="banner__button button">
                        <a href><?php the_field('banner_gradient_button_text'); ?></a>
                    </div>
                    <div class="banner__text">
                        <p><?php the_field('banner_gradient_footer_text'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('trust_title'); ?></h1>
                </div>
            </div>
            <?php if( have_rows('trust_items') ): ?>
            <div class="columns__body">
                <?php while( have_rows('trust_items') ) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" loading="lazy" alt="<?php echo esc_attr($icon['alt']); ?>">
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Banner yellow inside Trust -->
            <div class="banner yellow">
                <div class="container">
                    <div class="banner__body">
                        <div class="banner__container">
                            <div class="banner__title">
                                <h1><?php the_field('banner_yellow_title'); ?></h1>
                            </div>
                            <div class="banner__text">
                                <p><?php the_field('banner_yellow_text'); ?></p>
                            </div>
                            <div class="banner__button button">
                                <a href><?php the_field('banner_yellow_button_text'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ROI Kalkulačka (Hardcoded, no ACF fields) -->
    <section class="roi">
        <div class="container">
            <div class="roi__title">
                <h1>ROI Kalkulačka</h1>
            </div>
            <div class="roi__text">
                <p>Odhadnite potenciálnu návratnosť investície do marketingu</p>
            </div>
            <div class="roi__body">
                <div class="roi__input">
                    <div class="card input-card">
                        <div class="input-header">
                            <span>Mesačný rozpočet</span>
                            <span class="value" id="budgetVal">1000 €</span>
                        </div>
                        <input type="range" id="budget" min="100" max="10000" value="1000">
                        <div class="range-labels">
                            <span>€100</span><span>€10,000</span>
                        </div>
                    </div>

                    <div class="card input-card">
                        <div class="input-header">
                            <span>Cena za klik (CPC)</span>
                            <span class="value" id="cpcVal">€0.60</span>
                        </div>
                        <input type="range" id="cpc" min="0.2" max="5" step="0.01" value="0.6">
                        <div class="range-labels">
                            <span>€0.20</span><span>€5.00</span>
                        </div>
                    </div>

                    <div class="card input-card">
                        <div class="input-header">
                            <span>Konverzný pomer (CR)</span>
                            <span class="value" id="crVal">2.5%</span>
                        </div>
                        <input type="range" id="cr" min="0.5" max="5" step="0.1" value="2.5">
                        <div class="range-labels">
                            <span>0.5%</span><span>5.0%</span>
                        </div>
                    </div>

                    <div class="card input-card">
                        <div class="input-header">
                            <span>Priemerná objednávka (AOV)</span>
                            <span class="value" id="aovVal">150 €</span>
                        </div>
                        <input type="range" id="aov" min="20" max="1000" value="150">
                        <div class="range-labels">
                            <span>€20</span><span>€1,000</span>
                        </div>
                    </div>
                </div>
                <div class="roi__result">
                    <div class="roi__box">
                        <div class="roi-box__head">
                            <p>Odhadovaný ROI</p>
                        </div>
                        <div class="roi-box__title">
                            <h1 id="roi">+0%</h1>
                        </div>
                        <div class="roi-box__text">
                            <p>Návratnosť investície za mesiac</p>
                        </div>
                    </div>

                    <div class="stats">
                        <div class="stat">
                            <div class="stat__head">
                                <p><span style="background: url('<?php bloginfo('template_url'); ?>/assets/img/roi/02.svg');"></span>Kliky</p>
                            </div>
                            <div class="stat__title">
                                <h1 id="clicks">0</h1>
                            </div>
                        </div>

                        <div class="stat">
                            <div class="stat__head">
                                <p><span style="background: url('<?php bloginfo('template_url'); ?>/assets/img/roi/03.svg');"></span>Konverzie</p>
                            </div>
                            <div class="stat__title">
                                <h1 id="conversions">0</h1>
                            </div>
                        </div>

                        <div class="stat span-two">
                            <div class="stat__head">
                                <p><span style="background: url('<?php bloginfo('template_url'); ?>/assets/img/roi/04.svg');"></span>Konverzie</p>
                            </div>
                            <div class="stat__title">
                                <h1 id="revenue">0</h1>
                            </div>
                            <div class="stat__text">
                                <p>Za investíciu 1 000 €</p>
                            </div>
                        </div>

                        <div class="stat span-two">
                            <div class="stat__text">
                                <p>Páčia sa vám tieto výsledky?</p>
                            </div>
                            <div class="stat__button button">
                                <a href>Začnite ešte dnes</a>
                            </div>
                        </div>
                        <div class="note">
                            <p>* Toto je len orientačný výpočet. Skutočné výsledky sa môžu líšiť v závislosti od mnohých faktorov.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner yellow (capacity) -->
    <section class="banner yellow">
        <div class="container">
            <div class="banner__body">
                <div class="banner__container">
                    <div class="banner__title">
                        <h1><?php the_field('banner_capacity_title'); ?></h1>
                    </div>
                    <div class="banner__text">
                        <p><?php the_field('banner_capacity_text'); ?></p>
                    </div>
                    <div class="banner__button button">
                        <a href><?php the_field('banner_capacity_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>
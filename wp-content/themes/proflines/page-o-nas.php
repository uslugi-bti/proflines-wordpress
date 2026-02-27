<?php get_header(); ?>
<main class="mission-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href><?php echo esc_html(get_field('breadcrumb_home_text')); ?></a>
                </li>
                <li class="breadcrump__item">
                    <a href><?php echo esc_html(get_field('breadcrumb_current_text')); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <section class="mission-hero">
        <div class="container">
            <div class="mission-hero__body">
                <div class="mission-hero__content">
                    <div class="mission-hero__title">
                        <h1><span style="color: #CBCBCB;"><?php echo esc_html(get_field('hero_title_part_1')); ?></span> <?php echo esc_html(get_field('hero_title_part_2')); ?></h1>
                    </div>
                    <div class="mission-hero__text">
                        <?php echo get_field('hero_text'); ?>
                    </div>
                </div>
                <div class="mission-hero__img">
                    <?php $hero_main_image = get_field('hero_main_image'); ?>
                    <img src="<?php echo esc_url($hero_main_image['url']); ?>" alt="<?php echo esc_attr($hero_main_image['alt'] ?: 'mission'); ?>" loading="lazy">
                    
                    <?php $hero_decor_1 = get_field('hero_decor_1'); ?>
                    <div class="mission-hero-img__img --1">
                        <img src="<?php echo esc_url($hero_decor_1['url']); ?>" alt="<?php echo esc_attr($hero_decor_1['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                    
                    <?php $hero_decor_2 = get_field('hero_decor_2'); ?>
                    <div class="mission-hero-img__img --2">
                        <img src="<?php echo esc_url($hero_decor_2['url']); ?>" alt="<?php echo esc_attr($hero_decor_2['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                    
                    <?php $hero_decor_3 = get_field('hero_decor_3'); ?>
                    <div class="mission-hero-img__img --3">
                        <img src="<?php echo esc_url($hero_decor_3['url']); ?>" alt="<?php echo esc_attr($hero_decor_3['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                    
                    <?php $hero_decor_4 = get_field('hero_decor_4'); ?>
                    <div class="mission-hero-img__img --4">
                        <img src="<?php echo esc_url($hero_decor_4['url']); ?>" alt="<?php echo esc_attr($hero_decor_4['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mission">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('mission_title')); ?></h1>
                </div>
                <div class="block-head__text">
                    <?php echo get_field('mission_text'); ?>
                </div>
            </div>
            <div class="columns__body">
                <?php if( have_rows('mission_columns') ): ?>
                    <?php while( have_rows('mission_columns') ) : the_row(); ?>
                        <?php 
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                        ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: 'icon'); ?>" loading="lazy">
                                </div>
                                <div class="columns-item__title">
                                    <h2><?php echo esc_html($title); ?></h2>
                                </div>
                            </div>
                            <div class="columns-item__text">
                                <p><?php echo esc_html($text); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="mission__img">
                <?php $mission_bottom_image = get_field('mission_bottom_image'); ?>
                <img src="<?php echo esc_url($mission_bottom_image['url']); ?>" alt="<?php echo esc_attr($mission_bottom_image['alt'] ?: 'mission'); ?>" loading="lazy">
            </div>
        </div>
    </section>
    <section class="what-do services">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1>Čo robíme</h1>
                </div>
                <div class="block-head__text">
                    <p>Ponúkame komplexný rozsah digitálnych služieb postavený na hĺbokej analýze</p>
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
                    
                    $counter = 0;
                    while($services_query->have_posts()) : $services_query->the_post();
                    $counter++;
                    $span_class = ($counter == 5) ? 'span-two' : '';
                    ?>
                    <div class="columns__item <?php echo $span_class; ?>">
                        <a href="<?php the_permalink(); ?>">
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
    </section>
    <section class="how">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('how_title')); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php echo esc_html(get_field('how_subtitle')); ?></p>
                </div>
            </div>
            <div class="how__body">
                <div class="how__item span-two">
                    <div class="how-item__body">
                        <div class="how-item__title">
                            <h3>AI asistent Gem</h3>
                        </div>
                        <div class="how-item__text">
                            <?php echo get_field('how_gem_text'); ?>
                        </div>
                    </div>
                </div>
                <div class="how__item">
                    <div class="how-item__body">
                        <div class="how-item__text"><?php echo (get_field('how_email_text')); ?></div>
                    </div>
                </div>
                <div class="how__item">
                    <div class="how-item__body">
                        <div class="how-item__text">
                            <p><?php echo get_field('how_steps_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('team_title')); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php echo esc_html(get_field('team_subtitle')); ?></p>
                </div>
            </div>
            <div class="team__items">
                <?php if( have_rows('team_members') ): ?>
                    <?php while( have_rows('team_members') ) : the_row(); ?>
                        <?php 
                            $photo = get_sub_field('photo');
                            $name = get_sub_field('name');
                            $position = get_sub_field('position');
                            $description = get_sub_field('description');
                            $email = get_sub_field('email');
                        ?>
                        <div class="team__item">
                            <div class="team-item__img">
                                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt'] ?: 'team'); ?>" loading="lazy">
                            </div>
                            <div class="team-item__haed">
                                <div class="team-item__title">
                                    <h4><?php echo esc_html($name); ?></h4>
                                </div>
                                <div class="team-item__job">
                                    <span><?php echo esc_html($position); ?></span>
                                </div>
                            </div>
                            <div class="team-item__text">
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                            <div class="team-item__email">
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="mission-hero initiative">
        <div class="container">
            <div class="mission-hero__body">
                <div class="mission-hero__img">
                    <?php $initiative_main_image = get_field('initiative_main_image'); ?>
                    <img src="<?php echo esc_url($initiative_main_image['url']); ?>" alt="<?php echo esc_attr($initiative_main_image['alt'] ?: 'mission'); ?>" loading="lazy">
                    
                    <?php $initiative_decor_1 = get_field('initiative_decor_1'); ?>
                    <div class="mission-hero-img__img --1">
                        <img src="<?php echo esc_url($initiative_decor_1['url']); ?>" alt="<?php echo esc_attr($initiative_decor_1['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                    
                    <?php $initiative_decor_2 = get_field('initiative_decor_2'); ?>
                    <div class="mission-hero-img__img --2">
                        <img src="<?php echo esc_url($initiative_decor_2['url']); ?>" alt="<?php echo esc_attr($initiative_decor_2['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                    
                    <?php $initiative_decor_3 = get_field('initiative_decor_3'); ?>
                    <div class="mission-hero-img__img --3">
                        <img src="<?php echo esc_url($initiative_decor_3['url']); ?>" alt="<?php echo esc_attr($initiative_decor_3['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                    
                    <?php $initiative_decor_4 = get_field('initiative_decor_4'); ?>
                    <div class="mission-hero-img__img --4">
                        <img src="<?php echo esc_url($initiative_decor_4['url']); ?>" alt="<?php echo esc_attr($initiative_decor_4['alt'] ?: 'mission'); ?>" loading="lazy">
                    </div>
                </div>
                <div class="mission-hero__content">
                    <div class="mission-hero__title">
                        <h2><?php echo esc_html(get_field('initiative_title')); ?></h2>
                    </div>
                    <div class="mission-hero__text">
                        <?php echo get_field('initiative_text'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="companys">
        <div class="container">
            <div class="companys__title">
                <h1><?php echo esc_html(get_field('tools_title')); ?></h1>
            </div>
            <div class="companys__body">
                <div class="companys__marquee">
                    <div class="companys__track">
                        <div class="companys__items">
                            <?php $tools_logos = get_field('tools_logos'); ?>
                            <?php if( $tools_logos ): ?>
                                <?php foreach( $tools_logos as $logo ): ?>
                                    <div class="companys__item">
                                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" loading="lazy">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="companys__items">
                            <?php if( $tools_logos ): ?>
                                <?php foreach( $tools_logos as $logo ): ?>
                                    <div class="companys__item">
                                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" loading="lazy">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="principles">
        <div class="container">
            <div class="principles__body">
                <?php $principles_logo = get_field('principles_logo'); ?>
                <img src="<?php echo esc_url($principles_logo['url']); ?>" alt="<?php echo esc_attr($principles_logo['alt'] ?: 'logo'); ?>" loading="lazy">
                
                <?php $principle_1_icon = get_field('principle_1_icon'); ?>
                <div class="principles__badge --1">
                    <img src="<?php echo esc_url($principle_1_icon['url']); ?>" alt="<?php echo esc_attr($principle_1_icon['alt'] ?: 'principles'); ?>" loading="lazy">
                    <span><?php echo esc_html(get_field('principle_1_text')); ?></span>
                </div>
                
                <?php $principle_2_icon = get_field('principle_2_icon'); ?>
                <div class="principles__badge --2">
                    <img src="<?php echo esc_url($principle_2_icon['url']); ?>" alt="<?php echo esc_attr($principle_2_icon['alt'] ?: 'principles'); ?>" loading="lazy">
                    <span><?php echo esc_html(get_field('principle_2_text')); ?></span>
                </div>
                
                <?php $principle_3_icon = get_field('principle_3_icon'); ?>
                <div class="principles__badge --3">
                    <img src="<?php echo esc_url($principle_3_icon['url']); ?>" alt="<?php echo esc_attr($principle_3_icon['alt'] ?: 'principles'); ?>" loading="lazy">
                    <span><?php echo esc_html(get_field('principle_3_text')); ?></span>
                </div>
                
                <?php $principle_4_icon = get_field('principle_4_icon'); ?>
                <div class="principles__badge --4">
                    <img src="<?php echo esc_url($principle_4_icon['url']); ?>" alt="<?php echo esc_attr($principle_4_icon['alt'] ?: 'principles'); ?>" loading="lazy">
                    <span><?php echo esc_html(get_field('principle_4_text')); ?></span>
                </div>

                <div class="principles__content">
                    <div class="principles__container">
                        <div class="principles__title">
                            <h2><?php echo esc_html(get_field('principles_content_title')); ?></h2>
                        </div>
                        <div class="principles__text">
                            <p><?php echo esc_html(get_field('principles_content_text')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
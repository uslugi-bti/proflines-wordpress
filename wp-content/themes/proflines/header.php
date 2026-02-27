<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header-top">
                    <div class="header-top__text">
                        <span>Niekoľko <u>bezplatných miest</u> pre malých výrobcov, ktorým pomáhame prejsť do online prostredia</span>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="header-bottom__logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo/01.svg" alt="logo" loading="lazy">
                        </a>
                    </div>
                    <div class="header-bottom__list">
                        <ul class="header-bottom__items">
                            <li class="header-bottom__item">
                                <a href="<?php echo home_url('/o-nas'); ?>">O nás</a>
                            </li>
                            <li class="header-bottom__item">
                                <a href="#">Služby</a>
                                <span></span>
                            </li>
                            <li class="header-bottom__item">
                                <a href="<?php echo home_url('/baliky-sluzieb'); ?>">Balíky služieb</a>
                            </li>
                            <li class="header-bottom__item">
                                <a href="<?php echo home_url('/kontakt'); ?>">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-bottom__body">
                        <div class="header-bottom__link">
                            <div class="header-bottom-link__icon">
                                <a href="tel:+421944457515">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/header/01.svg" alt="phone" loading="lazy">
                                </a>
                            </div>
                            <div class="header-bottom-link__text">
                                <a href="tel:+421944457515">+421 944 457 515</a>
                            </div>
                        </div>
                        <div class="header-bottom__link">
                            <div class="header-bottom-link__icon">
                                <a href="mailto:info@proflines.agency">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/header/02.svg" alt="email" loading="lazy">
                                </a>
                            </div>
                            <div class="header-bottom-link__text">
                                <a href="mailto:info@proflines.agency">info@proflines.agency</a>
                            </div>
                        </div>
                        <div class="header-bottom__search">
                            <button></button>
                            <form class="header-bottom-search__body">
                                <button type="submit"></button>
                                <input type="text" placeholder="Čo hľadáte?" autocomplete="off">

                                <ul class="header-bottom-search__tips">
                                    <li class="header-bottom-search__tip">
                                        <a href="#">Hĺbkový <strong>Marketi</strong>ngový Prieskum</a>
                                    </li>
                                    <li class="header-bottom-search__tip">
                                        <a href="#"><strong>Marketi</strong>ngový Prieskum</a>
                                    </li>
                                    <li class="header-bottom-search__tip">
                                        <a href="#">Hĺbkový <strong>Marketi</strong>ngový Prieskum</a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="header-bottom__menu">
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="header-bottom__services">
                        <div class="header-bottom-services__items">
                            <?php
                            // Získanie všetkých služieb (posts s kategóriou services a bez ina-sluzba)
                            $services_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => 'services'
                                    ),
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => 'ina-sluzba',
                                        'operator' => 'NOT IN'
                                    )
                                )
                            );
                            $services = get_posts($services_args);
                            
                            if (!empty($services)):
                                $icon_counter = 1;
                                foreach ($services as $service):
                                    $thumbnail_id = get_post_thumbnail_id($service->ID);
                                    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
                            ?>
                            <div class="header-bottom-services__item">
                                <div class="header-bottom-services-item__img">
                                    <a href="<?php echo get_permalink($service->ID); ?>">
                                        <?php if ($thumbnail_url): ?>
                                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title($service->ID)); ?>" loading="lazy">
                                        <?php else: ?>
                                            <img src="<?php bloginfo('template_url'); ?>/assets/img/header/services/<?php echo str_pad($icon_counter, 2, '0', STR_PAD_LEFT); ?>.svg" alt="<?php echo esc_attr(get_the_title($service->ID)); ?>" loading="lazy">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="header-bottom-services-item__text">
                                    <a href="<?php echo get_permalink($service->ID); ?>">
                                        <p><?php echo get_the_title($service->ID); ?></p>
                                    </a>
                                </div>
                            </div>
                            <?php
                                    $icon_counter++;
                                endforeach;
                            else:
                                // Fallback pre prípad, že nie sú žiadne služby
                                $fallback_services = array(
                                    'Hĺbkový Marketingový Prieskum',
                                    'SEO Audit Webových Stránok',
                                    'Správa Reklamných Kampaní (PPC)',
                                    'Expanzia na Zahraničné Trhy',
                                    'Tvorba Webových Stránok',
                                    'Správa Sociálnych Sietí',
                                    'Odblokovanie Google Merchant Center a zamietnutých produktov',
                                    'Optimalizácia pre vyhľadávanie v AI (AIO / GEO)',
                                    'Tvorba e-commerce obsahu "na kľúč"',
                                    'Automatizácia predaja pomocou chatbotov',
                                    'Integrácia CRM a komplexnej analytiky',
                                    'E-mail marketing a automatizácia udržania zákazníkov',
                                    'Implementácia platobných systémov (Fintech Support)',
                                    'Strategický linkbuilding a PR',
                                    'Hĺbkový monitoring konkurencie (Market Intelligence)'
                                );
                                foreach ($fallback_services as $index => $service_name):
                            ?>
                            <div class="header-bottom-services__item">
                                <div class="header-bottom-services-item__img">
                                    <a href="#">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/header/services/<?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>.svg" alt="<?php echo esc_attr($service_name); ?>" loading="lazy">
                                    </a>
                                </div>
                                <div class="header-bottom-services-item__text">
                                    <a href="#">
                                        <p><?php echo $service_name; ?></p>
                                    </a>
                                </div>
                            </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="header-bottom-services__info">
                            <?php
                            // Získanie najnovšieho blog postu
                            $blog_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'category_name' => 'blog'
                            );
                            $blog_query = new WP_Query($blog_args);
                            
                            if ($blog_query->have_posts()):
                                while ($blog_query->have_posts()): $blog_query->the_post();
                                    $categories = get_the_category();
                                    $blog_category = '';
                                    foreach ($categories as $cat) {
                                        if ($cat->parent != 0) {
                                            $parent = get_category($cat->parent);
                                            if ($parent->slug === 'blog') {
                                                $blog_category = $cat->name;
                                                break;
                                            }
                                        }
                                    }
                            ?>
                            <div class="header-bottom-services__blog">
                                <div class="header-bottom-services-blog__img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()): ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" loading="lazy">
                                        <?php else: ?>
                                            <img src="<?php bloginfo('template_url'); ?>/assets/img/header/blog/01.jpg" alt="blog" loading="lazy">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="header-bottom-services-blog__badge">
                                    <span><?php echo $blog_category ?: 'Marketingový prieskum'; ?></span>
                                </div>
                                <div class="header-bottom-services-blog__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                                <div class="header-bottom-services-blog__bottom">
                                    <div class="header-bottom-services-blog__date">
                                        <span><?php echo get_the_date('d. F Y'); ?></span>
                                    </div>
                                    <div class="header-bottom-services-blog__button">
                                        <a href="<?php the_permalink(); ?>">→</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else:
                            ?>
                            <div class="header-bottom-services__blog">
                                <div class="header-bottom-services-blog__img">
                                    <a href="#">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/header/blog/01.jpg" alt="blog" loading="lazy">
                                    </a>
                                </div>
                                <div class="header-bottom-services-blog__badge">
                                    <span>Marketingový prieskum</span>
                                </div>
                                <div class="header-bottom-services-blog__title">
                                    <a href="#">
                                        <h2>5 kľúčových chýb pri marketingovom prieskume na Slovensku</h2>
                                    </a>
                                </div>
                                <div class="header-bottom-services-blog__bottom">
                                    <div class="header-bottom-services-blog__date">
                                        <span>15. december 2024</span>
                                    </div>
                                    <div class="header-bottom-services-blog__button">
                                        <a href="#">→</a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="header-bottom-services__badge">
                                <div class="header-bottom-services-badge__title">
                                    <h2>Nenechajte marketing na náhodu</h2>
                                </div>
                                <div class="header-bottom-services-badge__text">
                                    <p>Nenechajte marketing na náhodu</p>
                                </div>
                                <div class="header-bottom-services-badge__button button">
                                    <a href="<?php echo home_url('/kontakt'); ?>">Získať konzultáciu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="header-sidebar">
            <ul class="header-sidebar__body">
                <li class="header-sidebar__item">
                    <a href="<?php echo home_url('/blog'); ?>">Blog</a>
                </li>
                <li class="header-sidebar__item">
                    <a href="<?php echo home_url('/faq'); ?>">FAQ</a>
                </li>
                <li class="header-sidebar__item">
                    <a href="<?php echo home_url('/socialna-iniciativa'); ?>">Sociálna iniciatíva</a>
                </li>
                <li class="header-sidebar__item">
                    <a href="<?php echo home_url('/21-chyb'); ?>">21 chýb</a>
                </li>
            </ul>
        </div>
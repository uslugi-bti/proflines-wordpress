<?php get_header(); ?>

<main class="marketing-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php the_permalink(); ?>">Prieskum trhu a marketingový prieskum</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Hero sekcia -->
    <section class="service-hero marketing">
        <div class="container">
            <div class="service-hero__body">
                <div class="service-hero__content">
                    <div class="service-hero__title">
                        <h1><?php the_field('hero_title'); ?></h1>
                    </div>
                    <div class="service-hero__text">
                        <p><?php the_field('hero_subtitle'); ?></p>
                    </div>
                    <div class="service-hero__button button">
                        <a href="<?php echo home_url('/'); ?>kontakt/"><?php the_field('hero_button_text'); ?></a>
                    </div>
                </div>
                <div class="service-hero__img">
                    <img src="<?php the_field('hero_image'); ?>" loading="lazy" alt="hero">
                </div>
            </div>
        </div>
    </section>

    <!-- Spoločnosti -->
    <section class="companys">
        <div class="container">
            <div class="companys__title">
                <h1><?php the_field('companies_title'); ?></h1>
            </div>
            <?php if (have_rows('companies_logos')): ?>
            <div class="companys__body">
                <div class="companys__marquee">
                    <div class="companys__track">
                        <div class="companys__items">
                            <?php while (have_rows('companies_logos')): the_row(); 
                                $logo = get_sub_field('logo');
                            ?>
                            <div class="companys__item">
                                <img src="<?php echo $logo; ?>" loading="lazy" alt="company logo">
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="companys__items">
                            <?php while (have_rows('companies_logos')): the_row(); 
                                $logo = get_sub_field('logo');
                            ?>
                            <div class="companys__item">
                                <img src="<?php echo $logo; ?>" loading="lazy" alt="company logo">
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Štatistiky -->
    <section class="statistics">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('statistics_main_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('statistics_main_text'); ?></p>
                </div>
            </div>
            <?php if (have_rows('statistics_items')): ?>
            <div class="columns__body">
                <?php while (have_rows('statistics_items')): the_row(); 
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <?php echo $text; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Banner Google Merchant -->
            <div class="assessment banner gradient">
                <div class="container">
                    <div class="banner__body">
                        <div class="banner__container">
                            <div class="banner__title">
                                <h1><?php the_field('banner_merchant_title'); ?></h1>
                            </div>
                            <div class="banner__text">
                                <p><?php the_field('banner_merchant_text'); ?></p>
                            </div>
                            <div class="banner__button button">
                                <a href="<?php echo home_url('/'); ?>kontakt/"><?php the_field('banner_merchant_button_text'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Obavy a riešenia -->
    <section class="banners">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('worries_title'); ?></h1>
                </div>
            </div>
            <div class="banners__columns">
                <div class="banners__column">
                    <div class="banner__body red">
                        <div class="banner__container">
                            <div class="banner__text">
                                <p><?php the_field('red_banner_text'); ?></p>
                            </div>
                            <?php if (have_rows('red_banner_list')): ?>
                            <ul class="banner__list">
                                <?php while (have_rows('red_banner_list')): the_row(); 
                                    $item = get_sub_field('item');
                                ?>
                                <li><?php echo $item; ?></li>
                                <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="banners__column">
                    <div class="banner__body blue">
                        <div class="banner__container left icon">
                            <div class="banner__title">
                                <h3>Riešenie</h3>
                            </div>
                            <div class="banner__text">
                                <?php the_field('blue_banner_text'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="banner__body white">
                        <div class="banner__container">
                            <div class="banner__title">
                                <h1>Garancia vrátenia peňazí</h1>
                            </div>
                            <div class="banner__text">
                                <?php the_field('white_banner_refund_text'); ?>
                            </div>
                            <?php if (have_rows('terminal_text')): ?>
                            <div class="refund-terminal">
                                <?php while (have_rows('terminal_text')): the_row(); 
                                    $line = get_sub_field('line');
                                ?>
                                <div class="line"><span class="prompt blue">$</span> <span id="line-1"><?php echo $line; ?></span></div>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bolesti podnikateľov -->
    <section class="banners">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('pains_title'); ?></h1>
                </div>
            </div>
            <div class="banners__body">
                <div class="banner__body span-row-two white">
                    <div class="banner__container span-row-two left">
                        <div class="banner__title">
                            <h4>Začiatky podnikania sú prirodzene spojené s obavami Ak ste si položili jednu z nasledujúcich otázok, ste na správnom mieste.</h4>
                        </div>
                        <?php if (have_rows('pains_list')): ?>
                        <ul class="banner__list err">
                            <?php while (have_rows('pains_list')): the_row(); 
                                $item = get_sub_field('item');
                            ?>
                            <li><?php echo $item; ?></li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="banner__body grey">
                    <div class="banner__container left">
                        <div class="banner__text">
                            <?php the_field('pains_stat_text'); ?>
                        </div>
                    </div>
                </div>
                <div class="banner__body white">
                    <div class="banner__container left">
                        <div class="banner__title">
                            <h4>Čo prináša prieskum:</h4>
                        </div>
                        <?php if (have_rows('pains_solutions')): ?>
                        <ul class="banner__list success">
                            <?php while (have_rows('pains_solutions')): the_row(); 
                                $item = get_sub_field('item');
                            ?>
                            <li><?php echo $item; ?></li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="banner__body grey span-two">
                    <div class="banner__container">
                        <div class="banner__text">
                            <?php the_field('pains_final_text'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Čo očakávať -->
    <section class="expect">
        <div class="container">
            <div class="expect__body">
                <div class="expect__title">
                    <h2><?php the_field('expect_title'); ?></h2>
                </div>
                <?php if (have_rows('expect_items')): ?>
                <div class="columns__body">
                    <?php while (have_rows('expect_items')): the_row(); 
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $list = get_sub_field('list');
                    ?>
                    <div class="columns__item">
                        <div class="columns-item__head">
                            <div class="columns-item__icon">
                                <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
                            </div>
                            <div class="columns-item__title">
                                <h2><?php echo $title; ?></h2>
                            </div>
                        </div>
                        <div class="columns-item__text">
                            <?php if ($list): ?>
                            <ul>
                                <?php foreach ($list as $item): ?>
                                <li><?php echo $item['item']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Princípy metodiky -->
    <section class="gradient-block">
        <div class="container">
            <div class="gradient-block__body">
                <div class="gradient-block__container">
                    <div class="gradient-block__title">
                        <h2><?php the_field('principles_main_title'); ?></h2>
                    </div>
                    <div class="gradient-block__text">
                        <p><?php the_field('principles_main_text'); ?></p>
                    </div>
                    <?php if (have_rows('principles_items')): ?>
                    <div class="columns__body">
                        <?php while (have_rows('principles_items')): the_row(); 
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                        ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
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
            </div>

            <!-- Žltý banner -->
            <div class="banner__body yellow">
                <div class="banner__container">
                    <div class="banner__title">
                        <h1><?php the_field('yellow_banner_title'); ?></h1>
                    </div>
                    <div class="banner__button button">
                        <a href="<?php echo home_url('/'); ?>mistakes/"><?php the_field('yellow_banner_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Postup realizácie -->
    <section class="steps process">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('process_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('process_subtitle'); ?></p>
                </div>
            </div>
            <?php if (have_rows('process_steps')): ?>
            <div class="columns__body">
                <?php while (have_rows('process_steps')): the_row(); 
                    $number = get_sub_field('number');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <span><?php echo $number; ?></span>
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

    <!-- Ako to funguje -->
    <section class="process">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('how_it_works_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('how_it_works_subtitle'); ?></p>
                </div>
            </div>
            <?php if (have_rows('how_it_works_steps')): ?>
            <div class="columns__body">
                <?php while (have_rows('how_it_works_steps')): the_row(); 
                    $number = get_sub_field('number');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $sticker = get_sub_field('sticker');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <span><?php echo $number; ?></span>
                        </div>
                        <div class="columns-item__title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="columns-item__text">
                        <p><?php echo $text; ?></p>
                    </div>
                    <?php if ($sticker): ?>
                    <div class="columns-item__sticker">
                        <span><?php echo $sticker; ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="table" id="table">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('table_title'); ?></h1>
                </div>
            </div>

            <?php if (have_rows('table_items')): ?>
            <div class="table__body table-container">
                <table class="table__table">
                    <colgroup>
                        <col style="width:40%">
                        <col style="width:20%">
                        <col style="width:20%">
                        <col style="width:20%">
                    </colgroup>

                    <thead class="table-header">
                        <tr>
                            <th style="width:40%">Služba / Balík</th>
                            <th style="width:20%">Starter</th>
                            <th style="width:20%">Basic</th>
                            <th style="width:20%">Advanced</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while (have_rows('table_items')): the_row(); 
                            $service_name = get_sub_field('service_name');
                            $has_info = get_sub_field('has_info');
                            $info_text = get_sub_field('info_text');
                            $starter = get_sub_field('starter');
                            $basic = get_sub_field('basic');
                            $advanced = get_sub_field('advanced');
                        ?>
                        <tr>
                            <td>
                                <?php echo $service_name; ?>
                                <?php if ($has_info): ?>
                                <span id="info"></span>
                                <div class="table-info">
                                    <div class="table-info__body">
                                        <div class="table-info__container">
                                            <?php echo $info_text; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </td>
                            
                            <!-- Starter Column -->
                            <td>
                                <?php 
                                // Проверяем, нужно ли показывать иконку
                                if (!empty($starter['umiestnit_ikonu_anonieciastocne_namiesto_textu'])): 
                                    // Показываем иконку в зависимости от типа
                                    if ($starter['type'] == 'true'): ?>
                                        <span class="table__icon table__icon--true"></span>
                                    <?php elseif ($starter['type'] == 'false'): ?>
                                        <span class="table__icon table__icon--false"></span>
                                    <?php elseif ($starter['type'] == 'partial'): ?>
                                        <span class="table__icon table__icon--true-false"></span>
                                    <?php endif; ?>
                                <?php else: 
                                    // Если иконка не нужна, показываем текст (если он есть)
                                    if (!empty($starter['custom_text'])): ?>
                                        <span><?php echo $starter['custom_text']; ?></span>
                                <?php endif; 
                                endif; ?>
                            </td>
                            
                            <!-- Basic Column -->
                            <td>
                                <?php 
                                if (!empty($basic['umiestnit_ikonu_anonieciastocne_namiesto_textu_basic'])): 
                                    if ($basic['type'] == 'true'): ?>
                                        <span class="table__icon table__icon--true"></span>
                                    <?php elseif ($basic['type'] == 'false'): ?>
                                        <span class="table__icon table__icon--false"></span>
                                    <?php elseif ($basic['type'] == 'partial'): ?>
                                        <span class="table__icon table__icon--true-false"></span>
                                    <?php endif; ?>
                                <?php else: 
                                    if (!empty($basic['custom_text'])): ?>
                                        <span><?php echo $basic['custom_text']; ?></span>
                                <?php endif; 
                                endif; ?>
                            </td>
                            
                            <!-- Advanced Column -->
                            <td>
                                <?php 
                                if (!empty($advanced['umiestnit_ikonu_anonieciastocne_namiesto_textu_advanced'])): 
                                    if ($advanced['type'] == 'true'): ?>
                                        <span class="table__icon table__icon--true"></span>
                                    <?php elseif ($advanced['type'] == 'false'): ?>
                                        <span class="table__icon table__icon--false"></span>
                                    <?php elseif ($advanced['type'] == 'partial'): ?>
                                        <span class="table__icon table__icon--true-false"></span>
                                    <?php endif; ?>
                                <?php else: 
                                    if (!empty($advanced['custom_text'])): ?>
                                        <span><?php echo $advanced['custom_text']; ?></span>
                                <?php endif; 
                                endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <?php if (have_rows('table_buttons_text')): ?>
            <?php $buttons = get_field('table_buttons_text'); ?>
            <div class="table__buttons">
                <?php foreach ($buttons as $button): ?>
                <div class="table-button__item button">
                    <a href="<?php the_permalink(); ?>brif/"><?php echo $button['button_text']; ?></a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Quote sekcia -->
    <section class="gradient-block">
        <div class="container">
            <div class="gradient-block__body">
                <div class="gradient-block__container">
                    <div class="quote">
                        <div class="quote__content">
                            <div class="quote__text">
                                <p><?php the_field('quote_text'); ?></p>
                            </div>
                        </div>
                        <div class="quote__info">
                            <div class="quote-info__head">
                                <div class="quote-info__icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/quote/icons/01.svg" loading="lazy" alt="icon">
                                </div>
                                <div class="quote-info__text">
                                    <p><?php the_field('quote_author'); ?></p>
                                </div>
                            </div>
                            <div class="quote-info__img">
                                <img src="<?php the_field('quote_author_photo'); ?>" loading="lazy" alt="quote">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transparentnosť -->
    <section class="transparency">
        <div class="container">
            <div class="transparency__title">
                <h2><?php the_field('transparency_title'); ?></h2>
            </div>
            <?php if (have_rows('transparency_items')): ?>
            <div class="columns__body">
                <?php while (have_rows('transparency_items')): the_row(); 
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
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

    <!-- Balíky (karty) -->
    <section class="packages">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('packages_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('packages_subtitle'); ?></p>
                </div>
            </div>
            <?php if (have_rows('packages_items')): ?>
            <div class="packages__body">
                <?php while (have_rows('packages_items')): the_row(); 
                    $name = get_sub_field('name');
                    $description = get_sub_field('description');
                    $price = get_sub_field('price');
                    $features = get_sub_field('features');
                    $button_text = get_sub_field('button_text');
                    $is_dark = get_sub_field('is_dark');
                    $dark_class = $is_dark ? ' dark' : '';
                ?>
                <div class="packages__item<?php echo $dark_class; ?>">
                    <div class="packages-item__sticker">
                        <span>SK+EN verzia</span>
                    </div>
                    <div class="packages-item__plan">
                        <span><?php echo $name; ?></span>
                    </div>
                    <div class="packages-item__description">
                        <p><?php echo $description; ?></p>
                    </div>
                    <div class="packages-item__price">
                        <div class="packages-item-price__number">
                            <span>€</span>
                            <p><?php echo $price; ?></p>
                        </div>
                    </div>
                    <?php if ($features): ?>
                    <div class="packages-item__text">
                        <?php foreach ($features as $feature): ?>
                        <p><?php echo $feature['feature']; ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="packages-item__button button">
                        <a href="<?php the_permalink(); ?>brif/"><?php echo $button_text; ?></a>
                    </div>
                    <div class="packages-item__inscription">
                        <span>Získať plán do 12 hodín</span>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="packages__link">
                <a href="#table"><?php the_field('packages_compare_link_text'); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Vzorky reportov -->
    <section class="gradient-block">
        <div class="container">
            <div class="gradient-block__body">
                <div class="gradient-block__container">
                    <div class="gradient-block__badge blue">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/difference/icons/01.svg" loading="lazy" alt="icon">
                        <p>Bezplatné vzorky</p>
                    </div>
                    <div class="gradient-block__title">
                        <h2><?php the_field('samples_title'); ?></h2>
                    </div>
                    <div class="gradient-block__text">
                        <p><?php the_field('samples_text'); ?></p>
                    </div>
                    <?php if (have_rows('samples_items')): ?>
                    <div class="columns__body">
                        <?php while (have_rows('samples_items')): the_row(); 
                            $name = get_sub_field('name');
                            $icon = get_sub_field('icon');
                            $description = get_sub_field('description');
                            $file_info = get_sub_field('file_info');
                            $file_url = get_sub_field('file_url');
                        ?>
                        <a href="<?php echo $file_url; ?>" target="_blank">
                            <div class="columns__item">
                                <div class="columns-item__head">
                                    <div class="columns-item__icon">
                                        <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
                                    </div>
                                    <div class="columns-item__title">
                                        <h2><?php echo $name; ?></h2>
                                    </div>
                                </div>
                                <div class="columns-item__text">
                                    <p><?php echo $description; ?></p>
                                </div>
                                <div class="columns-item__text">
                                    <p><?php echo $file_info; ?></p>
                                </div>
                                <div class="columns-item__description">
                                    <p>Rýchly náhľad (1 str.)</p>
                                </div>
                            </div>
                        </a>
                        <?php endwhile; ?>
                        
                        <div class="columns__item span-three">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/difference/icons/05.svg" loading="lazy" alt="icon">
                                </div>
                                <div class="columns-item__title">
                                    <h2>Získajte všetky 3 vzorky v plnej verzii zadarmo</h2>
                                </div>
                            </div>
                            <div class="columns-item__text">
                                <p><?php the_field('samples_form_text'); ?></p>
                            </div>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off">
                                </div>
                                <div class="form-button button">
                                    <button type="submit">Stiahnuť vzorky</button>
                                </div>
                                <div class="form-group stub"></div>
                                <div class="form-group checkbox">
                                    <div class="form-group__body">
                                        <label>
                                            <input type="checkbox" name="gdpr" id="gdpr">
                                            <span></span>
                                            <p><span>*Súhlasím so spracovaním <a href="<?php echo home_url('/'); ?>zasady-ochrany-osobnych-udajov-gdpr/">osobných údajov</a></span></p>
                                        </label>
                                        <label>
                                            <input type="checkbox" name="newsletter" id="newsletter">
                                            <span></span>
                                            <p>Chcem dostávať užitočné tipy a novinky e-mailom</p>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Analýza zlyhania -->
    <section class="analysis">
        <div class="container">
            <div class="analysis__body">
                <div class="analysis__title">
                    <h2><?php the_field('analysis_title'); ?></h2>
                </div>
                <div class="analysis__text">
                    <p><?php the_field('analysis_subtitle'); ?></p>
                </div>
                
                <?php if (have_rows('analysis_cards')): ?>
                <div class="analysis__items">
                    <?php while (have_rows('analysis_cards')): the_row(); 
                        $icon = get_sub_field('icon');
                        $badge = get_sub_field('badge');
                        $value = get_sub_field('value');
                        $desc1 = get_sub_field('desc1');
                        $desc2 = get_sub_field('desc2');
                        $color = get_sub_field('color');
                    ?>
                    <div class="analysis__item <?php echo $color; ?>">
                        <div class="analysis-item__head">
                            <div class="analysis-item__icon">
                                <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
                            </div>
                            <?php if ($badge): ?>
                            <div class="analysis-item__badge">
                                <span><?php echo $badge; ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="analysis-item__title">
                            <h2><?php echo $value; ?></h2>
                        </div>
                        <div class="analysis-item__text">
                            <p><?php echo $desc1; ?></p>
                            <p><?php echo $desc2; ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <div class="analysis__chart">
                    <div class="analysis-chart__wrapper">
                        <div class="analysis-chart__title">
                            <h3><?php the_field('analysis_chart_title'); ?></h3>
                        </div>
                        <div class="analysis-chart__text">
                            <p><?php the_field('analysis_chart_desc'); ?></p>
                        </div>
                        <div class="analysis-chart__body">
                            <canvas id="chart"></canvas>
                        </div>

                        <?php if (have_rows('analysis_chart_legend')): ?>
                        <div class="analysis-chart__items">
                            <?php while (have_rows('analysis_chart_legend')): the_row(); 
                                $color = get_sub_field('color');
                                $text = get_sub_field('text');
                            ?>
                            <div class="analysis-chart__item <?php echo $color; ?>">
                                <span><?php echo $text; ?></span>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="analysis__button button">
                    <a href="<?php echo home_url('/'); ?>kontakt/"><?php the_field('analysis_button_text'); ?></a>
                </div>

                <div class="block__head">
                    <div class="block-head__title">
                        <h1><?php the_field('analysis_barriers_title'); ?></h1>
                    </div>
                </div>

                <?php if (have_rows('analysis_barriers')): ?>
                <div class="analysis__items">
                    <?php while (have_rows('analysis_barriers')): the_row(); 
                        $icon = get_sub_field('icon');
                        $value = get_sub_field('value');
                        $desc1 = get_sub_field('desc1');
                        $desc2 = get_sub_field('desc2');
                    ?>
                    <div class="analysis__item blue">
                        <div class="analysis-item__head">
                            <div class="analysis-item__icon">
                                <img src="<?php echo $icon; ?>" loading="lazy" alt="icon">
                            </div>
                        </div>
                        <div class="analysis-item__title">
                            <h2><?php echo $value; ?></h2>
                        </div>
                        <div class="analysis-item__text">
                            <p><?php echo $desc1; ?></p>
                            <p><?php echo $desc2; ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php if (have_rows('analysis_metrics_table')): ?>
                <div class="analysis__table">
                    <div class="analysis-table__wrapper">
                        <div class="analysis-table__title">
                            <h3>Sumár kľúčových metrík</h3>
                        </div>
                        <div class="analysis-table__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Metrika</th>
                                        <th>Rok / Kohorta</th>
                                        <th>Hodnota</th>
                                        <th>Kontext</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while (have_rows('analysis_metrics_table')): the_row(); 
                                        $metric = get_sub_field('metric');
                                        $year = get_sub_field('year');
                                        $value = get_sub_field('value');
                                        $context = get_sub_field('context');
                                    ?>
                                    <tr>
                                        <td><?php echo $metric; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td>
                                            <h4><?php echo $value; ?></h4>
                                        </td>
                                        <td><?php echo $context; ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="analysis__button button">
                    <a href="<?php echo home_url('/'); ?>kontakt/"><?php the_field('analysis_button_text'); ?></a>
                </div>

                <div class="analysis__quote">
                    <?php the_field('analysis_conclusion'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Bannery -->
    <section class="banners">
        <div class="container">
            <div class="banners__body">
                <?php 
                $banner_first = get_field('banner_first');
                if ($banner_first): 
                ?>
                <div class="banner__body <?php echo $banner_first['type']; ?>">
                    <div class="banner__container" style="padding: 32px;">
                        <?php if ($banner_first['icon']): ?>
                        <div class="banner__icon">
                            <img src="<?php echo $banner_first['icon']; ?>" loading="lazy" alt="icon">
                        </div>
                        <?php endif; ?>
                        <div class="banner__title">
                            <h1><?php echo $banner_first['title']; ?></h1>
                        </div>
                        <div class="banner__text">
                            <p><?php echo $banner_first['text']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php 
                $banner_second = get_field('banner_second');
                if ($banner_second): 
                ?>
                <div class="banner__body <?php echo $banner_second['type']; ?>">
                    <div class="banner__container">
                        <?php if ($banner_second['icon']): ?>
                        <div class="banner__icon">
                            <img src="<?php echo $banner_second['icon']; ?>" loading="lazy" alt="icon">
                        </div>
                        <?php endif; ?>
                        <div class="banner__title">
                            <h1><?php echo $banner_second['title']; ?></h1>
                        </div>
                        <div class="banner__text">
                            <p><?php echo $banner_second['text']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php 
                $banner_third = get_field('banner_third');
                if ($banner_third): 
                ?>
                <div class="banner__body <?php echo $banner_third['type']; ?> span-two">
                    <div class="banner__container" style="max-width: 790px;">
                        <div class="banner__title">
                            <h1><?php echo $banner_third['title']; ?></h1>
                        </div>
                        <div class="banner__text">
                            <p><?php echo $banner_third['text']; ?></p>
                        </div>
                        <div class="banner__button button">
                            <a href="<?php echo home_url('/'); ?>kontakt/"><?php echo $banner_third['button_text']; ?></a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 21 chýb -->
    <section class="banners">
        <div class="container">
            <div class="banners__title">
                <h2><?php the_field('errors_title'); ?></h2>
            </div>
            <div class="banners__body">
                <?php if (have_rows('errors_legal')): ?>
                <div class="banner__body span-row-two white">
                    <div class="banner__container span-row-two left">
                        <div class="banner__title">
                            <h4>Právne a registračné chyby</h4>
                        </div>
                        <ul class="banner__list err">
                            <?php while (have_rows('errors_legal')): the_row(); 
                                $error = get_sub_field('error');
                            ?>
                            <li><?php echo $error; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

                <div class="banner__body grey">
                    <div class="banner__container left">
                        <div class="banner__text">
                            <?php the_field('errors_stats_text'); ?>
                        </div>
                    </div>
                </div>

                <?php if (have_rows('errors_tax')): ?>
                <div class="banner__body white">
                    <div class="banner__container left">
                        <div class="banner__title">
                            <h4>Daňové a finančné chyby</h4>
                        </div>
                        <ul class="banner__list err">
                            <?php while (have_rows('errors_tax')): the_row(); 
                                $error = get_sub_field('error');
                            ?>
                            <li><?php echo $error; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

                <div class="banner__body grey span-two">
                    <div class="banner__container">
                        <div class="banner__text">
                            <p><a href="" download><?php the_field('errors_download_text'); ?></a></p>
                            <p><?php the_field('errors_additional_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq">
        <div class="container">
            <div class="faq__title">
                <h1><?php the_field('faq_title'); ?></h1>
            </div>
            <?php if (have_rows('faq_items')): ?>
            <?php 
            $half = ceil(count(get_field('faq_items')) / 2);
            $items = get_field('faq_items');
            $first_half = array_slice($items, 0, $half);
            $second_half = array_slice($items, $half);
            ?>
            <div class="faq__body">
                <div class="faq__column">
                    <?php foreach ($first_half as $item): ?>
                    <div class="faq__item">
                        <div class="faq-item__title">
                            <h2><?php echo $item['question']; ?></h2>
                            <button></button>
                        </div>
                        <div class="faq-item__text">
                            <?php echo $item['answer']; ?>
                            <?php if ($item['has_button'] && $item['button_text']): ?>
                            <div class="faq-item__button">
                                <a href="">
                                    <span><?php echo $item['button_text']; ?></span>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="faq__column">
                    <?php foreach ($second_half as $item): ?>
                    <div class="faq__item">
                        <div class="faq-item__title">
                            <h2><?php echo $item['question']; ?></h2>
                            <button></button>
                        </div>
                        <div class="faq-item__text">
                            <?php echo $item['answer']; ?>
                            <?php if ($item['has_button'] && $item['button_text']): ?>
                            <div class="faq-item__button">
                                <a href="">
                                    <span><?php echo $item['button_text']; ?></span>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="faq__button">
                <button id="Zobraziť menej otázok"><?php the_field('faq_button_text'); ?></button>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Brif sekcia na hlavnej stránke -->
    <section class="briff">
        <div class="container">
            <div class="briff__body">
                <div class="briff__content">
                    <div class="briff-content__text">
                        <p><?php the_field('briff_left_top_text'); ?></p>
                    </div>
                    <div class="briff-content__title">
                        <h2><?php the_field('briff_left_title'); ?></h2>
                    </div>
                    <div class="briff-content__quote">
                        <blockquote><?php the_field('briff_left_quote'); ?></blockquote>
                    </div>
                </div>
                <div class="briff__form">
                    <form action="" method="post">
                        <div class="form-head span-two">
                            <div class="form-head__title">
                                <h2><?php the_field('briff_left_title'); ?></h2>
                            </div>
                            <div class="form-head__text">
                                <p>Získajte rýchly odborný pohľad na váš trh a konkurenciu. Ukážeme vám reálne príležitosti a ďalšie kroky.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Vaše meno:</label>
                            <input type="text" name="meno" id="meno" placeholder="Vaše meno" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>*E-mail:</label>
                            <input type="text" name="email" id="email" placeholder="E-mail:" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Telefón:</label>
                            <select name="krajina" id="krajina">
                                <option value="Slovakia (Slovensko)">Slovakia (Slovensko)</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Poland">Poland</option>
                                <option value="Hungary">Hungary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefon" id="telefon" placeholder="+421" autocomplete="off">
                        </div>

                        <div class="form-group span-two">
                            <h4>O čom je váš projekt?</h4>
                            <textarea name="projekt" id="projekt" placeholder="Stručne opíšte váš biznis alebo nápad" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group checkbox span-two">
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="gdpr" id="gdpr">
                                    <span></span>
                                    <p><span>*Súhlasím so spracovaním <a href="<?php echo home_url('/'); ?>zasady-ochrany-osobnych-udajov-gdpr/">osobných údajov</a></span></p>
                                </label>
                                <label>
                                    <input type="checkbox" name="newsletter" id="newsletter">
                                    <span></span>
                                    <p>Chcem dostávať užitočné tipy a novinky e-mailom</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-button button span-two">
                            <button type="submit"><?php the_field('briff_submit_text'); ?></button>
                        </div>

                        <div class="form-caption span-two">
                            <span><?php the_field('briff_caption'); ?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
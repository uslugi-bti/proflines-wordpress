<?php get_header(); ?>
<main class="ppc-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href>Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href>Balíky služieb</a>
                </li>
                <li class="breadcrump__item">
                    <a href>PPC</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Hero sekcia -->
    <section class="service-hero ppc">
        <div class="container">
            <div class="service-hero__body">
                <div class="service-hero__content">
                    <div class="service-hero__title">
                        <h1><?php echo esc_html(get_field('hero_title')); ?></h1>
                    </div>
                    <div class="service-hero__text">
                        <p><?php echo esc_html(get_field('hero_subtitle')); ?></p>
                    </div>
                    <div class="service-hero__button button">
                        <a href><?php echo esc_html(get_field('hero_button_text')); ?></a>
                    </div>
                </div>
                <div class="service-hero__img">
                    <?php if (get_field('obrazok')): ?>
                        <img src="<?php echo esc_url(get_field('obrazok')); ?>" alt="hero" loading="lazy">
                    <?php endif; ?>
                    <div class="service-hero-img__img">
                        <?php if (get_field('obrazok_s_vysledkom')): ?>
                            <img src="<?php echo esc_url(get_field('obrazok_s_vysledkom')); ?>" alt="hero" loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner zoznam (Prečo bez webu...) -->
    <section class="banners">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('banners_section_title')); ?></h1>
                </div>
            </div>
            <div class="banners__columns">
                <div class="banners__column">
                    <div class="banner__body white">
                        <div class="banner__container">
                            <ul class="banner__list success">
                                <?php if (have_rows('banners_list_items')): ?>
                                    <?php while (have_rows('banners_list_items')): the_row(); ?>
                                        <li><?php echo esc_html(get_sub_field('item_text')); ?></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="banners__column">
                    <div class="banner__body gradient" style="height: auto;">
                        <div class="banner__container left icon">
                            <div class="banner__title">
                                <h3>Riešenie</h3>
                            </div>
                            <div class="banner__text">
                                <?php echo wp_kses_post(get_field('banner_gradient_text')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="banner__body white" style="height: auto;">
                        <div class="banner__container">
                            <div class="banner__title">
                                <h1><?php echo esc_html(get_field('refund_title')); ?></h1>
                            </div>
                            <div class="banner__text">
                                <?php echo wp_kses_post(get_field('refund_text')); ?>
                            </div>
                            <div class="refund-terminal">
                                <div class="line"><span class="prompt blue">$</span> <span id="line-1"></span></div>
                                <div class="line"><span class="prompt">&gt;</span> <span id="line-2"></span></div>
                                <div class="line"><span class="prompt">&gt;</span> <span id="line-3"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Porovnávacia tabuľka -->
    <section class="table">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('table_title')); ?></h1>
                </div>
            </div>

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
                        <?php if (have_rows('table_items')): ?>
                            <?php while (have_rows('table_items')): the_row(); ?>
                                <tr>
                                    <td>
                                        <?php echo wp_kses_post(get_sub_field('service_name')); ?>
                                        <?php if (get_sub_field('has_info')): ?>
                                            <span class="info-icon" title="<?php echo esc_attr(wp_strip_all_tags(get_sub_field('info_text'))); ?>">i</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Starter stĺpec -->
                                    <td>
                                        <?php
                                        $starter = get_sub_field('starter');
                                        if ($starter['use_icon']) {
                                            if ($starter['type'] == 'true') {
                                                echo '<span class="table__icon table__icon--true"></span>';
                                            } elseif ($starter['type'] == 'false') {
                                                echo '<span class="table__icon table__icon--false"></span>';
                                            } elseif ($starter['type'] == 'partial') {
                                                echo '<span class="table__icon table__icon--partial"></span>';
                                            }
                                        } else {
                                            echo esc_html($starter['custom_text']);
                                        }
                                        ?>
                                    </td>

                                    <!-- Basic stĺpec -->
                                    <td>
                                        <?php
                                        $basic = get_sub_field('basic');
                                        if ($basic['use_icon']) {
                                            if ($basic['type'] == 'true') {
                                                echo '<span class="table__icon table__icon--true"></span>';
                                            } elseif ($basic['type'] == 'false') {
                                                echo '<span class="table__icon table__icon--false"></span>';
                                            } elseif ($basic['type'] == 'partial') {
                                                echo '<span class="table__icon table__icon--partial"></span>';
                                            }
                                        } else {
                                            echo esc_html($basic['custom_text']);
                                        }
                                        ?>
                                    </td>

                                    <!-- Advanced stĺpec -->
                                    <td>
                                        <?php
                                        $advanced = get_sub_field('advanced');
                                        if ($advanced['use_icon']) {
                                            if ($advanced['type'] == 'true') {
                                                echo '<span class="table__icon table__icon--true"></span>';
                                            } elseif ($advanced['type'] == 'false') {
                                                echo '<span class="table__icon table__icon--false"></span>';
                                            } elseif ($advanced['type'] == 'partial') {
                                                echo '<span class="table__icon table__icon--partial"></span>';
                                            }
                                        } else {
                                            echo esc_html($advanced['custom_text']);
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="table__button">
                <button id="Zobraziť menej"><?php echo esc_html(get_field('table_button_text')); ?></button>
            </div>
        </div>
    </section>

    <!-- Balíky služieb -->
    <section class="packages">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('packages_section_title')); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php echo esc_html(get_field('packages_section_subtitle')); ?></p>
                </div>
            </div>
            <div class="packages__body">
                <?php if (have_rows('packages_items')): ?>
                    <?php while (have_rows('packages_items')): the_row(); ?>
                        <div class="packages__item">
                            <div class="packages-item__sticker">
                                <span><?php echo esc_html(get_sub_field('package_sticker')); ?></span>
                            </div>
                            <div class="packages-item__plan">
                                <span><?php echo esc_html(get_sub_field('name')); ?></span>
                            </div>
                            <div class="packages-item__text line">
                                <?php echo wp_kses_post(get_sub_field('package_text')); ?>
                                <p><strong><?php echo esc_html(get_sub_field('price')); ?></strong></p>
                            </div>
                            <div class="packages-item__button button">
                                <a href><?php echo esc_html(get_sub_field('package_button_text')); ?></a>
                            </div>
                            <div class="packages-item__inscription">
                                <span><?php echo esc_html(get_sub_field('package_inscription')); ?></span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Žltý banner -->
    <section class="banner yellow">
        <div class="container">
            <div class="banner__body">
                <div class="banner__container" style="max-width: none; padding: 0 32px;">
                    <div class="banner__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/banners/06.svg" alt="banner" loading="lazy">
                    </div>
                    <div class="banner__title">
                        <h1><?php echo esc_html(get_field('yellow_banner_title')); ?></h1>
                    </div>
                    <div class="banner__text">
                        <p><?php echo esc_html(get_field('yellow_banner_text')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ako prebieha správa -->
    <section class="process">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('process_section_title')); ?></h1>
                </div>
            </div>
            <div class="columns__body">
                <?php if (have_rows('process_steps')): ?>
                    <?php $step_number = 1; ?>
                    <?php while (have_rows('process_steps')): the_row(); ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <span><?php echo str_pad($step_number, 2, '0', STR_PAD_LEFT); ?></span>
                                </div>
                                <div class="columns-item__title">
                                    <h2><?php echo esc_html(get_sub_field('step_title')); ?></h2>
                                </div>
                            </div>
                            <div class="columns-item__text">
                                <p><?php echo esc_html(get_sub_field('step_description')); ?></p>
                            </div>
                        </div>
                        <?php $step_number++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Druhý banner + spodný gradient -->
    <section class="banners ppc">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('second_banner_title')); ?></h1>
                </div>
            </div>
            <div class="banners__body">
                <div class="banners__img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/banners/07.svg" alt="banner" loading="lazy">
                </div>
                <div class="banner__body white">
                    <div class="banner__container">
                        <div class="banner__list success">
                            <?php echo wp_kses_post(get_field('second_banner_list')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__body gradient span-two">
                <div class="banner__container">
                    <div class="banner__content">
                        <div class="banner__title">
                            <h1><?php echo esc_html(get_field('bottom_gradient_title')); ?></h1>
                        </div>
                        <div class="banner__text">
                            <p><?php echo esc_html(get_field('bottom_gradient_text')); ?></p>
                        </div>
                    </div>
                    <div class="banner__button button">
                        <a href><?php echo esc_html(get_field('bottom_gradient_button_text')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html(get_field('faq_section_title')); ?></h1>
                </div>
            </div>
            <div class="faq__body">
                <?php
                $faq_items = get_field('faq_items');
                if ($faq_items) {
                    $half = ceil(count($faq_items) / 2);
                    $left_column = array_slice($faq_items, 0, $half);
                    $right_column = array_slice($faq_items, $half);
                ?>
                    <div class="faq__column">
                        <?php foreach ($left_column as $item): ?>
                            <div class="faq__item">
                                <div class="faq-item__title">
                                    <h2><?php echo esc_html($item['question']); ?></h2>
                                    <button></button>
                                </div>
                                <div class="faq-item__text">
                                    <?php echo wp_kses_post($item['answer']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="faq__column">
                        <?php foreach ($right_column as $item): ?>
                            <div class="faq__item">
                                <div class="faq-item__title">
                                    <h2><?php echo esc_html($item['question']); ?></h2>
                                    <button></button>
                                </div>
                                <div class="faq-item__text">
                                    <?php echo wp_kses_post($item['answer']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="faq__button">
                <button id="Zobraziť menej"><?php echo esc_html(get_field('faq_button_text')); ?></button>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
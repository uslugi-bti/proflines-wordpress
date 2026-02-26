<?php get_header(); ?>
<main class="google-page">
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
                    <a href>Balíky služieb</a>
                </li>
            </ul>
        </div>
    </div>

    <section class="service-hero">
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
                        <a href><?php the_field('hero_button_text'); ?></a>
                        <a href id="whatsapp">
                            <span><?php the_field('hero_secondary_button_text'); ?></span>
                        </a>
                    </div>
                    <div class="service-hero__caption">
                        <p><?php the_field('hero_caption'); ?></p>
                    </div>
                </div>
                <div class="service-hero__img">
                    <?php $hero_image = get_field('hero_image'); ?>
                    <?php if ($hero_image): ?>
                        <img src="<?php echo esc_url($hero_image); ?>" alt="hero" loading="lazy">
                    <?php endif; ?>
                    <div class="service-hero-img__img --1">
                        <?php $hero_decor_image = get_field('hero_decor_image'); ?>
                        <?php if ($hero_decor_image): ?>
                            <img src="<?php echo esc_url($hero_decor_image); ?>" alt="hero" loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="assessment banner gradient">
        <div class="container">
            <div class="banner__body">
                <div class="banner__container">
                    <div class="banner__title">
                        <h1><?php the_field('assessment_title'); ?></h1>
                    </div>
                    <div class="banner__text">
                        <p><?php the_field('assessment_text'); ?></p>
                    </div>
                    <div class="banner__button button">
                        <a href><?php the_field('assessment_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="value-proposition">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('value_proposition_title'); ?></h1>
                </div>
            </div>
            <div class="value-proposition__body">
                <?php if (have_rows('value_proposition_items')): ?>
                    <?php while (have_rows('value_proposition_items')): the_row(); 
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $icon = get_sub_field('icon');
                        $color_class = get_sub_field('color_class');
                    ?>
                        <div class="value-proposition__item <?php echo esc_attr($color_class); ?>">
                            <div class="value-proposition-item__icon">
                                <?php if ($icon): ?>
                                    <img src="<?php echo esc_url($icon); ?>" alt="icon" loading="lazy">
                                <?php endif; ?>
                            </div>
                            <div class="value-proposition-item__content">
                                <div class="value-proposition-item__title">
                                    <h3><?php echo $title; ?></h3>
                                </div>
                                <div class="value-proposition-item__text">
                                    <p><?php echo $text; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="banner white">
        <div class="container">
            <div class="banner__body">
                <div class="banner__container">
                    <div class="banner__icon">
                        <?php $guarantee_icon = get_field('guarantee_icon'); ?>
                        <?php if ($guarantee_icon): ?>
                            <img src="<?php echo esc_url($guarantee_icon); ?>" alt="guarantee" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="banner__title">
                        <h1><?php the_field('guarantee_title'); ?></h1>
                    </div>
                    <div class="banner__text">
                        <p style="color: #242A36; font-weight: 500;"><?php the_field('guarantee_text'); ?></p>
                    </div>
                    <div class="banner__text">
                        <p style="font-weight: 500;"><?php the_field('guarantee_note'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="segments">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('segments_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('segments_intro'); ?></p>
                </div>
            </div>
            <div class="columns__body">
                <?php if (have_rows('segments_list')): ?>
                    <?php while (have_rows('segments_list')): the_row(); 
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $icon = get_sub_field('icon');
                    ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <?php if ($icon): ?>
                                        <img src="<?php echo esc_url($icon); ?>" alt="icon" loading="lazy">
                                    <?php endif; ?>
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
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="audit">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('audit_title'); ?></h1>
                </div>
            </div>
            <div class="columns__body">
                <?php if (have_rows('audit_items')): ?>
                    <?php while (have_rows('audit_items')): the_row(); 
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $icon = get_sub_field('icon');
                    ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <?php if ($icon): ?>
                                        <img src="<?php echo esc_url($icon); ?>" alt="icon" loading="lazy">
                                    <?php endif; ?>
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
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="process">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('process_title'); ?></h1>
                </div>
            </div>
            <div class="columns__body">
                <?php if (have_rows('process_steps')): ?>
                    <?php while (have_rows('process_steps')): the_row(); 
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $step_number = get_sub_field('step_number');
                        $sticker = get_sub_field('sticker');
                    ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <span><?php echo $step_number; ?></span>
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
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="expertise-nums">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('expertise_title'); ?></h1>
                </div>
            </div>
            <div class="expertise-nums__body">
                <?php if (have_rows('expertise_stats')): ?>
                    <?php while (have_rows('expertise_stats')): the_row(); 
                        $number_raw = get_sub_field('number');
                        $description = get_sub_field('description');
                        $icon = get_sub_field('icon');
                        $badge = get_sub_field('badge');
                        $cover_image = get_sub_field('cover_image');

                        preg_match('/^([0-9]+)(.*)$/', $number_raw, $matches);
                        $number_value = $matches[1] ?? $number_raw;
                        $number_symbol = $matches[2] ?? '';
                    ?>
                        <div class="expertise-nums__item">
                            <div class="expertise-nums-item__icon">
                                <?php if ($icon): ?>
                                    <img src="<?php echo esc_url($icon); ?>" alt="expertise" loading="lazy">
                                <?php endif; ?>
                            </div>
                            <div class="expertise-nums-item__title">
                                <h2>
                                    <span id="<?php echo $number_value; ?>">0</span><?php echo $number_symbol; ?>
                                </h2>
                            </div>
                            <div class="expertise-nums-item__text">
                                <p><?php echo $description; ?></p>
                            </div>
                            <?php if ($badge): ?>
                                <div class="expertise-nums-item__badge">
                                    <span><?php echo $badge; ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($cover_image): ?>
                                <span class="cover">
                                    <img src="<?php echo esc_url($cover_image); ?>" alt="cover" loading="lazy">
                                </span>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

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
            <div class="packages__body">
                <?php if (have_rows('packages_items')): ?>
                    <?php while (have_rows('packages_items')): the_row(); 
                        $name = get_sub_field('name');
                        $caption = get_sub_field('caption');
                        $features = get_sub_field('features');
                        $price = get_sub_field('price');
                        $button_text = get_sub_field('button_text');
                        $button_caption = get_sub_field('caption'); // text pod tlacidlom
                        $sticker = get_sub_field('sticker');
                    ?>
                        <div class="packages__item">
                            <?php if ($sticker): ?>
                                <div class="packages-item__sticker">
                                    <span><?php echo $sticker; ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="packages-item__plan">
                                <span><?php echo $name; ?></span>
                            </div>
                            <?php if ($caption): ?>
                                <div class="packages-item__description">
                                    <p><?php echo $caption; ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="packages-item__text line">
                                <?php echo $features; ?>
                            </div>
                            <div class="packages-item__button button">
                                <a href><?php echo $button_text; ?></a>
                            </div>
                            <?php if ($button_caption): ?>
                                <div class="packages-item__inscription">
                                    <span><?php echo $button_caption; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="banners">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('banners_title'); ?></h1>
                </div>
            </div>
            <div class="banners__body">
                <div class="banner__body red">
                    <?php $banners_red_list = get_field('banners_red_list'); ?>
                    <?php if ($banners_red_list): ?>
                        <?php echo $banners_red_list; ?>
                    <?php endif; ?>
                </div>

                <?php $banners_white = get_field('banners_white'); ?>
                <?php if ($banners_white): ?>
                    <div class="banner__body white">
                        <div class="banner__container">
                            <?php if (!empty($banners_white['icon'])): ?>
                                <div class="banner__icon">
                                    <img src="<?php echo esc_url($banners_white['icon']); ?>" alt="guarantee" loading="lazy">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($banners_white['title'])): ?>
                                <div class="banner__title">
                                    <h1><?php echo $banners_white['title']; ?></h1>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($banners_white['text'])): ?>
                                <div class="banner__text">
                                    <p style="color: #242A36; font-weight: 500;"><?php echo $banners_white['text']; ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($banners_white['button'])): ?>
                                <div class="banner__button button">
                                    <a href=""><?php echo $banners_white['button']; ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $banners_gradient = get_field('banners_gradient'); ?>
                <?php if ($banners_gradient): ?>
                    <div class="banner__body gradient span-two">
                        <div class="banner__container" style="max-width: 790px;">
                            <?php if (!empty($banners_gradient['icon'])): ?>
                                <div class="banner__icon">
                                    <img src="<?php echo esc_url($banners_gradient['icon']); ?>" alt="guarantee" loading="lazy">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($banners_gradient['title'])): ?>
                                <div class="banner__title">
                                    <h1><?php echo $banners_gradient['title']; ?></h1>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($banners_gradient['text'])): ?>
                                <div class="banner__text">
                                    <?php echo $banners_gradient['text']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="table">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('table_title'); ?></h1>
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
                            <th style="width:20%">Starter (Audit & diagnostika)</th>
                            <th style="width:20%">Basic (Odblokovanie na kľúč)</th>
                            <th style="width:20%">Advanced (Ochrana & High-Risk)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (have_rows('table_items')): ?>
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
                                            <span class="info-icon" title="<?php echo esc_attr($info_text); ?>">i</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($starter['umiestnit_ikonu']): ?>
                                            <?php if ($starter['type'] == 'true'): ?>
                                                <span class="table__icon table__icon--true"></span>
                                            <?php elseif ($starter['type'] == 'false'): ?>
                                                <span class="table__icon table__icon--false"></span>
                                            <?php elseif ($starter['type'] == 'partial'): ?>
                                                <span class="table__icon table__icon--partial"></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo $starter['custom_text']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($basic['umiestnit_ikonu_basic']): ?>
                                            <?php if ($basic['type'] == 'true'): ?>
                                                <span class="table__icon table__icon--true"></span>
                                            <?php elseif ($basic['type'] == 'false'): ?>
                                                <span class="table__icon table__icon--false"></span>
                                            <?php elseif ($basic['type'] == 'partial'): ?>
                                                <span class="table__icon table__icon--partial"></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo $basic['custom_text']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($advanced['umiestnit_ikonu_advanced']): ?>
                                            <?php if ($advanced['type'] == 'true'): ?>
                                                <span class="table__icon table__icon--true"></span>
                                            <?php elseif ($advanced['type'] == 'false'): ?>
                                                <span class="table__icon table__icon--false"></span>
                                            <?php elseif ($advanced['type'] == 'partial'): ?>
                                                <span class="table__icon table__icon--partial"></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo $advanced['custom_text']; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="table__button">
                <button id="Zobraziť menej"><?php the_field('table_button_more'); ?></button>
            </div>
        </div>
    </section>

    <section class="important-notes">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('important_notes_title'); ?></h1>
                </div>
            </div>
            <div class="important-notes__body">
                <div class="important-notes__item">
                    <div class="important-notes-item__title">
                        <h3><?php the_field('important_notes_title_h3'); ?></h3>
                    </div>
                    <div class="important-notes-item__text">
                        <?php the_field('important_notes'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('faq_title'); ?></h1>
                </div>
            </div>
            <div class="faq__body">
                <?php if (have_rows('faq_items')): ?>
                    <?php while (have_rows('faq_items')): the_row(); 
                        $question = get_sub_field('question');
                        $answer = get_sub_field('answer');
                    ?>
                        <div class="faq__item">
                            <div class="faq-item__title">
                                <h2><?php echo $question; ?></h2>
                                <button></button>
                            </div>
                            <div class="faq-item__text">
                                <?php echo $answer; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="faq__button">
                <button id="Zobraziť menej"><?php the_field('faq_button_text'); ?></button>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
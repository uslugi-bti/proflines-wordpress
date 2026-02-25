<?php get_header(); ?>

<?php
// Načítanie ACF hodnôt pre aktuálnu stránku
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_button_text = get_field('hero_button_text');
$hero_image = get_field('hero_image');
$hero_image_item = get_field('hero_image_item');

$gradient_badge = get_field('gradient_badge');
$gradient_title = get_field('gradient_title');
$gradient_text = get_field('gradient_text');
$gradient_list = get_field('gradient_list');
$gradient_column_title = get_field('gradient_column_title');
$gradient_column_text = get_field('gradient_column_text');

$how_help_title = get_field('how_help_title');
$how_help_image = get_field('how_help_image');
$how_help_list = get_field('how_help_list');

$agencies_title = get_field('agencies_title');
$agencies_subtitle = get_field('agencies_subtitle');
$agencies_items = get_field('agencies_items');

$table_title = get_field('table_title');
$table_items = get_field('table_items');

$packages = get_field('packages');

$guarantee_title = get_field('guarantee_title');
$guarantee_text = get_field('guarantee_text');
$guarantee_button_text = get_field('guarantee_button_text');

$process_title = get_field('process_title');
$process_steps = get_field('process_steps');

$why_without_title = get_field('why_without_title');
$why_without_red_text = get_field('why_without_red_text');
$why_without_questions = get_field('why_without_questions');
$why_without_solution_title = get_field('why_without_solution_title');
$why_without_solution_text = get_field('why_without_solution_text');
$why_without_guarantee_title = get_field('why_without_guarantee_title');
$why_without_guarantee_text = get_field('why_without_guarantee_text');
$terminal_line_1 = get_field('terminal_line_1');
$terminal_line_2 = get_field('terminal_line_2');
$terminal_line_3 = get_field('terminal_line_3');

$cta_title = get_field('cta_title');
$cta_text = get_field('cta_text');
$cta_button_text = get_field('cta_button_text');

$faq_title = get_field('faq_title');
$faq_items = get_field('faq_items');
$faq_button_text = get_field('faq_button_text');
?>

<main class="web-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url(); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="#">Balíky služieb</a>
                </li>
                <li class="breadcrump__item">
                    <a href="#">Balíky služieb</a>
                </li>
            </ul>
        </div>
    </div>

    <?php if ($hero_title || $hero_subtitle || $hero_button_text || $hero_image) : ?>
    <section class="service-hero ppc">
        <div class="container">
            <div class="service-hero__body">
                <div class="service-hero__content">
                    <?php if ($hero_title) : ?>
                    <div class="service-hero__title">
                        <h1><?php echo esc_html($hero_title); ?></h1>
                    </div>
                    <?php endif; ?>

                    <?php if ($hero_subtitle) : ?>
                    <div class="service-hero__text">
                        <p><?php echo esc_html($hero_subtitle); ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if ($hero_button_text) : ?>
                    <div class="service-hero__button button">
                        <a href="#"><?php echo esc_html($hero_button_text); ?></a>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ($hero_image) : ?>
                <div class="service-hero__img">
                    <img src="<?php echo esc_url($hero_image); ?>" alt="hero" loading="lazy">
                    <?php if ($hero_image_item) : ?>
                    <div class="service-hero-img__img">
                        <img src="<?php echo esc_url($hero_image_item); ?>" alt="hero" loading="lazy">
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($gradient_badge || $gradient_title || $gradient_text || $gradient_list || $gradient_column_title || $gradient_column_text) : ?>
    <section class="gradient-block">
        <div class="container">
            <div class="gradient-block__body">
                <div class="gradient-block__container grid">
                    <div class="gradient-block__column">
                        <?php if ($gradient_badge) : ?>
                        <div class="gradient-block__badge red">
                            <p><?php echo esc_html($gradient_badge); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if ($gradient_title) : ?>
                        <div class="gradient-block__title">
                            <h2><?php echo esc_html($gradient_title); ?></h2>
                        </div>
                        <?php endif; ?>

                        <?php if ($gradient_text) : ?>
                        <div class="gradient-block__text">
                            <?php echo wp_kses_post($gradient_text); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($gradient_list) : 
                            $list_items = explode(',', $gradient_list);
                        ?>
                            <ul class="gradient-block__list">
                                <?php foreach ($list_items as $item) : ?>
                                    <li><?php echo esc_html(trim($item)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <?php if ($gradient_column_title || $gradient_column_text) : ?>
                    <div class="columns__body">
                        <div class="columns__item span-three">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/difference/icons/05.svg" alt="icon" loading="lazy">
                                </div>
                                <?php if ($gradient_column_title) : ?>
                                <div class="columns-item__title">
                                    <h2><?php echo esc_html($gradient_column_title); ?></h2>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php if ($gradient_column_text) : ?>
                            <div class="columns-item__text">
                                <p><?php echo esc_html($gradient_column_text); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($how_help_title || $how_help_image || $how_help_list) : ?>
    <section class="banners ppc">
        <div class="container">
            <?php if ($how_help_title) : ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($how_help_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($how_help_image || $how_help_list) : ?>
            <div class="banners__body">
                <?php 
                // Najprv skúsime video z agencies_items, ak existuje
                $video_url = '';
                $fallback_image = $how_help_image;
                
                if ($agencies_items && !empty($agencies_items[0]['item_video'])) {
                    $video_url = $agencies_items[0]['item_video'];
                }
                ?>
                
                <div class="banners__img">
                    <?php if ($video_url) : ?>
                        <video controls loading="lazy" width="100%" height="auto">
                            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                            Váš prehliadač nepodporuje video tag.
                        </video>
                    <?php elseif ($fallback_image) : ?>
                        <img src="<?php echo esc_url($fallback_image); ?>" alt="banner" loading="lazy">
                    <?php endif; ?>
                </div>

                <?php if ($how_help_list) : ?>
                <div class="banner__body white">
                    <div class="banner__container">
                        <ul class="banner__list success">
                            <?php foreach ($how_help_list as $item) : ?>
                                <li><?php echo esc_html($item['item_text']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($agencies_title || $agencies_subtitle || $agencies_items) : ?>
    <section class="forward-agencies">
        <div class="container">
            <?php if ($agencies_title || $agencies_subtitle) : ?>
            <div class="block__head">
                <?php if ($agencies_title) : ?>
                <div class="block-head__title">
                    <h1><?php echo esc_html($agencies_title); ?></h1>
                </div>
                <?php endif; ?>

                <?php if ($agencies_subtitle) : ?>
                <div class="block-head__text">
                    <p><?php echo esc_html($agencies_subtitle); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($agencies_items) : ?>
            <div class="forward-agencies__body">
                <?php foreach ($agencies_items as $item) : ?>
                    <div class="forward-agencies__item">
                        <?php if ($item['item_title'] || $item['item_text']) : ?>
                        <div class="forward-agencies-item__content">
                            <?php if ($item['item_title']) : ?>
                            <div class="forward-agencies-item__title">
                                <h3><?php echo esc_html($item['item_title']); ?></h3>
                            </div>
                            <?php endif; ?>

                            <?php if ($item['item_text']) : ?>
                            <div class="forward-agencies-item__text">
                                <p><?php echo esc_html($item['item_text']); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($item['item_video'])) : ?>
                        <div class="forward-agencies-item__media">
                            <video controls loading="lazy" width="100%" height="auto">
                                <source src="<?php echo esc_url($item['item_video']); ?>" type="video/mp4">
                                Váš prehliadač nepodporuje video tag.
                            </video>
                        </div>
                        <?php elseif (!empty($item['item_image'])) : ?>
                        <div class="forward-agencies-item__media">
                            <img src="<?php echo esc_url($item['item_image']); ?>" alt="forward-agencies" loading="lazy">
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($table_title || $table_items) : ?>
    <section class="table">
        <div class="container">
            <?php if ($table_title) : ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($table_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($table_items) : ?>
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
                        <?php foreach ($table_items as $item) : 
                            $service_name = $item['service_name'] ?? '';
                            $has_info = $item['has_info'] ?? false;
                            $info_text = $item['info_text'] ?? '';
                            
                            // Spracovanie Starter
                            $starter = $item['starter'] ?? [];
                            $starter_custom_text = $starter['custom_text'] ?? '';
                            $starter_use_icon = $starter['umiestnit_ikonu_anonieciastocne_namiesto_textu'] ?? false;
                            $starter_type = $starter['type'] ?? '';
                            
                            // Spracovanie Basic
                            $basic = $item['basic'] ?? [];
                            $basic_custom_text = $basic['custom_text'] ?? '';
                            $basic_use_icon = $basic['umiestnit_ikonu_anonieciastocne_namiesto_textu_basic'] ?? false;
                            $basic_type = $basic['type'] ?? '';
                            
                            // Spracovanie Advanced
                            $advanced = $item['advanced'] ?? [];
                            $advanced_custom_text = $advanced['custom_text'] ?? '';
                            $advanced_use_icon = $advanced['umiestnit_ikonu_anonieciastocne_namiesto_textu_advanced'] ?? false;
                            $advanced_type = $advanced['type'] ?? '';
                        ?>
                            <tr>
                                <td>
                                    <?php echo wp_kses_post($service_name); ?>
                                    <?php if ($has_info && $info_text) : ?>
                                        <span id="info"></span>
                                        <div class="table-info">
                                            <div class="table-info__body">
                                                <div class="table-info__container">
                                                    <?php echo wp_kses_post($info_text); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($starter_custom_text) {
                                        echo esc_html($starter_custom_text);
                                    } elseif ($starter_use_icon) {
                                        if ($starter_type == 'true') {
                                            echo '<span class="table__icon table__icon--true"></span>';
                                        } elseif ($starter_type == 'partial') {
                                            echo '<span class="table__icon table__icon--true-false"></span>';
                                        } elseif ($starter_type == 'false') {
                                            echo '<span class="table__icon table__icon--false"></span>';
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($basic_custom_text) {
                                        echo esc_html($basic_custom_text);
                                    } elseif ($basic_use_icon) {
                                        if ($basic_type == 'true') {
                                            echo '<span class="table__icon table__icon--true"></span>';
                                        } elseif ($basic_type == 'partial') {
                                            echo '<span class="table__icon table__icon--true-false"></span>';
                                        } elseif ($basic_type == 'false') {
                                            echo '<span class="table__icon table__icon--false"></span>';
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($advanced_custom_text) {
                                        echo esc_html($advanced_custom_text);
                                    } elseif ($advanced_use_icon) {
                                        if ($advanced_type == 'true') {
                                            echo '<span class="table__icon table__icon--true"></span>';
                                        } elseif ($advanced_type == 'partial') {
                                            echo '<span class="table__icon table__icon--true-false"></span>';
                                        } elseif ($advanced_type == 'false') {
                                            echo '<span class="table__icon table__icon--false"></span>';
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

            <?php if ($packages) : ?>
            <div class="packages__body">
                <?php foreach ($packages as $package) : ?>
                    <div class="packages__item <?php echo ($package['package_dark_mode']) ? 'dark' : ''; ?>">
                        <?php if ($package['package_sticker']) : ?>
                            <div class="packages-item__sticker">
                                <span><?php echo esc_html($package['package_sticker']); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($package['package_name']) : ?>
                        <div class="packages-item__plan">
                            <span><?php echo esc_html($package['package_name']); ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if ($package['package_description']) : ?>
                        <div class="packages-item__description">
                            <p><?php echo esc_html($package['package_description']); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if ($package['package_price']) : ?>
                        <div class="packages-item__price">
                            <div class="packages-item-price__number">
                                <span>€</span>
                                <p><?php echo esc_html($package['package_price']); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($package['package_text']) : ?>
                        <div class="packages-item__text">
                            <?php echo wp_kses_post($package['package_text']); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($package['package_button_text']) : ?>
                        <div class="packages-item__button button">
                            <a href="#"><?php echo esc_html($package['package_button_text']); ?></a>
                        </div>
                        <?php endif; ?>

                        <?php if ($package['package_inscription']) : ?>
                        <div class="packages-item__inscription">
                            <span><?php echo esc_html($package['package_inscription']); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($guarantee_title || $guarantee_text || $guarantee_button_text) : ?>
    <section class="banners">
        <div class="container">
            <div class="banners__body">
                <div class="banner__body white span-two">
                    <div class="banner__container" style="padding: 0 32px;">
                        <div class="banner__icon">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/banners/08.svg" alt="icons" loading="lazy">
                        </div>
                        
                        <?php if ($guarantee_title) : ?>
                        <div class="banner__title">
                            <h1><?php echo esc_html($guarantee_title); ?></h1>
                        </div>
                        <?php endif; ?>

                        <?php if ($guarantee_text) : ?>
                        <div class="banner__text">
                            <?php echo wp_kses_post($guarantee_text); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($guarantee_button_text) : ?>
                        <div class="banner__button button">
                            <a href="#"><?php echo esc_html($guarantee_button_text); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($process_title || $process_steps) : ?>
    <section class="process">
        <div class="container">
            <?php if ($process_title) : ?>
            <div class="process__title">
                <h1><?php echo esc_html($process_title); ?></h1>
            </div>
            <?php endif; ?>

            <?php if ($process_steps) : ?>
            <div class="columns__body">
                <?php foreach ($process_steps as $step) : ?>
                    <div class="columns__item">
                        <?php if ($step['step_number'] || $step['step_title']) : ?>
                        <div class="columns-item__head">
                            <?php if ($step['step_number']) : ?>
                            <div class="columns-item__icon">
                                <span><?php echo esc_html($step['step_number']); ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if ($step['step_title']) : ?>
                            <div class="columns-item__title">
                                <h2><?php echo esc_html($step['step_title']); ?></h2>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($step['step_text']) : ?>
                        <div class="columns-item__text">
                            <p><?php echo esc_html($step['step_text']); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if ($step['step_sticker']) : ?>
                            <div class="columns-item__sticker">
                                <span><?php echo esc_html($step['step_sticker']); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($why_without_title || $why_without_red_text || $why_without_questions || $why_without_solution_title || $why_without_solution_text || $why_without_guarantee_title || $why_without_guarantee_text || $terminal_line_1 || $terminal_line_2 || $terminal_line_3) : ?>
    <section class="banners">
        <div class="container">
            <?php if ($why_without_title) : ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($why_without_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($why_without_red_text || $why_without_questions || $why_without_solution_title || $why_without_solution_text || $why_without_guarantee_title || $why_without_guarantee_text || $terminal_line_1 || $terminal_line_2 || $terminal_line_3) : ?>
            <div class="banners__columns">
                <?php if ($why_without_red_text || $why_without_questions) : ?>
                <div class="banners__column">
                    <div class="banner__body red">
                        <div class="banner__container">
                            <?php if ($why_without_red_text) : ?>
                            <div class="banner__text">
                                <?php echo wp_kses_post($why_without_red_text); ?>
                            </div>
                            <?php endif; ?>

                            <?php if ($why_without_questions) : ?>
                            <ul class="banner__list">
                                <?php foreach ($why_without_questions as $question) : ?>
                                    <li><?php echo esc_html($question['question_text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($why_without_solution_title || $why_without_solution_text || $why_without_guarantee_title || $why_without_guarantee_text || $terminal_line_1 || $terminal_line_2 || $terminal_line_3) : ?>
                <div class="banners__column">
                    <?php if ($why_without_solution_title || $why_without_solution_text) : ?>
                    <div class="banner__body blue">
                        <div class="banner__container left icon">
                            <?php if ($why_without_solution_title) : ?>
                            <div class="banner__title">
                                <h3><?php echo esc_html($why_without_solution_title); ?></h3>
                            </div>
                            <?php endif; ?>

                            <?php if ($why_without_solution_text) : ?>
                            <div class="banner__text">
                                <?php echo wp_kses_post($why_without_solution_text); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($why_without_guarantee_title || $why_without_guarantee_text || $terminal_line_1 || $terminal_line_2 || $terminal_line_3) : ?>
                    <div class="banner__body white">
                        <div class="banner__container">
                            <?php if ($why_without_guarantee_title) : ?>
                            <div class="banner__title">
                                <h1><?php echo esc_html($why_without_guarantee_title); ?></h1>
                            </div>
                            <?php endif; ?>

                            <?php if ($why_without_guarantee_text) : ?>
                            <div class="banner__text">
                                <?php echo wp_kses_post($why_without_guarantee_text); ?>
                            </div>
                            <?php endif; ?>

                            <?php if ($terminal_line_1 || $terminal_line_2 || $terminal_line_3) : ?>
                            <div class="refund-terminal">
                                <?php if ($terminal_line_1) : ?>
                                <div class="line"><span class="prompt blue">$</span> <span id="line-1"><?php echo esc_html($terminal_line_1); ?></span></div>
                                <?php endif; ?>
                                <?php if ($terminal_line_2) : ?>
                                <div class="line"><span class="prompt">&gt;</span> <span id="line-2"><?php echo esc_html($terminal_line_2); ?></span></div>
                                <?php endif; ?>
                                <?php if ($terminal_line_3) : ?>
                                <div class="line"><span class="prompt">&gt;</span> <span id="line-3"><?php echo esc_html($terminal_line_3); ?></span></div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($cta_title || $cta_text || $cta_button_text) : ?>
    <section class="banners ppc">
        <div class="container">
            <div class="banner__body gradient span-two">
                <div class="banner__container">
                    <?php if ($cta_title || $cta_text) : ?>
                    <div class="banner__content">
                        <?php if ($cta_title) : ?>
                        <div class="banner__title">
                            <h1><?php echo esc_html($cta_title); ?></h1>
                        </div>
                        <?php endif; ?>

                        <?php if ($cta_text) : ?>
                        <div class="banner__text">
                            <p><?php echo esc_html($cta_text); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($cta_button_text) : ?>
                    <div class="banner__button button">
                        <a href="#"><?php echo esc_html($cta_button_text); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($faq_title || $faq_items || $faq_button_text) : ?>
    <section class="faq">
        <div class="container">
            <?php if ($faq_title) : ?>
            <div class="faq__title">
                <h1><?php echo esc_html($faq_title); ?></h1>
            </div>
            <?php endif; ?>

            <?php if ($faq_items) : ?>
            <div class="faq__body">
                <?php 
                $half = ceil(count($faq_items) / 2);
                $first_column = array_slice($faq_items, 0, $half);
                $second_column = array_slice($faq_items, $half);
                ?>
                
                <?php if ($first_column) : ?>
                <div class="faq__column">
                    <?php foreach ($first_column as $item) : ?>
                        <div class="faq__item">
                            <?php if ($item['question']) : ?>
                            <div class="faq-item__title">
                                <h2><?php echo esc_html($item['question']); ?></h2>
                                <button></button>
                            </div>
                            <?php endif; ?>

                            <?php if ($item['answer']) : ?>
                            <div class="faq-item__text">
                                <?php echo wp_kses_post($item['answer']); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if ($second_column) : ?>
                <div class="faq__column">
                    <?php foreach ($second_column as $item) : ?>
                        <div class="faq__item">
                            <?php if ($item['question']) : ?>
                            <div class="faq-item__title">
                                <h2><?php echo esc_html($item['question']); ?></h2>
                                <button></button>
                            </div>
                            <?php endif; ?>

                            <?php if ($item['answer']) : ?>
                            <div class="faq-item__text">
                                <?php echo wp_kses_post($item['answer']); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($faq_button_text) : ?>
            <div class="faq__button">
                <button id="Zobraziť menej otázok"><?php echo esc_html($faq_button_text); ?></button>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
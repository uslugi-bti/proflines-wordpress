<?php get_header(); ?>

<?php
// Получаем значения полей
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_button_text = get_field('hero_button_text');
$hero_image = get_field('hero_image');
$hero_overlay_icon = get_field('hero_overlay_icon');

$block_title = get_field('block_title');
$block_image = get_field('block_image');
$block_list = get_field('block_list');

$table_title = get_field('table_title');
$table_items = get_field('table_items');

$packages_items = get_field('packages_items');

$guarantee_icon = get_field('guarantee_icon');
$guarantee_title = get_field('guarantee_title');
$guarantee_text = get_field('guarantee_text');
$guarantee_button_text = get_field('guarantee_button_text');

$process_title = get_field('process_title');
$process_steps = get_field('process_steps');

$other_problems_title = get_field('other_problems_title');
$other_problems_image = get_field('other_problems_image');
$other_problems_text = get_field('other_problems_text');

$ppc_banner_title = get_field('ppc_banner_title');
$ppc_banner_subtitle = get_field('ppc_banner_subtitle');
$ppc_banner_button_text = get_field('ppc_banner_button_text');

$faq_title = get_field('faq_title');
$faq_items = get_field('faq_items');
$faq_button_text = get_field('faq_button_text');
?>

<main class="seo-page">
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
                    <a href>SEO</a>
                </li>
            </ul>
        </div>
    </div>

    <?php if ($hero_title || $hero_subtitle || $hero_button_text || $hero_image || $hero_overlay_icon): ?>
    <section class="service-hero ppc">
        <div class="container">
            <div class="service-hero__body">
                <div class="service-hero__content">
                    <?php if ($hero_title): ?>
                    <div class="service-hero__title">
                        <h1><?php echo esc_html($hero_title); ?></h1>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($hero_subtitle): ?>
                    <div class="service-hero__text">
                        <p><?php echo esc_html($hero_subtitle); ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($hero_button_text): ?>
                    <div class="service-hero__button button">
                        <a href><?php echo esc_html($hero_button_text); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php if ($hero_image || $hero_overlay_icon): ?>
                <div class="service-hero__img">
                    <?php if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="hero" loading="lazy">
                    <?php endif; ?>
                    
                    <?php if ($hero_overlay_icon): ?>
                    <div class="service-hero-img__img">
                        <img src="<?php echo esc_url($hero_overlay_icon); ?>" alt="hero" loading="lazy">
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($block_title || $block_image || $block_list): ?>
    <section class="banners">
        <div class="container">
            <?php if ($block_title): ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($block_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="banners__columns">
                <?php if ($block_image): ?>
                <div class="banners__column">
                    <div class="banners__img">
                        <img src="<?php echo esc_url($block_image); ?>" alt="seo" loading="lazy">
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($block_list): ?>
                <div class="banners__column">
                    <div class="banner__body white">
                        <div class="banner__container">
                            <?php echo $block_list; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($table_title || $table_items): ?>
    <section class="table">
        <div class="container">
            <?php if ($table_title): ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($table_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($table_items): ?>
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
                            <th style="width:40%">Služby / Možnosti</th>
                            <th style="width:20%">Starter</th>
                            <th style="width:20%">Basic</th>
                            <th style="width:20%">Advanced</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($table_items as $item): ?>
                        <tr>
                            <td>
                                <?php echo $item['service_name']; ?>
                                <?php if ($item['has_info'] && $item['info_text']): ?>
                                    <span class="info-icon" data-info="<?php echo esc_attr($item['info_text']); ?>">i</span>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <?php if ($item['starter']['umiestnit_ikonu']): ?>
                                    <?php if ($item['starter']['type'] == 'true'): ?>
                                        <span class="table__icon table__icon--true"></span>
                                    <?php elseif ($item['starter']['type'] == 'false'): ?>
                                        <span class="table__icon table__icon--false"></span>
                                    <?php elseif ($item['starter']['type'] == 'partial'): ?>
                                        <span class="table__icon table__icon--partial"></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo $item['starter']['custom_text']; ?>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <?php if ($item['basic']['umiestnit_ikonu_basic']): ?>
                                    <?php if ($item['basic']['type'] == 'true'): ?>
                                        <span class="table__icon table__icon--true"></span>
                                    <?php elseif ($item['basic']['type'] == 'false'): ?>
                                        <span class="table__icon table__icon--false"></span>
                                    <?php elseif ($item['basic']['type'] == 'partial'): ?>
                                        <span class="table__icon table__icon--partial"></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo $item['basic']['custom_text']; ?>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <?php if ($item['advanced']['umiestnit_ikonu_advanced']): ?>
                                    <?php if ($item['advanced']['type'] == 'true'): ?>
                                        <span class="table__icon table__icon--true"></span>
                                    <?php elseif ($item['advanced']['type'] == 'false'): ?>
                                        <span class="table__icon table__icon--false"></span>
                                    <?php elseif ($item['advanced']['type'] == 'partial'): ?>
                                        <span class="table__icon table__icon--partial"></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo $item['advanced']['custom_text']; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="table__button">
                <button id="Zobraziť menej">Zobraziť viac</button>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($packages_items): ?>
    <section class="packages">
        <div class="container">
            <div class="packages__body">
                <?php foreach ($packages_items as $package): ?>
                <div class="packages__item">
                    <?php if ($package['name']): ?>
                    <div class="packages-item__plan">
                        <span><?php echo esc_html($package['name']); ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($package['description']): ?>
                    <div class="packages-item__description">
                        <p><?php echo esc_html($package['description']); ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($package['package_text']): ?>
                    <div class="packages-item__text line left">
                        <?php echo $package['package_text']; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($package['package_button_text']): ?>
                    <div class="packages-item__button button">
                        <a href><?php echo esc_html($package['package_button_text']); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($guarantee_icon || $guarantee_title || $guarantee_text || $guarantee_button_text): ?>
    <section class="banner white">
        <div class="container">
            <div class="banner__body">
                <div class="banner__container" style="max-width: none; padding: 0 32px;">
                    <?php if ($guarantee_icon): ?>
                    <div class="banner__icon">
                        <img src="<?php echo esc_url($guarantee_icon); ?>" alt="banner" loading="lazy">
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($guarantee_title): ?>
                    <div class="banner__title">
                        <h1><?php echo esc_html($guarantee_title); ?></h1>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($guarantee_text): ?>
                    <div class="banner__text">
                        <p><?php echo esc_html($guarantee_text); ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($guarantee_button_text): ?>
                    <div class="banner__button button">
                        <a href><?php echo esc_html($guarantee_button_text); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($process_title || $process_steps): ?>
    <section class="process">
        <div class="container">
            <?php if ($process_title): ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($process_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($process_steps): ?>
            <div class="columns__body">
                <?php foreach ($process_steps as $index => $step): ?>
                <div class="columns__item">
                    <div class="columns-item__head">
                        <div class="columns-item__icon">
                            <span><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                        </div>
                        <?php if ($step['title']): ?>
                        <div class="columns-item__title">
                            <h2><?php echo esc_html($step['title']); ?></h2>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($step['text']): ?>
                    <div class="columns-item__text">
                        <p><?php echo esc_html($step['text']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($other_problems_title || $other_problems_image || $other_problems_text): ?>
    <section class="banners audit">
        <div class="container">
            <?php if ($other_problems_title): ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($other_problems_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="banners__columns">
                <?php if ($other_problems_image): ?>
                <div class="banners__column">
                    <div class="banners__img">
                        <img src="<?php echo esc_url($other_problems_image); ?>" alt="seo" loading="lazy">
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($other_problems_text): ?>
                <div class="banners__column">
                    <div class="banner__body white" style="height: auto;">
                        <div class="banner__container">
                            <div class="banner__text">
                                <?php echo $other_problems_text; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($ppc_banner_title || $ppc_banner_subtitle || $ppc_banner_button_text): ?>
    <section class="banners ppc">
        <div class="container">
            <div class="banner__body gradient span-two">
                <div class="banner__container">
                    <div class="banner__content">
                        <?php if ($ppc_banner_title): ?>
                        <div class="banner__title">
                            <h1><?php echo esc_html($ppc_banner_title); ?></h1>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($ppc_banner_subtitle): ?>
                        <div class="banner__text">
                            <p><?php echo esc_html($ppc_banner_subtitle); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($ppc_banner_button_text): ?>
                    <div class="banner__button button">
                        <a href><?php echo esc_html($ppc_banner_button_text); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($faq_title || $faq_items): ?>
    <section class="faq">
        <div class="container">
            <?php if ($faq_title): ?>
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php echo esc_html($faq_title); ?></h1>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($faq_items): ?>
            <div class="faq__body">
                <?php 
                $half = ceil(count($faq_items) / 2);
                $first_column = array_slice($faq_items, 0, $half);
                $second_column = array_slice($faq_items, $half);
                ?>
                
                <div class="faq__column">
                    <?php foreach ($first_column as $item): ?>
                    <div class="faq__item">
                        <div class="faq-item__title">
                            <h2><?php echo esc_html($item['question']); ?></h2>
                            <button></button>
                        </div>
                        <div class="faq-item__text">
                            <?php echo $item['answer']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="faq__column">
                    <?php foreach ($second_column as $item): ?>
                    <div class="faq__item">
                        <div class="faq-item__title">
                            <h2><?php echo esc_html($item['question']); ?></h2>
                            <button></button>
                        </div>
                        <div class="faq-item__text">
                            <?php echo $item['answer']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <?php if ($faq_button_text): ?>
            <div class="faq__button">
                <button id="Zobraziť menej"><?php echo esc_html($faq_button_text); ?></button>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
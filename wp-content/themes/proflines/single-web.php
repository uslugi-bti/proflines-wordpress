<?php get_header(); ?>
<main class="web-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="/">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="/sluzby">Balíky služieb</a>
                </li>
                <li class="breadcrump__item">
                    <a href="/sluzby/tvorba-webu">Tvorba webu</a>
                </li>
            </ul>
        </div>
    </div>
    
    <section class="service-hero ppc">
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
                        <a href="#contact"><?php the_field('hero_button_text'); ?></a>
                    </div>
                </div>
                <div class="service-hero__img">
                    <?php if(get_field('hero_image')): ?>
                        <img src="<?php the_field('hero_image'); ?>" alt="hero" loading="lazy">
                    <?php endif; ?>
                    <?php if(get_field('hero_image_item')): ?>
                        <div class="service-hero-img__img">
                            <img src="<?php the_field('hero_image_item'); ?>" alt="hero" loading="lazy">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="gradient-block">
        <div class="container">
            <div class="gradient-block__body">
                <div class="gradient-block__container grid">
                    <div class="gradient-block__column">
                        <div class="gradient-block__badge red">
                            <p><?php the_field('gradient_badge'); ?></p>
                        </div>
                        <div class="gradient-block__title">
                            <h2><?php the_field('gradient_title'); ?></h2>
                        </div>
                        <div class="gradient-block__text">
                            <?php the_field('gradient_text'); ?>
                        </div>
                        <?php 
                        $gradient_list = get_field('gradient_list');
                        if($gradient_list):
                            $items = explode(',', $gradient_list);
                        ?>
                            <ul class="gradient-block__list">
                                <?php foreach($items as $item): ?>
                                    <li><?php echo trim($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="columns__body">
                        <div class="columns__item span-three">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/difference/icons/05.svg" alt="icon">
                                </div>
                                <div class="columns-item__title">
                                    <h2><?php the_field('gradient_column_title'); ?></h2>
                                </div>
                            </div>
                            <div class="columns-item__text">
                                <p><?php the_field('gradient_column_text'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="banners ppc">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('how_help_title'); ?></h1>
                </div>
            </div>
            <div class="banners__body">
                <?php if(get_field('how_help_image')): ?>
                    <div class="banners__img">
                        <img src="<?php the_field('how_help_image'); ?>" alt="banner" loading="lazy">
                    </div>
                <?php endif; ?>
                <div class="banner__body white">
                    <div class="banner__container">
                        <?php if(have_rows('how_help_list')): ?>
                            <ul class="banner__list success">
                                <?php while(have_rows('how_help_list')): the_row(); ?>
                                    <li><?php the_sub_field('item_text'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="forward-agencies">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('agencies_title'); ?></h1>
                </div>
                <div class="block-head__text">
                    <p><?php the_field('agencies_subtitle'); ?></p>
                </div>
            </div>
            
            <?php if(have_rows('agencies_items')): ?>
                <div class="forward-agencies__body">
                    <?php while(have_rows('agencies_items')): the_row(); ?>
                        <div class="forward-agencies__item">
                            <div class="forward-agencies-item__content">
                                <div class="forward-agencies-item__title">
                                    <h3><?php the_sub_field('item_title'); ?></h3>
                                </div>
                                <div class="forward-agencies-item__text">
                                    <p><?php the_sub_field('item_text'); ?></p>
                                </div>
                            </div>
                            <div class="forward-agencies-item__media">
                                <?php 
                                $video = get_sub_field('item_video');
                                $image = get_sub_field('item_image');
                                if($video): ?>
                                    <video autoplay loop muted playsinline loading="lazy">
                                        <source src="<?php echo $video; ?>" type="video/mp4">
                                    </video>
                                <?php elseif($image): ?>
                                    <img src="<?php echo $image; ?>" alt="forward-agencies" loading="lazy">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <section class="table">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('table_title'); ?></h1>
                </div>
            </div>

             <?php if(have_rows('table_items')): ?>
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
                        <?php while(have_rows('table_items')): the_row(); 
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
                                    <?php if($has_info): ?>
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
                                <td>
                                    <?php 
                                    // Функция для рендера иконки
                                    function render_table_icon($field, $toggle_key) {
                                        // Проверяем включен ли toggle
                                        if (empty($field[$toggle_key])) {
                                            return isset($field['custom_text']) ? $field['custom_text'] : '';
                                        }
                                        
                                        // Получаем тип иконки
                                        $type = isset($field['type']) ? $field['type'] : '';
                                        
                                        // Маппинг типов на классы
                                        switch($type) {
                                            case 'true':
                                                return '<span class="table__icon table__icon--true"></span>';
                                            case 'false':
                                                return '<span class="table__icon table__icon--false"></span>';
                                            case 'partial':
                                                return '<span class="table__icon table__icon--true-false"></span>';
                                            default:
                                                return isset($field['custom_text']) ? $field['custom_text'] : '';
                                        }
                                    }
                                    
                                    // Рендерим Starter
                                    echo render_table_icon($starter, 'umiestnit_ikonu_anonieciastocne_namiesto_textu');
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    // Рендерим Basic
                                    echo render_table_icon($basic, 'umiestnit_ikonu_anonieciastocne_namiesto_textu_basic');
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    // Рендерим Advanced
                                    echo render_table_icon($advanced, 'umiestnit_ikonu_anonieciastocne_namiesto_textu_advanced');
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

            <?php if(have_rows('packages')): ?>
                <div class="packages__body">
                    <?php while(have_rows('packages')): the_row(); 
                        $dark_mode = get_sub_field('package_dark_mode');
                        $dark_class = $dark_mode ? ' dark' : '';
                    ?>
                        <div class="packages__item<?php echo $dark_class; ?>">
                            <?php if(get_sub_field('package_sticker')): ?>
                                <div class="packages-item__sticker">
                                    <span><?php the_sub_field('package_sticker'); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="packages-item__plan">
                                <span><?php the_sub_field('package_name'); ?></span>
                            </div>
                            <?php if(get_sub_field('package_description')): ?>
                                <div class="packages-item__description">
                                    <p><?php the_sub_field('package_description'); ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="packages-item__price">
                                <div class="packages-item-price__number">
                                    <span>€</span>
                                    <p><?php the_sub_field('package_price'); ?></p>
                                </div>
                            </div>
                            <?php if(get_sub_field('package_text')): ?>
                                <div class="packages-item__text">
                                    <?php the_sub_field('package_text'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="packages-item__button button">
                                <a href="#contact"><?php the_sub_field('package_button_text'); ?></a>
                            </div>
                            <?php if(get_sub_field('package_inscription')): ?>
                                <div class="packages-item__inscription">
                                    <span><?php the_sub_field('package_inscription'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <section class="banners">
        <div class="container">
            <div class="banners__body">
                <div class="banner__body white span-two">
                    <div class="banner__container" style="padding: 0 32px;">
                        <div class="banner__icon">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/banners/08.svg" alt="icon">
                        </div>
                        <div class="banner__title">
                            <h1><?php the_field('guarantee_title'); ?></h1>
                        </div>
                        <div class="banner__text">
                            <?php the_field('guarantee_text'); ?>
                        </div>
                        <div class="banner__button button">
                            <a href="#guarantee"><?php the_field('guarantee_button_text'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="process">
        <div class="container">
            <div class="process__title">
                <h1><?php the_field('process_title'); ?></h1>
            </div>
            
            <?php if(have_rows('process_steps')): ?>
                <div class="columns__body">
                    <?php 
                    $step_count = 0;
                    while(have_rows('process_steps')): the_row(); 
                        $step_count++;
                        $sticker = get_sub_field('step_sticker');
                    ?>
                        <div class="columns__item">
                            <div class="columns-item__head">
                                <div class="columns-item__icon">
                                    <span><?php the_sub_field('step_number'); ?></span>
                                </div>
                                <div class="columns-item__title">
                                    <h2><?php the_sub_field('step_title'); ?></h2>
                                </div>
                            </div>
                            <div class="columns-item__text">
                                <p><?php the_sub_field('step_text'); ?></p>
                            </div>
                            <?php if($sticker && $step_count == 6): ?>
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
    
    <section class="banners">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('why_without_title'); ?></h1>
                </div>
            </div>
            <div class="banners__columns">
                <div class="banners__column">
                    <div class="banner__body red">
                        <div class="banner__container">
                            <div class="banner__text">
                                <?php the_field('why_without_red_text'); ?>
                            </div>
                            <?php if(have_rows('why_without_questions')): ?>
                                <ul class="banner__list">
                                    <?php 
                                    $q_count = 1;
                                    while(have_rows('why_without_questions')): the_row(); ?>
                                        <li><?php the_sub_field('question_text'); ?></li>
                                    <?php 
                                    $q_count++;
                                    endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="banners__column">
                    <div class="banner__body blue">
                        <div class="banner__container left icon">
                            <div class="banner__title">
                                <h3><?php the_field('why_without_solution_title'); ?></h3>
                            </div>
                            <div class="banner__text">
                                <?php the_field('why_without_solution_text'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="banner__body white">
                        <div class="banner__container">
                            <div class="banner__title">
                                <h1><?php the_field('why_without_guarantee_title'); ?></h1>
                            </div>
                            <div class="banner__text">
                                <?php the_field('why_without_guarantee_text'); ?>
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
    
    <section class="banners ppc">
        <div class="container">
            <div class="banner__body gradient span-two">
                <div class="banner__container">
                    <div class="banner__content">
                        <div class="banner__title">
                            <h1><?php the_field('cta_title'); ?></h1>
                        </div>
                        <div class="banner__text">
                            <p><?php the_field('cta_text'); ?></p>
                        </div>
                    </div>
                    <div class="banner__button button">
                        <a href="#contact"><?php the_field('cta_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="faq">
        <div class="container">
            <div class="faq__title">
                <h1><?php the_field('faq_title'); ?></h1>
            </div>
            
            <?php if(have_rows('faq_items')): ?>
                <div class="faq__body">
                    <?php 
                    $half = ceil(count(get_field('faq_items')) / 2);
                    $counter = 0;
                    ?>
                    <div class="faq__column">
                        <?php while(have_rows('faq_items')): the_row(); 
                            $counter++;
                            if($counter > $half) break;
                        ?>
                            <div class="faq__item">
                                <div class="faq-item__title">
                                    <h2><?php the_sub_field('question'); ?></h2>
                                    <button></button>
                                </div>
                                <div class="faq-item__text">
                                    <?php the_sub_field('answer'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    
                    <?php if($counter < count(get_field('faq_items'))): ?>
                        <div class="faq__column">
                            <?php 
                            reset_rows();
                            $counter = 0;
                            while(have_rows('faq_items')): the_row(); 
                                $counter++;
                                if($counter <= $half) continue;
                            ?>
                                <div class="faq__item">
                                    <div class="faq-item__title">
                                        <h2><?php the_sub_field('question'); ?></h2>
                                        <button></button>
                                    </div>
                                    <div class="faq-item__text">
                                        <?php the_sub_field('answer'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="faq__button">
                    <button id="faq-toggle"><?php the_field('faq_button_text'); ?></button>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
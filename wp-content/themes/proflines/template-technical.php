<?php
/*
Template Name: Technical Page
*/

get_header();
?>
<main class="technical-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url(); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo get_permalink(); ?>"><?php echo esc_html(get_field('technical_page_title') ?: 'Technická stránka'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <section class="technical">
        <div class="container">
            <div class="technical__body">
                <div class="technical__content">
                    <div class="technical-content__head">
                        <div class="technical-content__title">
                            <h1><?php echo esc_html(get_field('technical_page_title') ?: 'Zásady ochrany osobných údajov (GDPR)'); ?></h1>
                        </div>
                        <div class="technical-content__text">
                            <p><?php echo esc_html(get_field('technical_page_date') ?: 'aktualizované/updated: 7-Nov-25'); ?></p>
                        </div>
                    </div>

                    <?php if( have_rows('technical_content_sections') ): ?>
                        <?php while( have_rows('technical_content_sections') ) : the_row(); 
                            $section_id = get_sub_field('section_id');
                            $section_title = get_sub_field('section_title');
                            $section_content = get_sub_field('section_content');
                        ?>
                            <div class="technical-content__body" id="<?php echo esc_attr($section_id); ?>">
                                <h2><?php echo esc_html($section_title); ?></h2>
                                <?php echo $section_content; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if( get_field('show_technical_banner') ): ?>
                        <div class="technical-content__banner">
                            <div class="technical-content-banner__title">
                                <h2><?php echo esc_html(get_field('banner_title') ?: 'Právny základ spracúvania'); ?></h2>
                            </div>
                            
                            <?php if( have_rows('banner_buttons') ): ?>
                                <?php while( have_rows('banner_buttons') ) : the_row(); 
                                    $button_text = get_sub_field('button_text');
                                    $button_link = get_sub_field('button_link');
                                    $button_style = get_sub_field('button_style');
                                ?>
                                    <?php if( $button_text && $button_link ): ?>
                                        <div class="technical-content-banner__button <?php echo $button_style === 'primary' ? 'button' : ''; ?>">
                                            <a href="<?php echo esc_url($button_link); ?>"><?php echo esc_html($button_text); ?></a>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php $banner_logo = get_field('banner_logo'); ?>
                            <?php if( $banner_logo ): ?>
                                <div class="technical-content-banner__logo">
                                    <img src="<?php echo esc_url($banner_logo['url']); ?>" alt="<?php echo esc_attr($banner_logo['alt'] ?: 'logo'); ?>" loading="lazy">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <ul class="technical__list">
                    <?php if( have_rows('technical_content_sections') ): ?>
                        <?php while( have_rows('technical_content_sections') ) : the_row(); 
                            $section_id = get_sub_field('section_id');
                            $section_title = get_sub_field('section_title');
                        ?>
                            <li class="technical-list__item">
                                <a href="#<?php echo esc_attr($section_id); ?>"><?php echo esc_html($section_title); ?></a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
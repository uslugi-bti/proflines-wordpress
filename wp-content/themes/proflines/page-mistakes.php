<?php get_header(); ?>
<main class="mistakes-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>social-initiative/">Sociálna iniciatíva</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="mistakes">
        <div class="container">
            <div class="single__body">
                <div class="single__head">
                    <div class="single-head__body">
                        <div class="single-head__title">
                            <h1><?php the_field('mistakes_title'); ?></h1>
                        </div>
                        <div class="single-head__text">
                            <p><?php the_field('mistakes_subtitle'); ?></p>
                        </div>
                        <div class="single-head__banner">
                            <?php the_field('mistakes_banner_text'); ?>
                        </div>
                    </div>
                    <div class="single-head__img">
                        <?php $mistakes_image = get_field('mistakes_image'); ?>
                        <?php if ($mistakes_image): ?>
                            <img src="<?php echo esc_url($mistakes_image); ?>" alt="single" loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="technical__body">
                <div class="technical__content">
                    <div class="mistakes__body">
                        <?php if (have_rows('mistake_categories')): ?>
                            <?php while (have_rows('mistake_categories')): the_row(); 
                                $anchor_id = get_sub_field('anchor_id');
                                $category_title = get_sub_field('category_title');
                            ?>
                                <div class="mistakes__item" id="<?php echo esc_attr($anchor_id); ?>">
                                    <div class="mistakes-item__title">
                                        <h3><?php echo $category_title; ?></h3>
                                    </div>
                                    <div class="mistakes-item__body">
                                        <?php if (have_rows('mistakes_list')): ?>
                                            <?php while (have_rows('mistakes_list')): the_row(); 
                                                $mistake_name = get_sub_field('mistake_name');
                                                $error_text = get_sub_field('mistake_description_error')['error_text'] ?? '';
                                                $solution_text = get_sub_field('mistake_description_solution')['solution_text'] ?? '';
                                            ?>
                                                <div class="mistakes-item__item">
                                                    <div class="mistakes-item-item__tilte">
                                                        <h4><?php echo $mistake_name; ?></h4>
                                                    </div>
                                                    <div class="mistakes-item-item__body">
                                                        <div class="mistakes-item-item__column red">
                                                            <p><strong>Chyba:</strong></p>
                                                            <p><?php echo $error_text; ?></p>
                                                        </div>
                                                        <div class="mistakes-item-item__column blue">
                                                            <p><strong>Riešenie:</strong></p>
                                                            <p><?php echo $solution_text; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <ul class="technical__list">
                    <?php if (have_rows('mistake_categories')): ?>
                        <?php while (have_rows('mistake_categories')): the_row(); 
                            $anchor_id = get_sub_field('anchor_id');
                            $category_title = get_sub_field('category_title');
                        ?>
                            <li class="technical-list__item">
                                <a href="#<?php echo esc_attr($anchor_id); ?>"><?php echo $category_title; ?></a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="technical-list__button button">
                        <a href="<?php echo home_url('/'); ?>social-initiative/"><?php the_field('navigation_button_text'); ?></a>
                    </div>
                </ul>
            </div>
            <div class="single-head__banner">
                <?php the_field('final_text'); ?>
            </div>

        </div>
    </section>
</main>
<?php get_footer(); ?>
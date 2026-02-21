<?php get_header(); ?>
<?php
// Get ACF fields for blog page
$blog_badge = get_field('blog_badge');
$blog_title = get_field('blog_title');
?>

<main class="blog-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/'); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="blog">
        <div class="container">
            <div class="blog__content">
                <?php if ($blog_badge): ?>
                <div class="blog-content__badge">
                    <span><?php echo $blog_badge; ?></span>
                </div>
                <?php endif; ?>
                
                <?php if ($blog_title): ?>
                <div class="blog-content__title">
                    <h1><?php echo $blog_title; ?></h1>
                </div>
                <?php endif; ?>
                
                <div class="blog-content__date">
                    <p><?php echo date_i18n('d F Y'); ?></p>
                </div>
            </div>
            
            <?php
            $args = [
                'post_type' => 'post',
                'posts_per_page' => -1,
                'category_name' => 'blog',
            ];

            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
                <div class="blog__items">

                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                        <div class="blog__item">

                            <div class="blog-item__img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>" loading="lazy" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="blog-item__head">
                                <div class="blog-item-head__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>

                                <div class="blog-item-head__badge">
                                    <span>
                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty($categories) ) {
                                        foreach ( $categories as $cat ) {
                                            if ( $cat->parent != 0 ) {
                                                $parent = get_category( $cat->parent );
                                                if ( $parent->slug === 'blog' ) {
                                                    echo esc_html( $cat->name );
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    </span>
                                </div>
                            </div>

                            <div class="blog-item__text">
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>

                            <div class="blog-item__bottom">
                                <div class="blog-item-bottom__date">
                                    <span><?php echo get_the_date('d. F Y'); ?></span>
                                </div>
                                <div class="blog-item-bottom__button">
                                    <a href="<?php the_permalink(); ?>">Čítať viac</a>
                                </div>
                            </div>

                        </div>

                    <?php endwhile; ?>

                </div>

                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>
</main>
<?php get_footer(); ?>
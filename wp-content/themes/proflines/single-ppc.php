<?php
/**
 * Template Name: PPC услуги
 * Шаблон для услуги "PPC"
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('service-ppc'); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="service-category">PPC реклама</div>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
                
                <!-- Уникальный контент для PPC -->
                <div class="service-features">
                    <h2>Настройка PPC кампаний</h2>
                    <ul>
                        <li>Google Ads</li>
                        <li>Facebook Ads</li>
                        <li>Sklik</li>
                    </ul>
                </div>
                
                <!-- Ссылка на бриф -->
                <div class="brif-section">
                    <h3>Запустите эффективную рекламу</h3>
                    <a href="<?php echo get_permalink(); ?>brif/" class="button button-primary">
                        Заполнить бриф на PPC
                    </a>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php
get_footer();
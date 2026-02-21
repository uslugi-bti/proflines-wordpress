<?php
/**
 * Template Name: Маркетинговый исследование
 * Шаблон для услуги "Marketingový prieskum"
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('service-marketingovy-prieskum'); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="service-category">Маркетинговый исследование</div>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
                
                <!-- Уникальный контент для этой услуги -->
                <div class="service-features">
                    <h2>Особенности маркетингового исследования</h2>
                    <ul>
                        <li>Анализ рынка</li>
                        <li>Конкурентный анализ</li>
                        <li>Целевая аудитория</li>
                    </ul>
                </div>
                
                <!-- Ссылка на бриф (общая для всех) -->
                <div class="brif-section">
                    <h3>Готовы начать?</h3>
                    <a href="<?php echo get_permalink(); ?>brif/" class="button button-primary">
                        Заполнить бриф на маркетинговое исследование
                    </a>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php
get_footer();
<?php
/**
 * Template Name: Бриф услуги
 * Единый шаблон для страниц брифа всех услуг
 */
get_header();

// Определяем тип услуги для возможной кастомизации
$categories = get_the_category();
$service_type = !empty($categories) ? $categories[0]->slug : 'unknown';
$is_secondary = ($service_type === 'ina-sluzba');
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" class="brif-page brif-<?php echo $service_type; ?>">
            <header class="entry-header">
                <?php if ($is_secondary): ?>
                    <h1>Бриф на второстепенную услугу: <?php the_title(); ?></h1>
                <?php else: ?>
                    <h1>Бриф: <?php the_title(); ?></h1>
                <?php endif; ?>
                
                <div class="breadcrumbs">
                    <?php if (!$is_secondary): ?>
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a> → 
                    <?php endif; ?>
                    <span>Бриф</span>
                </div>
            </header>
            
            <div class="entry-content">
                <?php if ($is_secondary): ?>
                    <div class="secondary-service-notice">
                        <p>Это второстепенная услуга. Заполните бриф, и мы предложим вам оптимальное решение.</p>
                    </div>
                <?php endif; ?>
                
                <!-- Форма брифа (одинаковая для всех) -->
                <div class="brif-form-container">
                    <h2>Заполните форму</h2>
                    
                    <form class="brif-form" method="post" action="">
                        <div class="form-group">
                            <label for="name">Ваше имя *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Опишите вашу задачу *</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <!-- Скрытое поле с типом услуги -->
                        <input type="hidden" name="service_type" value="<?php echo $service_type; ?>">
                        <input type="hidden" name="service_name" value="<?php the_title(); ?>">
                        
                        <button type="submit" class="button button-primary">Отправить бриф</button>
                    </form>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php
get_footer();
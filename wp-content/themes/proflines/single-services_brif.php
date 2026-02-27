<?php
get_header();

$categories = get_the_category();
$service_type = !empty($categories) ? $categories[0]->slug : 'unknown';
$is_secondary = ($service_type === 'ina-sluzba');

// Получаем ID текущего поста (услуги)
$post_id = get_the_ID();

// Получаем все поля для брифа
$brif_page_title = get_field('brif_page_title', $post_id);
$brif_page_subtitle = get_field('brif_page_subtitle', $post_id);
$brif_page_text = get_field('brif_page_text', $post_id);
$brif_page_form_fields = get_field('brif_page_form_fields', $post_id);
$brif_page_submit_text = get_field('brif_page_submit_text', $post_id) ?: 'Odoslať';
$brif_page_caption = get_field('brif_page_caption', $post_id);
$brif_page_badge = get_field('brif_page_badge', $post_id);
?>

<main class="briff-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url(); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo home_url('/services'); ?>">Balíky služieb</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="briff">
        <div class="container">
            <div class="briff__body">
                <!-- Левая часть с описанием -->
                <div class="briff__content">
                    <?php if ($brif_page_title): ?>
                    <div class="briff-content__title">
                        <h1><?php echo $brif_page_title; ?></h1>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($brif_page_subtitle): ?>
                    <div class="briff-content__subtitle">
                        <p><?php echo $brif_page_subtitle; ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($brif_page_text): ?>
                    <div class="briff-content__text">
                        <?php echo $brif_page_text; ?>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Правая часть с формой -->
                <div class="briff__form">
                    <form action="" method="post">
                        <?php if ($brif_page_form_fields && is_array($brif_page_form_fields)): ?>
                            <?php foreach ($brif_page_form_fields as $field): 
                                $field_id = $field['field_id'];
                                $field_label = $field['field_label'];
                                $field_type = $field['field_type'];
                                $field_width = isset($field['field_width']) ? $field['field_width'] : 'normal';
                                $required = isset($field['required']) && $field['required'];
                                $required_class = $required ? 'form-group--required' : '';
                                $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
                                $helper_text = isset($field['helper_text']) ? $field['helper_text'] : '';
                                $options = isset($field['options']) && is_array($field['options']) ? $field['options'] : array();
                            ?>
                            
                            <?php if ($field_type === 'heading'): ?>
                                <!-- Заголовок секции -->
                                <div class="form-content <?php echo $field_width; ?>">
                                    <div class="form-content__title">
                                        <h3><?php echo $field_label; ?></h3>
                                    </div>
                                    <?php if ($helper_text): ?>
                                    <div class="form-content__text">
                                        <p><?php echo $helper_text; ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            
                            <?php elseif ($field_type === 'badge'): ?>
                                <!-- Информационный бейдж -->
                                <div class="form-badge <?php echo $field_width; ?>">
                                    <p><?php echo $field_label; ?></p>
                                </div>
                            
                            <?php elseif ($field_type === 'select'): ?>
                                <!-- Выпадающий список -->
                                <div class="form-group <?php echo $field_width; ?> <?php echo $required_class; ?>">
                                    <label><?php echo $field_label; ?>:</label>
                                    <select name="<?php echo esc_attr($field_id); ?>">
                                        <?php if (!empty($options)): ?>
                                            <?php foreach ($options as $option): ?>
                                                <?php 
                                                // Kontrola, či je $option pole a má kľúč 'label'
                                                if (is_array($option) && isset($option['label'])) {
                                                    $option_value = sanitize_title($option['label']);
                                                    $option_label = $option['label'];
                                                } elseif (is_string($option)) {
                                                    $option_value = sanitize_title($option);
                                                    $option_label = $option;
                                                } else {
                                                    continue;
                                                }
                                                ?>
                                                <option value="<?php echo esc_attr($option_value); ?>">
                                                    <?php echo esc_html($option_label); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php if ($helper_text): ?>
                                        <span class="form-helper"><?php echo $helper_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            
                            <?php elseif ($field_type === 'radio'): ?>
                                <!-- Радио кнопки -->
                                <div class="form-group radio <?php echo $field_width; ?> <?php echo $required_class; ?>">
                                    <h4><?php echo $field_label; ?>:</h4>
                                    <div class="form-group__body">
                                        <?php if (!empty($options)): ?>
                                            <?php foreach ($options as $option): ?>
                                                <?php 
                                                if (is_array($option) && isset($option['label'])) {
                                                    $option_value = sanitize_title($option['label']);
                                                    $option_label = $option['label'];
                                                } elseif (is_string($option)) {
                                                    $option_value = sanitize_title($option);
                                                    $option_label = $option;
                                                } else {
                                                    continue;
                                                }
                                                ?>
                                                <label>
                                                    <input type="radio" 
                                                        name="<?php echo esc_attr($field_id); ?>" 
                                                        value="<?php echo esc_attr($option_value); ?>"
                                                    >
                                                    <span></span>
                                                    <p><?php echo $option_label; ?></p>
                                                </label>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($helper_text): ?>
                                        <span class="form-helper"><?php echo $helper_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            
                            <?php elseif ($field_type === 'checkbox'): ?>
                                <!-- Чекбоксы -->
                                <div class="form-group checkbox <?php echo $field_width; ?> <?php echo $required_class; ?>">
                                    <h4><?php echo $field_label; ?></h4>
                                    <div class="form-group__body">
                                        <?php if (!empty($options)): ?>
                                            <?php foreach ($options as $option): ?>
                                                <?php 
                                                if (is_array($option) && isset($option['label'])) {
                                                    $option_value = sanitize_title($option['label']);
                                                    $option_label = $option['label'];
                                                } elseif (is_string($option)) {
                                                    $option_value = sanitize_title($option);
                                                    $option_label = $option;
                                                } else {
                                                    continue;
                                                }
                                                ?>
                                                <label>
                                                    <input type="checkbox" 
                                                           name="<?php echo esc_attr($field_id); ?>[]"
                                                           value="<?php echo esc_attr($option_value); ?>">
                                                    <span></span>
                                                    <p><?php echo $option_label; ?></p>
                                                </label>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($helper_text): ?>
                                        <span class="form-helper"><?php echo $helper_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            
                            <?php elseif ($field_type === 'textarea'): ?>
                                <!-- Текстовая область -->
                                <div class="form-group <?php echo $field_width; ?> <?php echo $required_class; ?>">
                                    <h4><?php echo $field_label; ?>:</h4>
                                    <textarea name="<?php echo esc_attr($field_id); ?>" 
                                              placeholder="<?php echo esc_attr($placeholder); ?>"></textarea>
                                    <?php if ($helper_text): ?>
                                        <span class="form-helper"><?php echo $helper_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            
                            <?php else: // text, email, tel ?>
                                <!-- Текстовые поля -->
                                <div class="form-group <?php echo $field_width; ?> <?php echo $required_class; ?>">
                                    <label><?php echo $field_label; ?>:</label>
                                    <input type="<?php echo esc_attr($field_type); ?>" 
                                           name="<?php echo esc_attr($field_id); ?>"
                                           placeholder="<?php echo esc_attr($placeholder); ?>"
                                           autocomplete="off">
                                    <?php if ($helper_text): ?>
                                        <span class="form-helper"><?php echo $helper_text; ?></span>
                                    <?php endif; ?>
                                </div>
                            
                            <?php endif; ?>
                            
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                        <!-- Кнопка отправки -->
                        <div class="form-button button span-two">
                            <button type="submit"><?php echo esc_html($brif_page_submit_text); ?></button>
                        </div>
                        
                        <!-- Текст под кнопкой -->
                        <?php if ($brif_page_caption): ?>
                        <div class="form-caption span-two">
                            <span><?php echo esc_html($brif_page_caption); ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($brif_page_badge): ?>
                        <div class="form-badge span-two">
                            <p><?php echo esc_html($brif_page_badge); ?></p>
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
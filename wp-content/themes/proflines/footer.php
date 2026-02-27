<footer class="footer">
    <?php 
    $front_page_id = get_option('page_on_front');
    $logo_footer = get_field('logo_footer', $front_page_id);
    $legal_name = get_field('legal_name', $front_page_id);
    $vat_id = get_field('vat_id', $front_page_id);
    $tax_id = get_field('tax_id', $front_page_id);
    $street_address = get_field('street_address', $front_page_id);
    $address_locality = get_field('address_locality', $front_page_id);
    $postal_code = get_field('postal_code', $front_page_id);
    $address_office = get_field('address_office', $front_page_id);
    $operation_address = get_field('operation_address', $front_page_id);
    $telephone = get_field('telephone', $front_page_id);
    $admin_email = get_bloginfo('admin_email');
    $facebook = get_field('link_to_facebook', $front_page_id);
    $instagram = get_field('link_to_instagram', $front_page_id);
    $linkedin = get_field('link_to_linkedin', $front_page_id);
    $footer_policy = get_field('footer_policy', $front_page_id);
    
    // Získanie všetkých stránok so šablónou Technical Page
    $technical_pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-technical.php'
    ));
    
    // Získanie všetkých služieb (posts s kategóriou services a bez ina-sluzba)
    $services_args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'services'
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'ina-sluzba',
                'operator' => 'NOT IN'
            )
        )
    );
    $services = get_posts($services_args);
    ?>
    
    <div class="container">
        <div class="footer-top">
            <div class="footer-top__body">
                <div class="footer-top__title">
                    <h1><span>Rozumieme vám</span> - a vieme pomôcť.</h1>
                </div>
                <div class="footer-top__button button">
                    <a href="/kontakt">Napíšte nám o vašom projekte</a>
                </div>
                <div class="footer-top__text">
                    <p>Získať plán do 12 hodín</p>
                </div>
            </div>
            <div class="footer-top__columns">
                <div class="footer-top__column">
                    <ul class="footer-top__list">
                        <li class="footer-top__item">
                            <span>Služby</span>
                        </li>
                        <?php if (!empty($services)): ?>
                            <?php foreach ($services as $service): ?>
                            <li class="footer-top__item">
                                <a href="<?php echo get_permalink($service->ID); ?>"><?php echo get_the_title($service->ID); ?></a>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <li class="footer-top__item">
                            <a href="<?php echo home_url('/o-nas'); ?>">O nás</a>
                        </li>
                        <li class="footer-top__item">
                            <a href="<?php echo home_url('/baliky-sluzieb'); ?>">Balíky služieb</a>
                        </li>
                    </ul>
                    <ul class="footer-top__list grey">
                        <?php if ($linkedin): ?>
                        <li class="footer-top__item">
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                        </li>
                        <?php endif; ?>
                        <?php if ($instagram): ?>
                        <li class="footer-top__item">
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer">Instagram</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="footer-top__column">
                    <ul class="footer-top__list">
                        <li class="footer-top__item">
                            <span>Kontakt:</span>
                        </li>
                        <?php if ($telephone): ?>
                        <li class="footer-top__item">
                            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $telephone)); ?>"><?php echo esc_html($telephone); ?></a>
                        </li>
                        <?php endif; ?>
                        <li class="footer-top__item">
                            <a href="mailto:<?php echo esc_attr($admin_email); ?>"><?php echo esc_html($admin_email); ?></a>
                        </li>
                        <?php if ($address_office): ?>
                        <li class="footer-top__item">
                            <span><?php echo esc_html($address_office); ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if ($operation_address): ?>
                        <li class="footer-top__item">
                            <span>Prevádzková adresa: <?php echo esc_html($operation_address); ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="footer-top__list">
                        <ul class="footer-top__list grey">
                            <li class="footer-top__item">
                                <span><span style="color: #242A36;">Slovensko</span> / EU</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom__text">
                <?php if ($footer_policy): ?>
                    <p><?php echo $footer_policy; ?></p>
                <?php endif; ?>
            </div>
            <div class="footer-bottom__button">
                <button id="Skryť právne informácie">Zobraziť právne informácie</button>
            </div>
            <div class="footer-bottom__img">
                <?php if ($logo_footer): ?>
                    <img src="<?php echo esc_url($logo_footer); ?>" alt="logo" loading="lazy">
                <?php endif; ?>
            </div>
            <div class="footer-bottom__policy">
                <p>© 2026 ProfLines. Všetky práva vyhradené.</p>
            </div>
            <div class="footer-bottom__links">
                <p>
                    <?php if ($legal_name): echo esc_html($legal_name) . '<br>'; endif; ?>
                    <?php if ($tax_id): echo 'IČO:' . esc_html($tax_id); endif; ?>
                    <?php if ($vat_id): echo ', DIČ(VAT):' . esc_html($vat_id); endif; ?>
                </p>
                <p>Predmety činnosti (SK NACE):<br>73.20 – Reklamné a marketingové služby, prieskum trhu a verejnej mienky.</p>
                <p>70.22 – Činnosť podnikateľských, organizačných a ekonomických poradcov.</p>
                <p>
                    <?php if (!empty($technical_pages)): ?>
                        <?php 
                        $links = array();
                        foreach ($technical_pages as $page) {
                            $links[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        }
                        echo implode(' / ', $links);
                        ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
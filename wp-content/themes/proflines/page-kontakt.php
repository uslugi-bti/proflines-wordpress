<?php get_header(); ?>
<main class="contact-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href="<?php echo home_url(); ?>">Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href="<?php echo home_url(); ?>/kontakt">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="contact">
        <div class="container">
            <div class="contact__body">
                <div class="contact__content">
                    <div class="contact-content__title">
                        <h1>Kontakt</h1>
                    </div>
                    <ul class="contact-content__list">
                        <?php $front_page_id = get_option('page_on_front'); ?>
                        <?php $telephone = get_field('telephone', $front_page_id); ?>
                        <?php if ($telephone): ?>
                        <li class="contact-content__item">
                            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $telephone)); ?>"><?php echo esc_html($telephone); ?></a>
                        </li>
                        <?php endif; ?>
                        
                        <?php $admin_email = get_bloginfo('admin_email'); ?>
                        <li class="contact-content__item">
                            <a href="mailto:<?php echo esc_attr($admin_email); ?>"><?php echo esc_html($admin_email); ?></a>
                        </li>
                        
                        <?php $street_address = get_field('street_address', $front_page_id); ?>
                        <?php $address_locality = get_field('address_locality', $front_page_id); ?>
                        <?php $postal_code = get_field('postal_code', $front_page_id); ?>
                        <?php if ($street_address && $address_locality && $postal_code): ?>
                        <li class="contact-content__item">
                            <a href="https://maps.google.com/?q=<?php echo urlencode($street_address . ', ' . $postal_code . ' ' . $address_locality); ?>" target="_blank" rel="noopener noreferrer">
                                Sídlo spoločnosti: <?php echo esc_html($street_address . ', ' . $postal_code . ' ' . $address_locality); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php $operation_address = get_field('operation_address', $front_page_id); ?>
                        <?php if ($operation_address): ?>
                        <li class="contact-content__item">
                            <a href="https://maps.google.com/?q=<?php echo urlencode($operation_address); ?>" target="_blank" rel="noopener noreferrer">
                                Prevádzka: <?php echo esc_html($operation_address); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="contact-content__text">
                        <?php $legal_name = get_field('legal_name', $front_page_id); ?>
                        <?php $vat_id = get_field('vat_id', $front_page_id); ?>
                        <?php $tax_id = get_field('tax_id', $front_page_id); ?>
                        <?php $company_registration = get_field('company_registration', $front_page_id); ?>
                        
                        <?php if ($legal_name || $vat_id || $tax_id): ?>
                        <p>
                            <?php if ($legal_name): echo esc_html($legal_name) . '<br>'; endif; ?>
                            <?php if ($vat_id): echo 'IČO: ' . esc_html($vat_id); endif; ?>
                            <?php if ($tax_id): echo ', DIČ(VAT): ' . esc_html($tax_id); endif; ?>
                            <?php if ($company_registration): echo '<br>' . esc_html($company_registration); endif; ?>
                        </p>
                        <?php endif; ?>
                        
                        <p>Predmety činnosti (SK NACE):<br>73.20 – Reklamné a marketingové služby, prieskum trhu a verejnej mienky.</p>
                        <p>70.22 – Činnosť podnikateľských, organizačných a ekonomických poradcov.</p>
                    </div>
                </div>
                <div class="contact__form">
                    <form action="#" method="post">
                        <div class="form-head span-two">
                            <div class="form-head__title">
                                <h2>Kontaktujte nás</h2>
                            </div>
                            <div class="form-head__text">
                                <p>Máte otázky alebo záujem o spoluprácu? Vyplňte formulár a my sa vám ozveme čo najskôr</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Vaše meno:</label>
                            <input type="text" name="name" id="name" placeholder="Meno a priezvisko" autocomplete="off">
                        </div>
                        <div class="form-group form-group--required">
                            <label>*E-mail:</label>
                            <input type="text" name="email" id="email" placeholder="E-mail:" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Telefón:</label>
                            <select name="country_code" id="country_code">
                                <option value="SK">Slovakia (Slovensko) +421</option>
                                <option value="CZ">Czech Republic (Česko) +420</option>
                                <option value="PL">Poland (Polsko) +48</option>
                                <option value="HU">Hungary (Maďarsko) +36</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="Telefónne číslo" autocomplete="off">
                        </div>
                        <div class="form-group checkbox span-two form-group--required">
                            <h4>Spracovanie osobných údajov (GDPR)</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="gdpr_consent" id="gdpr_consent">
                                    <span></span>
                                    <p><span>*Súhlasím s podmienkami spracovávania osobných údajov podľa GDPR</span></p>
                                </label>
                                <label>
                                    <input type="checkbox" name="newsletter_consent" id="newsletter_consent">
                                    <span></span>
                                    <p>Súhlasím so zasielaním užitočného obsahu (case štúdie, tipy, e-booky), maximálne 1× týždenne. Môžem sa kedykoľvek odhlásiť.</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-button button span-two">
                            <button type="submit">Odoslať správu</button>
                        </div>

                        <div class="form-caption span-two">
                            <span>Ozveme sa vám do 24 hodín</span>
                            <span>Ak e-mail neprišiel, pozrite aj Spam</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="mission">
        <div class='container'>
            <div class="mission__img">
                <?php $mission_bottom_image = get_field('mission_bottom_image', 2604); ?>
                <?php if ($mission_bottom_image): ?>
                <img src="<?php echo esc_url($mission_bottom_image['url']); ?>" alt="<?php echo esc_attr($mission_bottom_image['alt'] ?: 'mission'); ?>" loading="lazy">
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
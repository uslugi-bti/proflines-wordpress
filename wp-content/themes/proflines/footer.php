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
                        <?php else: ?>
                            <li class="footer-top__item">
                                <a href="/sluzby/marketingovy-vyskum">Marketingový výskum</a>
                            </li>
                            <li class="footer-top__item">
                                <a href="/sluzby/seo-ppc">SEO & PPC</a>
                            </li>
                            <li class="footer-top__item">
                                <a href="/sluzby/web-ux">Web & UX</a>
                            </li>
                            <li class="footer-top__item">
                                <a href="/sluzby/ai-riesenia">AI riešenia</a>
                            </li>
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
                        <?php else: ?>
                        <li class="footer-top__item">
                            <a href="#">LinkedIn</a>
                        </li>
                        <?php endif; ?>
                        <?php if ($instagram): ?>
                        <li class="footer-top__item">
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer">Instagram</a>
                        </li>
                        <?php else: ?>
                        <li class="footer-top__item">
                            <a href="https://www.instagram.com/proflines_marketing/">Instagram</a>
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
                        <?php else: ?>
                        <li class="footer-top__item">
                            <a href="tel:+421944457515">+421 944 457 515</a>
                        </li>
                        <?php endif; ?>
                        <li class="footer-top__item">
                            <a href="mailto:<?php echo esc_attr($admin_email); ?>"><?php echo esc_html($admin_email); ?></a>
                        </li>
                        <?php if ($address_office): ?>
                        <li class="footer-top__item">
                            <span><?php echo esc_html($address_office); ?></span>
                        </li>
                        <?php else: ?>
                        <li class="footer-top__item">
                            <span>Sídlo spoločnosti: Lermontovova, 911/3, 81105, Bratislava</span>
                        </li>
                        <?php endif; ?>
                        <?php if ($operation_address): ?>
                        <li class="footer-top__item">
                            <span>Prevádzková adresa: <?php echo esc_html($operation_address); ?></span>
                        </li>
                        <?php else: ?>
                        <li class="footer-top__item">
                            <span>Prevádzková adresa: Legionárska, 1/1, 83104, Bratislava</span>
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
                    <?php echo $footer_policy; ?>
                <?php else: ?>
                <p>© ProfLines s.r.o. je marketingová a analytická agentúra, nie finančná, právna ani investičná inštitúcia. Všetky materiály prezentované na tejto webovej stránke, vrátane analytických správ, marketingových prieskumov, prognóz, prípadových štúdií, ukážok výsledkov a iných údajov, majú výlučne informatívny charakter a nepredstavujú finančné, investičné, právne ani daňové poradenstvo.<br><br>© Všetky výsledky, ukazovatele výkonnosti, percentá rastu, údaje o návštevnosti, konverziách, predajoch alebo iných obchodných metrikách vychádzajú zo skutočných projektov, interných analytických dát alebo modelových výpočtov, avšak nezaručujú dosiahnutie rovnakých výsledkov v budúcnosti. Skutočné výsledky sa môžu výrazne líšiť v závislosti od trhu, segmentu, rozpočtu, konkurencie, sezónnosti, stavu produktu a vonkajších faktorov.<br><br>© Akékoľvek príklady prípadových štúdií, projektov alebo dosiahnutých výsledkov sú uvedené výlučne za účelom prezentácie prístupu, metodológie a odbornosti spoločnosti ProfLines s.r.o.. Nepredstavujú verejnú ponuku a nezakladajú právne záväzky týkajúce sa konkrétnych výsledkov spolupráce.<br><br>© ProfLines s.r.o. nenesie zodpovednosť za rozhodnutia prijaté používateľmi alebo klientmi na základe informácií zverejnených na webovej stránke, v správach, prezentáciách alebo iných materiáloch. Všetky obchodné rozhodnutia prijíma klient samostatne a na vlastné riziko.<br><br>© Údaje získané od klientov v priebehu spolupráce, vrátane obchodných informácií, finančných ukazovateľov, interných správ, prístupov a výsledkov výskumov, sú spracúvané v súlade s platnou legislatívou a používané výlučne na účely plnenia marketingových, analytických a strategických úloh.<br><br>© ProfLines s.r.o. dodržiava zásady dôvernosti a neposkytuje informácie tretím stranám bez predchádzajúceho súhlasu klienta, s výnimkou prípadov stanovených zákonom alebo zmluvnými podmienkami.<br><br>© Všetky materiály tejto webovej stránky, vrátane textov, grafiky, dizajnu, štruktúry stránok, analytických modelov a vizualizácií, sú duševným vlastníctvom spoločnosti ProfLines s.r.o. a sú chránené autorským právom. Akékoľvek kopírovanie, šírenie alebo použitie materiálov bez písomného súhlasu je zakázané.<br><br>© ProfLines s.r.o. si vyhradzuje právo meniť, aktualizovať alebo dopĺňať informácie na webovej stránke bez predchádzajúceho upozornenia.</p>
                <?php endif; ?>
            </div>
            <div class="footer-bottom__button">
                <button id="Skryť právne informácie">Zobraziť právne informácie</button>
            </div>
            <div class="footer-bottom__img">
                <?php if ($logo_footer): ?>
                    <img src="<?php echo esc_url($logo_footer); ?>" alt="logo" loading="lazy">
                <?php else: ?>
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/footer/01.svg" alt="logo" loading="lazy">
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
                    <?php else: ?>
                        <a href="/obchodne-podmienky">Obchodné podmienky</a> / 
                        <a href="/terms-conditions">Terms & Conditions</a> / 
                        <a href="/pravne-informacie">Právne informácie</a> / 
                        <a href="/impressum">Impressum</a> / 
                        <a href="/gdpr">Zásady ochrany osobných údajov (GDPR)</a> / 
                        <a href="/privacy-policy">Privacy Policy</a> / 
                        <a href="/cookies">Zásady používania súborov cookies</a> / 
                        <a href="/cookies-policy">Cookies Policy</a>
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
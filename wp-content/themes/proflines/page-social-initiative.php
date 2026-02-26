<?php get_header(); ?>
<main class="initiative-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href>Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href>Balíky služieb</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="technical">
        <div class="container">
            <div class="technical__head">
                <div class="technical-head__title">
                    <h1><?php the_field('initiative_title'); ?></h1>
                </div>
                <div class="technical-head__text">
                    <p><?php the_field('initiative_subtitle'); ?></p>
                </div>
            </div>
            <div class="technical__body">
                <div class="technical__content">
                    <div class="technical-content__body" id="why_we_do_it">
                        <?php the_field('why_we_do_content'); ?>
                        
                        <?php $why_we_do_image = get_field('why_we_do_image'); ?>
                        <?php if ($why_we_do_image): ?>
                            <img src="<?php echo esc_url($why_we_do_image); ?>" alt="image" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="technical-content__body" id="how_it_works">
                        <h2><?php the_field('how_it_works_title'); ?></h2>

                        <div class="columns__body shortcode">
                            <?php if (have_rows('how_it_works_steps')): ?>
                                <?php while (have_rows('how_it_works_steps')): the_row(); 
                                    $step_number = get_sub_field('step_number');
                                    $step_title = get_sub_field('step_title');
                                    $step_description = get_sub_field('step_description');
                                ?>
                                    <div class="columns__item">
                                        <div class="columns-item__head">
                                            <div class="columns-item__icon step">
                                                <span><?php echo $step_number; ?></span>
                                            </div>
                                            <div class="columns-item__title">
                                                <h4><?php echo $step_title; ?></h4>
                                            </div>
                                        </div>
                                        <div class="columns-item__text">
                                            <p><?php echo $step_description; ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <ul class="technical__list">
                    <li class="technical-list__item">
                        <a href="#why_we_do_it">Prečo to robíme</a>
                    </li>
                    <li class="technical-list__item">
                        <a href="#how_it_works">Ako program funguje</a>
                    </li>
                    <li class="technical-list__item">
                        <a href="#faq">Často kladené otázky</a>
                    </li>
                    <li class="technical-list__item">
                        <a href="#brief">Prihláška / Brief</a>
                    </li>

                    <div class="technical-list__button button">
                        <a href><?php the_field('initiative_nav_button_text'); ?></a>
                    </div>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="faq" id="faq">
        <div class="container">
            <div class="block__head">
                <div class="block-head__title">
                    <h1><?php the_field('initiative_faq_title'); ?></h1>
                </div>
            </div>
            <div class="faq__body">
                <?php if (have_rows('initiative_faq_items')): ?>
                    <?php 
                    $faq_items = get_field('initiative_faq_items');
                    $half = ceil(count($faq_items) / 2);
                    $i = 0;
                    ?>
                    <div class="faq__column">
                        <?php foreach ($faq_items as $item): 
                            if ($i == $half) echo '</div><div class="faq__column">';
                        ?>
                            <div class="faq__item">
                                <div class="faq-item__title">
                                    <h2><?php echo $item['question']; ?></h2>
                                    <button></button>
                                </div>
                                <div class="faq-item__text">
                                    <?php echo $item['answer']; ?>
                                </div>
                            </div>
                        <?php 
                            $i++;
                            endforeach; 
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="faq__button">
                <button id="Zobraziť menej"><?php the_field('initiative_faq_button_text'); ?></button>
            </div>
        </div>
    </section>
    
    <section class="briff" id="brief">
        <div class="container">
            <div class="briff__body">
                <div class="briff__content">
                    <div class="briff-content__caption">
                        <p><?php the_field('brief_caption'); ?></p>
                    </div>
                    <div class="briff-content__title">
                        <h2><?php the_field('brief_title'); ?></h2>
                    </div>
                    <div class="briff-content__quote">
                        <blockquote><?php the_field('brief_quote'); ?></blockquote>
                    </div>
                </div>
                <div class="briff__form">
                    <form action>
                        <div class="form-head span-two">
                            <div class="form-head__title">
                                <h3>Kontaktné informácie</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>*Meno a priezvisko:</label>
                            <input type="text" name id placeholder="Meno a priezvisko" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Názov spoločnosti (ak existuje):</label>
                            <input type="text" name id placeholder="Názov spoločnosti" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Telefón:</label>
                            <input type="text" name id placeholder="+421" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>*E-mail:</label>
                            <input type="text" name id placeholder="E-mail:" autocomplete="off">
                        </div>

                        <div class="form-group radio span-two">
                            <h4>*Preferovaný spôsob kontaktu:</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>Telefón</p>
                                </label>
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>E-mail</p>
                                </label>
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>WhatsApp</p>
                                </label>
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>Telegram</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-badge span-two">
                            <p>Ak nevidíte našu odpoveď v doručenej pošte – skontrolujte priečinok "Spam". Pridajte si nás do "Kontaktov", aby ďalšie správy prichádzali priamo do doručenej pošty.</p>
                        </div>

                        <div class="form-content span-two">
                            <div class="form-content__title">
                                <h3>Detaily problému a účtu</h3>
                            </div>
                            <div class="form-content__text">
                                <p>Tieto informácie sú potrebné na počiatočnú diagnostiku príčiny blokácie a na posúdenie rizika tzv. "Death Loop".</p>
                            </div>
                        </div>

                        <div class="form-group radio span-two">
                            <h4>Potrebujete konzultáciu pred začiatkom?</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="radio" name="need-consultation" id="need-consultation">
                                    <span></span>
                                    <p>Áno</p>
                                </label>
                                <label>
                                    <input type="radio" name="need-consultation" id="need-consultation">
                                    <span></span>
                                    <p>Nie</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-group span-two">
                            <h4>Koľkokrát ste už podali odvolanie?</h4>
                            <input type="text" name id placeholder="0, 1, 2, 3+..." autocomplete="off">
                        </div>

                        <div class="form-group span-two">
                            <h4>Približný rozpočet:</h4>
                            <input type="text" name id placeholder="Napr. 500-1000 EUR" autocomplete="off">
                        </div>

                        <div class="form-group span-two">
                            <h4>Čo predávate? Kto je vaša cieľová skupina (B2B/B2C)?</h4>
                            <textarea name id placeholder="Opíšte váš biznis..." autocomplete="off"></textarea>
                        </div>

                        <div class="form-group checkbox span-two">
                            <h4>*Hlavný cieľ marketingového prieskumu:</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Overiť nápad pred spustením</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Lepšie porozumieť svojmu zákazníkovi</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Analyzovať konkurenciu</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Nájsť najvhodnejšiu niku alebo región</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Optimalizovať cenu alebo pozicionovanie</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-group checkbox span-two">
                            <h4>Spracovanie osobných údajov (GDPR)</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="gdpr" id="gdpr">
                                    <span></span>
                                    <p><span>*Súhlasím s podmienkami spracovania osobných údajov podľa GDPR</span></p>
                                </label>
                                <label>
                                    <input type="checkbox" name="gdpr" id="gdpr">
                                    <span></span>
                                    <p>Súhlasím so zasielaním užitočného obsahu (case štúdie, tipy, e-booky), maximálne 1× týždenne. Môžem sa kedykoľvek odhlásiť.</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-button button span-two">
                            <button type="submit">Odoslať</button>
                        </div>

                        <div class="form-caption span-two">
                            <span><?php the_field('brief_caption_bottom'); ?></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
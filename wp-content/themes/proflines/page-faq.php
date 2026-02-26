<?php get_header(); ?>
<main class="faq-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href>Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href>Q&amp;A</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="qa">
        <div class="container">
            <div class="qa__head">
                <div class="qa-head__title">
                    <h1><?php the_field('faq_page_title'); ?></h1>
                </div>
                <div class="qa-head__text">
                    <p><?php the_field('faq_page_subtitle'); ?></p>
                </div>
            </div>
            <div class="qa__body">
                <div class="qa__content">
                    <?php
                    $service_faqs = array(
                        'seo' => array(
                            'id' => 1763,
                            'title' => 'SEO audit',
                            'items' => get_field('faq_items', 1763)
                        ),
                        'ppc' => array(
                            'id' => 1388,
                            'title' => 'PPC kampane a reklama',
                            'items' => get_field('faq_items', 1388)
                        ),
                        'web' => array(
                            'id' => 1932,
                            'title' => 'Tvorba webu a UX',
                            'items' => get_field('faq_items', 1932)
                        ),
                        'research' => array(
                            'id' => 198,
                            'title' => 'Marketingový prieskum',
                            'items' => get_field('faq_items', 198)
                        ),
                        'gmc' => array(
                            'id' => 2354,
                            'title' => 'Odblokovanie Google Merchant Center',
                            'items' => get_field('faq_items', 2354)
                        )
                    );
                    ?>
                    
                    <div class="qa-content__item" id="all">
                        <div class="qa-content__title">
                            <h3><?php the_field('general_faq_title'); ?></h3>
                        </div>
                        <div class="faq__body">
                            <?php if (have_rows('general_faq_items')): ?>
                                <?php
                                $general_items = get_field('general_faq_items');
                                $half = ceil(count($general_items) / 2);
                                $i = 0;
                                ?>
                                <div class="faq__column">
                                    <?php foreach ($general_items as $item): ?>
                                        <?php if ($i == $half) echo '</div><div class="faq__column">'; ?>
                                        <div class="faq__item">
                                            <div class="faq-item__title">
                                                <h2><?php echo $item['question']; ?></h2>
                                                <button></button>
                                            </div>
                                            <div class="faq-item__text">
                                                <?php echo $item['answer']; ?>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php foreach ($service_faqs as $key => $service): ?>
                        <?php if (!empty($service['items']) && is_array($service['items'])): ?>
                            <div class="qa-content__item" id="<?php echo $key; ?>">
                                <div class="qa-content__title">
                                    <h3><?php echo $service['title']; ?></h3>
                                </div>
                                <div class="faq__body">
                                    <?php
                                    $half = ceil(count($service['items']) / 2);
                                    $i = 0;
                                    ?>
                                    <div class="faq__column">
                                        <?php foreach ($service['items'] as $item): ?>
                                            <?php if ($i == $half) echo '</div><div class="faq__column">'; ?>
                                            <div class="faq__item">
                                                <div class="faq-item__title">
                                                    <h2><?php echo $item['question']; ?></h2>
                                                    <button></button>
                                                </div>
                                                <div class="faq-item__text">
                                                    <?php echo $item['answer']; ?>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                
                <div class="qa__menu">
                    <ul class="qa-menu__list">
                        <li>
                            <a href="#all">Všeobecné otázky</a>
                        </li>
                        <?php if (!empty($service_faqs['seo']['items'])): ?>
                            <li>
                                <a href="#seo">SEO audit</a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($service_faqs['ppc']['items'])): ?>
                            <li>
                                <a href="#ppc">PPC kampane a reklama</a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($service_faqs['web']['items'])): ?>
                            <li>
                                <a href="#web">Tvorba webu a UX</a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($service_faqs['research']['items'])): ?>
                            <li>
                                <a href="#research">Marketingový prieskum</a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($service_faqs['gmc']['items'])): ?>
                            <li>
                                <a href="#gmc">Odblokovanie GMC</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="qa-menu__button button">
                        <a href><?php the_field('faq_nav_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
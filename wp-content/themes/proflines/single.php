<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$categories = get_the_category();
if (!empty($categories)) {
    $category_slug = $categories[0]->slug;
        
    switch ($category_slug) {
        case 'tvorba-webu':
            get_template_part('single-web');
            exit;

        case 'marketingovy-prieskum-services':
            get_template_part('single-marketingovy-prieskum-services');
            exit;
            
        case 'odblokovanie-google-merchant-cente':
            get_template_part('single-odblokovanie-google-merchant-cente');
            exit;
            
        case 'ppc':
            get_template_part('single-ppc');
            exit;
            
        case 'seo-audit':
            get_template_part('single-seo-audit');
            exit;
            
        case 'ina-sluzba':
            if (strpos($_SERVER['REQUEST_URI'], '/brif/') !== false) {
                get_template_part('single-services_brif');
                exit;
            }
            wp_redirect(get_permalink() . 'brif/');
            exit;
            
        case 'blog':
            get_template_part('single-blog');
            exit;
    }
}
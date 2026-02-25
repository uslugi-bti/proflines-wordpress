<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$categories = get_the_category();

if (!empty($categories)) {
    $slugs = wp_list_pluck($categories, 'slug');

    if (in_array('tvorba-webu', $slugs)) {
        get_template_part('single-web');
        exit;
    }

    if (in_array('ppc', $slugs)) {
        get_template_part('single-ppc');
        exit;
    }

    if (in_array('seo-audit', $slugs)) {
        get_template_part('single-seo-audit');
        exit;
    }

    if (in_array('marketingovy-prieskum-services', $slugs)) {
        get_template_part('single-marketingovy-prieskum-services');
        exit;
    }

    if (in_array('odblokovanie-google-merchant-cente', $slugs)) {
        get_template_part('single-odblokovanie-google-merchant-cente');
        exit;
    }

    if (in_array('blog', $slugs)) {
        get_template_part('single-blog');
        exit;
    }

    if (in_array('ina-sluzba', $slugs)) {
        if (strpos($_SERVER['REQUEST_URI'], '/brif/') !== false) {
            get_template_part('single-services_brif');
            exit;
        }
        wp_redirect(get_permalink() . 'brif/');
        exit;
    }
}
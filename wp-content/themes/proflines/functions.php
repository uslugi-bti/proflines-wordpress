<?php

function proflines_enqueue_assets() {
    if (is_front_page()) {
        wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css');
    }
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0');

    if (is_front_page()) {
        wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), null, true);
    }
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.min.js', null, '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'proflines_enqueue_assets');

add_filter( 'upload_mimes', 'svg_upload_allow' );

add_theme_support('title-tag');

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}
	if( $dosvg ){
		if( current_user_can('manage_options') ){
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}
	return $data;
}

/**
 * Generate dynamic JSON-LD structured data
 */
function proflines_json_ld() {
    $json_ld = array();
    
    // JSON-LD for front page
    if (is_front_page()) {
        // Get site URL and name from WordPress settings
        $site_url = get_site_url();
        $site_name = get_bloginfo('name');
        $admin_email = get_bloginfo('admin_email');

        // Get ACF fields from front page
        $front_page_id = get_option('page_on_front');
        
        // Get all necessary fields
        $legal_name = get_field('legal_name', $front_page_id);
        $telephone = get_field('telephone', $front_page_id);
        $description = get_field('description', $front_page_id);
        $price_range = get_field('price_range', $front_page_id);
        $street_address = get_field('street_address', $front_page_id);
        $address_locality = get_field('address_locality', $front_page_id);
        $postal_code = get_field('postal_code', $front_page_id);
        $address_country = get_field('address_country', $front_page_id);
        $vat_id = get_field('vat_id', $front_page_id);
        $tax_id = get_field('tax_id', $front_page_id);
        $logo = get_field('logo', $front_page_id);
        $facebook = get_field('link_to_facebook', $front_page_id);
        $instagram = get_field('link_to_instagram', $front_page_id);
        $linkedin = get_field('link_to_linkedin', $front_page_id);

        // Build sameAs array (only add if URLs exist)
        $same_as = array();
        if ($facebook) $same_as[] = $facebook;
        if ($instagram) $same_as[] = $instagram;
        if ($linkedin) $same_as[] = $linkedin;

        // Get FAQ items
        $faq_items = get_field('faq_items', $front_page_id);
        $faq_entities = array();
        
        if ($faq_items) {
            foreach ($faq_items as $item) {
                $faq_entities[] = array(
                    "@type" => "Question",
                    "name" => $item['question'],
                    "acceptedAnswer" => array(
                        "@type" => "Answer",
                        "text" => $item['answer']
                    )
                );
            }
        }

        // Construct the front page JSON-LD
        $front_page_json = array(
            "@context" => "https://schema.org",
            "@graph" => array(
                // Organization data
                array(
                    "@type" => "ProfessionalService",
                    "@id" => $site_url . "/#organization",
                    "name" => $site_name,
                    "legalName" => $legal_name ?: $site_name,
                    "url" => $site_url,
                    "logo" => $logo ?: $site_url . "/logo.png",
                    "email" => $admin_email,
                    "telephone" => $telephone,
                    "description" => $description,
                    "priceRange" => $price_range,
                    "address" => array(
                        "@type" => "PostalAddress",
                        "streetAddress" => $street_address,
                        "addressLocality" => $address_locality,
                        "postalCode" => $postal_code,
                        "addressCountry" => $address_country ?: "SK"
                    ),
                    "contactPoint" => array(
                        "@type" => "ContactPoint",
                        "telephone" => $telephone,
                        "contactType" => "customer service",
                        "email" => $admin_email
                    ),
                    "vatID" => $vat_id,
                    "taxID" => $tax_id,
                ),
                // FAQ data (only if there are FAQ items)
                !empty($faq_entities) ? array(
                    "@type" => "FAQPage",
                    "mainEntity" => $faq_entities
                ) : null
            )
        );

        // Filter out null values
        $front_page_json['@graph'] = array_filter($front_page_json['@graph']);

        // Add sameAs only if not empty
        if (!empty($same_as)) {
            $front_page_json['@graph'][0]['sameAs'] = $same_as;
        }

        $json_ld[] = $front_page_json;
    }
    
    // JSON-LD for blog archive page (using specific page ID)
    if (is_page(242)) {
        $blog_page_id = get_option('page_for_posts');
        $front_page_id = get_option('page_on_front');
        
        // Get blog-specific fields
        $blog_json_ld_name = get_field('blog_json_ld_name', $blog_page_id);
        $blog_json_ld_description = get_field('blog_json_ld_description', $blog_page_id);
        
        // Get organization data from front page
        $legal_name = get_field('legal_name', $front_page_id);
        $logo = get_field('logo', $front_page_id);
        
        $blog_json = array(
            "@context" => "https://schema.org",
            "@type" => "CollectionPage",
            "name" => $blog_json_ld_name ?: ('Blog | ' . get_bloginfo('name')),
            "url" => get_permalink($blog_page_id),
            "description" => $blog_json_ld_description ?: get_bloginfo('description'),
            "provider" => array(
                "@type" => "Organization",
                "name" => $legal_name ?: get_bloginfo('name'),
                "logo" => $logo ?: get_site_url() . '/logo.png'
            )
        );
        
        $json_ld[] = $blog_json;
    }
    
    // JSON-LD for single blog posts
    if (is_singular('post') && has_category('blog')) {
        $front_page_id = get_option('page_on_front');
        
        // Get post data
        $post_id = get_the_ID();
        $headline = get_the_title($post_id);
        
        // Get content and strip tags for description, limit to ~160 characters
        $content = get_the_content($post_id);
        $description = wp_trim_words(strip_tags($content), 25, '...');
        
        // Get featured image
        $image = get_the_post_thumbnail_url($post_id, 'full');
        
        // Get author data (using default team info)
        $author_name = 'ProfLines Team';
        $author_url = home_url('/o-nas');
        
        // Get organization data from front page
        $legal_name = get_field('legal_name', $front_page_id);
        $logo = get_field('logo', $front_page_id);
        
        // Get post dates
        $date_published = get_the_date('Y-m-d', $post_id);
        $date_modified = get_the_modified_date('Y-m-d', $post_id);
        
        $post_json = array(
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "headline" => $headline,
            "description" => $description,
            "image" => $image ?: '',
            "author" => array(
                "@type" => "Person",
                "name" => $author_name,
                "url" => $author_url
            ),
            "publisher" => array(
                "@type" => "Organization",
                "name" => $legal_name ?: get_bloginfo('name'),
                "logo" => array(
                    "@type" => "ImageObject",
                    "url" => $logo ?: get_site_url() . '/logo.png'
                )
            ),
            "datePublished" => $date_published,
            "dateModified" => $date_modified,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id" => get_permalink($post_id)
            )
        );
        
        $json_ld[] = $post_json;
    }

    return $json_ld;
}

function proflines_output_json_ld() {
    $json_ld_array = proflines_json_ld();
    
    if (!empty($json_ld_array)) {
        foreach ($json_ld_array as $json_ld) {
            echo '<script type="application/ld+json">' . "\n" . wp_json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n" . '</script>';
        }
    }
}
add_action('wp_head', 'proflines_output_json_ld');

add_theme_support( 'post-thumbnails' );

function proflines_add_rewrite_rules() {
    add_rewrite_rule(
        '^services/([^/]+)/brif/?$',
        'index.php?service_slug=$matches[1]&service_brief=1',
        'top'
    );
    
    add_rewrite_rule(
        '^services/([^/]+)/?$',
        'index.php?service_slug=$matches[1]&service_brief=0',
        'top'
    );
}
add_action('init', 'proflines_add_rewrite_rules');

function proflines_add_query_vars($vars) {
    $vars[] = 'service_slug';
    $vars[] = 'service_brief';
    return $vars;
}
add_filter('query_vars', 'proflines_add_query_vars');

function proflines_service_template_redirect() {
    $service_slug = get_query_var('service_slug');
    $is_brief = get_query_var('service_brief');
    
    if (!$service_slug) {
        return;
    }
    
    $service = get_page_by_path($service_slug, OBJECT, 'services');
    
    if (!$service) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        include get_template_directory() . '/404.php';
        exit;
    }
    
    $is_secondary = has_category('ina-sluzba', $service);
    
    if ($is_brief) {
        include get_template_directory() . '/service-brief.php';
        exit;
    } else {
        if ($is_secondary) {
            wp_redirect(home_url('/services/' . $service_slug . '/brif/'));
            exit;
        } else {
            include get_template_directory() . '/single-service.php';
            exit;
        }
    }
}
add_action('template_redirect', 'proflines_service_template_redirect');

function proflines_single_template($template) {
    if (is_singular('post')) {
        if (in_category('blog')) {
            return get_template_directory() . '/single-blog.php';
        }
    }
    return $template;
}
add_filter('single_template', 'proflines_single_template');
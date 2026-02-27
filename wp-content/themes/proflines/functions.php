<?php

function proflines_enqueue_assets() {
    if (is_front_page()) {
        wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css');
    }
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0');

    if (is_front_page()) {
        wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), null, true);
    }
    if (is_single(298)) {
        wp_enqueue_script('chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js', array(), null, true);
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

function proflines_json_ld() {
    $json_ld = array();
    
    if (is_front_page()) {
        $site_url = get_site_url();
        $site_name = get_bloginfo('name');
        $admin_email = get_bloginfo('admin_email');
        $front_page_id = get_option('page_on_front');
        
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

        $same_as = array();
        if ($facebook) $same_as[] = $facebook;
        if ($instagram) $same_as[] = $instagram;
        if ($linkedin) $same_as[] = $linkedin;

        $faq_items = get_field('faq_items', $front_page_id);
        $faq_entities = array();
        
        if ($faq_items && is_array($faq_items)) {
            foreach ($faq_items as $item) {
                if (is_array($item) && isset($item['question']) && isset($item['answer'])) {
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
        }

        $front_page_json = array(
            "@context" => "https://schema.org",
            "@graph" => array(
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
                !empty($faq_entities) ? array(
                    "@type" => "FAQPage",
                    "mainEntity" => $faq_entities
                ) : null
            )
        );

        $front_page_json['@graph'] = array_filter($front_page_json['@graph']);

        if (!empty($same_as)) {
            $front_page_json['@graph'][0]['sameAs'] = $same_as;
        }

        $json_ld[] = $front_page_json;
    }

    if (is_singular('post') && has_category('services') && has_category('ina-sluzba')) {
        $post_id = get_the_ID();
        
        $front_page_id = get_option('page_on_front');
        $legal_name = get_field('legal_name', $front_page_id) ?: get_bloginfo('name');
        $site_url = get_site_url();
        
        $service_type = get_field('service_type', $post_id);
        $category = get_field('category', $post_id);
        
        $service_json = array(
            "@context" => "https://schema.org",
            "@type" => "Service",
            "name" => get_the_title(),
            "serviceType" => $service_type ?: "SEO & AI Optimization",
            "category" => $category ?: "Digital Marketing Services",
            "url" => get_permalink(),
            "description" => wp_trim_words(strip_tags(get_the_content()), 30, '...'),
            "provider" => array(
                "@type" => "Organization",
                "name" => $legal_name,
                "url" => $site_url
            ),
            "areaServed" => array(
                "@type" => "Country",
                "name" => "Slovakia",
                "identifier" => "SK"
            ),
            "offers" => array(
                "@type" => "Offer",
                "availability" => "https://schema.org/InStock",
                "priceCurrency" => "EUR",
                "priceSpecification" => array(
                    "@type" => "PriceSpecification",
                    "priceCurrency" => "EUR",
                    "name" => "Cena na vyžiadanie"
                )
            ),
            "potentialAction" => array(
                "@type" => "QuoteAction",
                "target" => array(
                    "@type" => "EntryPoint",
                    "urlTemplate" => get_permalink()
                )
            )
        );
        
        $json_ld[] = $service_json;
    }
    
    if (is_page(2979)) {
        $front_page_id = get_option('page_on_front');
        $current_url = get_permalink();
        $site_url = get_site_url();
        $site_name = get_bloginfo('name');
        $admin_email = get_bloginfo('admin_email');
        
        $legal_name = get_field('legal_name', $front_page_id) ?: 'ProfLines s.r.o.';
        $telephone = get_field('telephone', $front_page_id);
        $logo = get_field('logo', $front_page_id) ?: $site_url . '/logo.png';
        $street_address = get_field('street_address', $front_page_id);
        $address_locality = get_field('address_locality', $front_page_id) ?: 'Bratislava';
        $postal_code = get_field('postal_code', $front_page_id);
        $address_country = get_field('address_country', $front_page_id) ?: 'SK';
        $operation_address = get_field('operation_address', $front_page_id);
        $vat_id = get_field('vat_id', $front_page_id);
        $tax_id = get_field('tax_id', $front_page_id);
        $company_registration = get_field('company_registration', $front_page_id);
        $facebook = get_field('link_to_facebook', $front_page_id);
        $instagram = get_field('link_to_instagram', $front_page_id);
        $linkedin = get_field('link_to_linkedin', $front_page_id);

        $same_as = array();
        if ($facebook) $same_as[] = $facebook;
        if ($instagram) $same_as[] = $instagram;
        if ($linkedin) $same_as[] = $linkedin;

        $contact_page_json = array(
            "@context" => "https://schema.org",
            "@type" => "ContactPage",
            "name" => "Kontakt | " . $site_name,
            "url" => $current_url,
            "description" => "Kontaktujte " . $site_name . ". Sme tu pre vás.",
            "mainEntity" => array(
                "@type" => "ProfessionalService",
                "name" => $site_name,
                "legalName" => $legal_name,
                "logo" => $logo,
                "url" => $site_url,
                "email" => $admin_email,
                "telephone" => $telephone,
                "vatID" => $vat_id,
                "taxID" => $tax_id,
                "address" => array(
                    "@type" => "PostalAddress",
                    "streetAddress" => $street_address,
                    "addressLocality" => $address_locality,
                    "postalCode" => $postal_code,
                    "addressCountry" => $address_country
                ),
                "contactPoint" => array(
                    "@type" => "ContactPoint",
                    "telephone" => $telephone,
                    "contactType" => "customer service",
                    "email" => $admin_email
                )
            )
        );

        if (!empty($same_as)) {
            $contact_page_json['mainEntity']['sameAs'] = $same_as;
        }

        if ($operation_address) {
            $contact_page_json['mainEntity']['location'] = array(
                "@type" => "Place",
                "address" => array(
                    "@type" => "PostalAddress",
                    "streetAddress" => $operation_address,
                    "addressLocality" => $address_locality,
                    "addressCountry" => $address_country
                )
            );
        }

        if ($company_registration) {
            $contact_page_json['mainEntity']['description'] = $company_registration;
        }

        $json_ld[] = $contact_page_json;
    }
    
    if (is_page(242)) {
        $blog_page_id = get_option('page_for_posts');
        $front_page_id = get_option('page_on_front');
        
        $blog_json_ld_name = get_field('blog_json_ld_name', $blog_page_id);
        $blog_json_ld_description = get_field('blog_json_ld_description', $blog_page_id);
        
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
    
    if (is_singular('post') && has_category('blog')) {
        $front_page_id = get_option('page_on_front');
        
        $post_id = get_the_ID();
        $headline = get_the_title($post_id);
        
        $content = get_the_content($post_id);
        $description = wp_trim_words(strip_tags($content), 25, '...');
        
        $image = get_the_post_thumbnail_url($post_id, 'full');
        
        $author_name = 'ProfLines Team';
        $author_url = home_url('/o-nas');
        
        $legal_name = get_field('legal_name', $front_page_id);
        $logo = get_field('logo', $front_page_id);
        
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

    if (is_singular('post') && has_category('services') && !has_category('ina-sluzba')) {
        $post_id = get_the_ID();
        
        $front_page_id = get_option('page_on_front');
        $legal_name = get_field('legal_name', $front_page_id) ?: get_bloginfo('name');
        $site_url = get_site_url();
        
        $service_json_ld = get_field('service_json_ld', $post_id);
        $faq_items = get_field('faq_items', $post_id);
        
        $service_type = get_field('service_type', $post_id);
        $category = get_field('category', $post_id);
        $catalog_name = get_field('catalog_name', $post_id);
        
        $packages = get_field('packages_items', $post_id);
        
        $offers = array();
        
        if (is_array($packages) && !empty($packages)) {
            foreach ($packages as $package) {
                if (isset($package['name'])) {
                    
                    $description = '';
                    if (isset($package['features']) && is_array($package['features'])) {
                        $features = array();
                        foreach ($package['features'] as $feature) {
                            if (isset($feature['feature'])) {
                                $features[] = $feature['feature'];
                            }
                        }
                        $description = implode(', ', $features);
                    }
                    
                    if (empty($description) && isset($package['description'])) {
                        $description = $package['description'];
                    }
                    if ($package['price'] == "") {
                        $offers[] = array(
                        "@type" => "Offer",
                            "name" => $package['name'],
                            "priceCurrency" => "EUR",
                            "availability" => "https://schema.org/InStock",
                            "description" => $description
                        );
                    } else {
                        $offers[] = array(
                        "@type" => "Offer",
                            "name" => $package['name'],
                            "price" => strval($package['price']),
                            "priceCurrency" => "EUR",
                            "availability" => "https://schema.org/InStock",
                            "description" => $description
                        );
                    }
                }
            }
        }
        
        $faq_entities = array();
        if ($faq_items && is_array($faq_items)) {
            foreach ($faq_items as $item) {
                if (is_array($item) && isset($item['question']) && isset($item['answer'])) {
                    $faq_entities[] = array(
                        "@type" => "Question",
                        "name" => $item['question'],
                        "acceptedAnswer" => array(
                            "@type" => "Answer",
                            "text" => wp_strip_all_tags($item['answer'])
                        )
                    );
                }
            }
        }
        
        $service_data = array(
            "@type" => "Service",
            "serviceType" => $service_type ?: "Market Research",
            "name" => get_the_title(),
            "url" => get_permalink(),
            "description" => wp_trim_words(strip_tags(get_the_content()), 30, '...'),
            "areaServed" => array(
                "@type" => "Country",
                "name" => "Slovakia"
            ),
            "provider" => array(
                "@type" => "Organization",
                "name" => $legal_name,
                "url" => $site_url
            )
        );
        
        if (!empty($category)) {
            $service_data['category'] = $category;
        }
        
        if (is_array($service_json_ld)) {
            if (isset($service_json_ld['name']) && !empty($service_json_ld['name'])) {
                $service_data['name'] = $service_json_ld['name'];
            }
            if (isset($service_json_ld['url']) && !empty($service_json_ld['url'])) {
                $service_data['url'] = $service_json_ld['url'];
            }
            if (isset($service_json_ld['description']) && !empty($service_json_ld['description'])) {
                $service_data['description'] = $service_json_ld['description'];
            }
        }
        
        if (!empty($offers)) {
            $service_data['hasOfferCatalog'] = array(
                "@type" => "OfferCatalog",
                "name" => $catalog_name ?: "Balíky prieskumu trhu",
                "itemListElement" => $offers
            );
        }
        
        $graph = array($service_data);
        
        if (!empty($faq_entities)) {
            $graph[] = array(
                "@type" => "FAQPage",
                "mainEntity" => $faq_entities
            );
        }
        
        $service_json = array(
            "@context" => "https://schema.org",
            "@graph" => $graph
        );
        
        $json_ld[] = $service_json;
    }
    
    if (is_page(2532)) {
        $post_id = get_the_ID();
        $mistake_categories = get_field('mistake_categories', $post_id);
        
        if ($mistake_categories && is_array($mistake_categories)) {
            $faq_entities = array();
            
            $counter = 1;
            foreach ($mistake_categories as $category) {
                if (isset($category['mistakes_list']) && is_array($category['mistakes_list'])) {
                    foreach ($category['mistakes_list'] as $mistake) {
                        if (isset($mistake['mistake_name']) && isset($mistake['mistake_description_error']['error_text']) && isset($mistake['mistake_description_solution']['solution_text'])) {
                            
                            $question = "Chyba č. " . $counter . ": " . $mistake['mistake_name'];
                            
                            $answer = "<strong>Chyba:</strong> " . $mistake['mistake_description_error']['error_text'] . " <strong>Riešenie:</strong> " . $mistake['mistake_description_solution']['solution_text'];
                            
                            $faq_entities[] = array(
                                "@type" => "Question",
                                "name" => $question,
                                "acceptedAnswer" => array(
                                    "@type" => "Answer",
                                    "text" => wp_strip_all_tags($answer)
                                )
                            );
                            
                            $counter++;
                        }
                    }
                }
            }
            
            if (!empty($faq_entities)) {
                $mistakes_json = array(
                    "@context" => "https://schema.org",
                    "@type" => "FAQPage",
                    "mainEntity" => $faq_entities
                );
                
                $json_ld[] = $mistakes_json;
            }
        }
    }

    if (is_page(2589)) {
        $post_id = get_the_ID();
        $general_items = get_field('general_faq_items', $post_id);
        
        $service_ids = array(1763, 1388, 1932, 198, 2354);
        $all_faq_entities = array();
        
        if ($general_items && is_array($general_items)) {
            foreach ($general_items as $item) {
                if (isset($item['question']) && isset($item['answer'])) {
                    $all_faq_entities[] = array(
                        "@type" => "Question",
                        "name" => $item['question'],
                        "acceptedAnswer" => array(
                            "@type" => "Answer",
                            "text" => wp_strip_all_tags($item['answer'])
                        )
                    );
                }
            }
        }
        
        foreach ($service_ids as $service_id) {
            $service_items = get_field('faq_items', $service_id);
            if ($service_items && is_array($service_items)) {
                foreach ($service_items as $item) {
                    if (isset($item['question']) && isset($item['answer'])) {
                        $all_faq_entities[] = array(
                            "@type" => "Question",
                            "name" => $item['question'],
                            "acceptedAnswer" => array(
                                "@type" => "Answer",
                                "text" => wp_strip_all_tags($item['answer'])
                            )
                        );
                    }
                }
            }
        }
        
        if (!empty($all_faq_entities)) {
            $faq_json = array(
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => $all_faq_entities
            );
            
            $json_ld[] = $faq_json;
        }
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

function add_brif_rewrite_rules() {
    add_rewrite_rule(
        '^services/([^/]+)/brif/?$',
        'index.php?name=$matches[1]&brif=1',
        'top'
    );
}
add_action('init', 'add_brif_rewrite_rules');

function add_brif_query_var($vars) {
    $vars[] = 'brif';
    return $vars;
}
add_filter('query_vars', 'add_brif_query_var');

function brif_template_include($template) {
    if (get_query_var('brif') == 1) {
        $new_template = locate_template(array('single-services_brif.php'));
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'brif_template_include');

function redirect_services_archive_to_home() {
    if (is_category('services') || is_category(get_cat_ID('services'))) {
        wp_redirect(home_url(), 301);
        exit;
    }

    if (strpos($_SERVER['REQUEST_URI'], '/services/') === 0 && !is_single()) {
        $request_uri = $_SERVER['REQUEST_URI'];
        
        if ($request_uri === '/services/' || $request_uri === '/services') {
            wp_redirect(home_url(), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'redirect_services_archive_to_home');
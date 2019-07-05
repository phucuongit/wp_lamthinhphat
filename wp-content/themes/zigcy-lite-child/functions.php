<?php
/** UPDATE JQUERY VERSION */

function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js", array(), NULL );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

add_action('wp_enqueue_scripts', 'zigcy_lite_child_enqueue_styles');
function zigcy_lite_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('app-css', get_stylesheet_directory_uri() . '/assets/css/app.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('app-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get('Version'));
    wp_enqueue_style('google-font', "https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=vietnamese", array(),NULL);

}




if (!function_exists('remove_tab_review')) {
	function remove_tab_review($tabs)
	{
		unset($tabs['reviews']);
		return $tabs;
	}
	add_filter('woocommerce_product_tabs', 'remove_tab_review');
}

/********* THAY ĐỔI FORM THÔNG TIN GIAO HÀNG ***********/
add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_form' );
function custom_checkout_form( $fields ) {
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_last_name']);

    $fields['billing']['billing_first_name'] = array(
    'label' => 'Họ và Tên',
    'placeholder' => 'Ví dụ: Nguyễn Trung Trực',
    'required'  => true,
    );
	
    $fields['billing']['billing_phone'] = array(
    'label' => 'Số điện thoại',
    'placeholder' => 'Ví dụ: 0988286818',
    'required'  => true,
    );

    $fields['billing']['billing_address_1'] = array(
    'label' => 'Địa chỉ giao hàng',
    'placeholder' => 'Ví dụ: Số 18 Ngõ 86 Phú Kiều, Bắc Từ Liêm, Hà Nội',
    'required'  => true,
    );
	$fields['billing']['billing_state'] = array(
		'label'	=> 'Quận/Huyện/Khu vực',
		'required'	=> true,
		'priority'	=> 70,
	);

    $fields['order']['order_comments'] = array(
    'label' => 'Ghi chú',
    'placeholder' => 'Ví dụ: giao hàng trước 17h',
    'required'  => false,
    );

    return $fields;
}
/********* THÊM CÁC TỈNH THÀNH PHỐ WOOCOMMERCE ***********/


/**
 * Change the checkout city field to a dropdown field.
 */
function jeroen_sormani_change_city_to_dropdown( $fields ) {
	$city_args = wp_parse_args( array(
		'type' => 'select',
		'options' => array(
			'Cần Thơ' => __('Cần Thơ', 'woocommerce') ,
    'Hồ Chí Minh' => __('Hồ Chí Minh', 'woocommerce') ,
    'Hà Nội' => __('Hà Nội', 'woocommerce') ,
    'Hải Phòng' => __('Hải Phòng', 'woocommerce') ,
    'Đà Nẵng' => __('Đà Nẵng', 'woocommerce') ,
    'An Giang' => __('An Giang', 'woocommerce') ,
    'Bà Rịa - Vũng Tàu' => __('Bà Rịa - Vũng Tàu', 'woocommerce') ,
    'Bạc Liêu' => __('Bạc Liêu', 'woocommerce') ,
    'Bắc Kạn' => __('Bắc Kạn', 'woocommerce') ,
    'Bắc Ninh' => __('Bắc Ninh', 'woocommerce') ,
    'Bắc Giang' => __('Bắc Giang', 'woocommerce') ,
    'Bến Tre' => __('Bến Tre', 'woocommerce') ,
    'Bình Dương' => __('Bình Dương', 'woocommerce') ,
    'Bình Định' => __('Bình Định', 'woocommerce') ,
    'Bình Phước' => __('Bình Phước', 'woocommerce') ,
    'Bình Phước' => __('Bình Thuận', 'woocommerce'),
    'Cà Mau' => __('Cà Mau', 'woocommerce'),
    'Đak Lak' => __('Đak Lak', 'woocommerce'),
    'Đak Nông' => __('Đak Nông', 'woocommerce'),
    'Điện Biên' => __('Điện Biên', 'woocommerce'),
    'Đồng Nai' => __('Đồng Nai', 'woocommerce'),
    'Gia Lai' => __('Gia Lai', 'woocommerce'),
    'Hà Giang' => __('Hà Giang', 'woocommerce'),
    'Hà Nam' => __('Hà Nam', 'woocommerce'),
    'Hà Tĩnh' => __('Hà Tĩnh', 'woocommerce'),
    'Hải Dương' => __('Hải Dương', 'woocommerce'),
    'Hậu Giang' => __('Hậu Giang', 'woocommerce'),
    'Hòa Bình' => __('Hòa Bình', 'woocommerce'),
    'Hưng Yên' => __('Hưng Yên', 'woocommerce'),
    'Khánh Hòa' => __('Khánh Hòa', 'woocommerce'),
    'Kiên Giang' => __('Kiên Giang', 'woocommerce'),
    'Kom Tum' => __('Kom Tum', 'woocommerce'),
    'Lai Châu' => __('Lai Châu', 'woocommerce'),
    'Lâm Đồng' => __('Lâm Đồng', 'woocommerce'),
    'Lạng Sơn' => __('Lạng Sơn', 'woocommerce'),
    'Lào Cai' => __('Lào Cai', 'woocommerce'),
    'Long An' => __('Long An', 'woocommerce'),
    'Nam Định' => __('Nam Định', 'woocommerce'),
    'Nghệ An' => __('Nghệ An', 'woocommerce'),
    'Ninh Bình' => __('Ninh Bình', 'woocommerce'),
    'Ninh Thuận' => __('Ninh Thuận', 'woocommerce'),
    'Phú Thọ' => __('Phú Thọ', 'woocommerce'),
    'Phú Yên' => __('Phú Yên', 'woocommerce'),
    'Quảng Bình' => __('Quảng Bình', 'woocommerce'),
    'Quảng Nam' => __('Quảng Nam', 'woocommerce'),
    'Quảng Ngãi' => __('Quảng Ngãi', 'woocommerce'),
    'Quảng Ninh' => __('Quảng Ninh', 'woocommerce'),
    'Quảng Trị' => __('Quảng Trị', 'woocommerce'),
    'Sóc Trăng' => __('Sóc Trăng', 'woocommerce'),
    'Sơn La' => __('Sơn La', 'woocommerce'),
    'Tây Ninh' => __('Tây Ninh', 'woocommerce'),
    'Thái Bình' => __('Thái Bình', 'woocommerce'),
    'Thái Nguyên' => __('Thái Nguyên', 'woocommerce'),
    'Thanh Hóa' => __('Thanh Hóa', 'woocommerce'),
    'Thừa Thiên - Huế' => __('Thừa Thiên - Huế', 'woocommerce'),
    'Tiền Giang' => __('Tiền Giang', 'woocommerce'),
    'Trà Vinh' => __('Trà Vinh', 'woocommerce'),
    'Tuyên Quang' => __('Tuyên Quang', 'woocommerce'),
    'Vĩnh Long' => __('Vĩnh Long', 'woocommerce'),
    'Vĩnh Phúc' => __('Vĩnh Phúc', 'woocommerce'),
    'Yên Bái' => __('Yên Bái', 'woocommerce'),
		),
		'input_class' => array(
			'wc-enhanced-select',
		)
	), $fields['shipping']['shipping_city'] );
	$fields['shipping']['shipping_city'] = $city_args;
	$fields['billing']['billing_city'] = $city_args; // Also change for billing field
	wc_enqueue_js( "
	jQuery( ':input.wc-enhanced-select' ).filter( ':not(.enhanced)' ).each( function() {
		var select2_args = { minimumResultsForSearch: 5 };
		jQuery( this ).select2( select2_args ).addClass( 'enhanced' );
	});" );
	return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'jeroen_sormani_change_city_to_dropdown' );

/* DỊCH TỪ WOOCOMMERCE CHUNG */
function translate_text_strings( $translated_text, $text, $domain ) {
	switch($translated_text){
		case 'Search':
			$translated_text = __( 'Tìm kiếm', 'woocommerce' );
            break;
        case 'Lựa chọn các tùy chọn':
			$translated_text = __( 'Xem sản phẩm', 'woocommerce' );
            break;
        case 'Đọc tiếp':
			$translated_text = __( 'Xem sản phẩm', 'woocommerce' );
            break;
        case 'Rấ tiếc, phiên truy cập của bạn đã hết hạn. ':
			$translated_text = __( 'Rất tiếc, phiên truy cập của bạn đã hết hạn. ', 'woocommerce' );
            break;
        case 'Compare':
			$translated_text = __( 'So sánh', 'woocommerce' );
            break;
	}
	return $translated_text;
}
add_filter('gettext', 'translate_text_strings', 20, 3);
/* DỊCH TỪ WOOCOMMERCE KHÔNG DỊCH ĐƯỢC */
function ra_change_translate_text_multiple( $translated ) {
    $text = array(
        'Subtotal' => 'Tổng cộng',
        'Tổng' => 'Thành tiền',
        'Thành tiền cộng' => 'Tổng cộng',
        'Thành tiền số phụ:' => 'Tổng cộng :',
        'Tổng cộng:' => 'Thành tiền :',
        'Cám ơn!' => '',
        'Cảm ơn đã đọc.' => '',
        'Thuế VAT:' => 'thuế VAT :',
        'Lưu ý:' => 'Lưu ý :',
        'Note:' => 'Lưu ý :',
        'Tạm tính:' => 'Tổng cộng',
    );
    $translated = str_ireplace( array_keys($text), $text, $translated );
    return $translated;
}
/**
 * Change a currency symbol
 */

/* THAY ĐỔI TIỀN VIỆT NAM ĐỒNG */
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'VND': $currency_symbol = ' đ'; break;
     }
     return $currency_symbol;
}
 
/* XÁC THỰC SỐ ĐIỆN THOẠI TẠI PAGE CHECK OUT */
add_action('woocommerce_checkout_process', 'devvn_validate_phone_field_process' );
function devvn_validate_phone_field_process() {
   
    $billing_phone = filter_input(INPUT_POST, 'billing_phone');
    if ( ! (preg_match('/^(0[35789]|09)[0-9]{8}$/', $billing_phone )) && !empty( $billing_phone )){
        wc_add_notice( "Xin nhập đúng <strong>số điện thoại</strong> của bạn"  ,'error' );
    }
    $billing_first_name = filter_input(INPUT_POST, 'billing_first_name');

    if ( (preg_match('/[0-9]+/', $billing_first_name )) && !empty( $billing_first_name ) ){
        wc_add_notice( "Xin nhập đúng <strong>họ và tên</strong> của bạn"  ,'error' );
    }

    $billing_email = filter_input(INPUT_POST, 'billing_email');

    if ( (preg_match("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/", $billing_email )) && !empty( $billing_email ) ){
        wc_add_notice( "Xin nhập đúng <strong>địa chỉ email</strong> của bạn"  ,'error' );
    }
}



/** TẠO THEME OPTION */

if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
		'page_title' 	=> 'Thiết lập giao diện',
		'menu_title'	=> 'Thiết lập giao diện',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDCLRdxYB3egnDTvXBwnATl3WM3tpcBBEc');
}

add_action('acf/init', 'my_acf_init');

/** TẠO SHORTCODE HIỂN THỊ GOOGLEMAP PAGE CONTACT */
function create_footer_two(){

    $location = get_field('google_map', 'option');
    
			$html = '';
    		$html .= '<div class="acf-map">';
        	$html .= '<div class="marker" data-lat="'. $location['lat'].'" data-lng="'. $location['lng'] .'"></div>';
			$html .= '</div>'
			?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCLRdxYB3egnDTvXBwnATl3WM3tpcBBEc"></script>   
            <script type="text/javascript">
                (function($) {

                /*
                *  new_map
                *
                *  This function will render a Google Map onto the selected jQuery element
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	4.3.0
                *
                *  @param	$el (jQuery element)
                *  @return	n/a
                */

                function new_map( $el ) {
                    
                    // var
                    var $markers = $el.find('.marker');
                    
                    
                    // vars
                    var args = {
                        zoom		: 16,
                        center		: new google.maps.LatLng(0, 0),
                        mapTypeId	: google.maps.MapTypeId.ROADMAP
                    };
                    
                    
                    // create map	        	
                    var map = new google.maps.Map( $el[0], args);
                    
                    
                    // add a markers reference
                    map.markers = [];
                    
                    
                    // add markers
                    $markers.each(function(){
                        
                        add_marker( $(this), map );
                        
                    });
                    
                    
                    // center map
                    center_map( map );
                    
                    
                    // return
                    return map;
                    
                }

                /*
                *  add_marker
                *
                *  This function will add a marker to the selected Google Map
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	4.3.0
                *
                *  @param	$marker (jQuery element)
                *  @param	map (Google Map object)
                *  @return	n/a
                */

                function add_marker( $marker, map ) {

                    // var
                    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                    // create marker
                    var marker = new google.maps.Marker({
                        position	: latlng,
                        map			: map
                    });

                    // add to array
                    map.markers.push( marker );

                    // if marker contains HTML, add it to an infoWindow
                    if( $marker.html() )
                    {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content		: $marker.html()
                        });

                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function() {

                            infowindow.open( map, marker );

                        });
                    }

                }

                /*
                *  center_map
                *
                *  This function will center the map, showing all markers attached to this map
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	4.3.0
                *
                *  @param	map (Google Map object)
                *  @return	n/a
                */

                function center_map( map ) {

                    // vars
                    var bounds = new google.maps.LatLngBounds();

                    // loop through all markers and create bounds
                    $.each( map.markers, function( i, marker ){

                        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                        bounds.extend( latlng );

                    });

                    // only 1 marker?
                    if( map.markers.length == 1 )
                    {
                        // set center of map
                        map.setCenter( bounds.getCenter() );
                        map.setZoom( 16 );
                    }
                    else
                    {
                        // fit to bounds
                        map.fitBounds( bounds );
                    }

                }

                /*
                *  document ready
                *
                *  This function will render each map when the document is ready (page has loaded)
                *
                *  @type	function
                *  @date	8/11/2013
                *  @since	5.0.0
                *
                *  @param	n/a
                *  @return	n/a
                */
                // global var
                var map = null;

                $(document).ready(function(){

                    $('.acf-map').each(function(){

                        // create map
                        map = new_map( $(this) );

                    });

                });

            })(jQuery);
			</script>
		<?php
    return $html;
}
add_shortcode('SHOW_GOOGLEMAP', 'create_footer_two');

/* THAY ĐỔI 0đ THÀNH LIÊN HỆ*/
function vbk_wc_custom_get_price_html( $price, $product ) {
    if ( $product->get_price() == 0 ) { 

        if ( $product->is_on_sale() && $product->get_regular_price() ) {
            $regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );

            $price = wc_format_price_range( $regular_price, __( 'Free!', 'woocommerce' ) );
        } else {
            $price = '<span class="amount">' . __( 'Liên hệ', 'woocommerce' ) . '</span>'; 
            
   
        }
    }
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'vbk_wc_custom_get_price_html', 10, 2 );



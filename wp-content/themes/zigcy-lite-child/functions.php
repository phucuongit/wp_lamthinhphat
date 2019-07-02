<?php
add_action('wp_enqueue_scripts', 'zigcy_lite_child_enqueue_styles');
function zigcy_lite_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('app-css', get_stylesheet_directory_uri() . '/assets/css/app.css', array(), wp_get_theme()->get('Version'));
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
// add_filter( 'woocommerce_states', 'vietnam_cities_woocommerce' );
// function vietnam_cities_woocommerce( $states ) {
//   $states['VN'] = array(
    
//   );

//   return $states;
// }

// Copy from here
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
	}
	return $translated_text;
}
add_filter('gettext', 'translate_text_strings', 20, 3);
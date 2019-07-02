<?php
add_action('wp_enqueue_scripts', 'zigcy_lite_child_enqueue_styles');
function zigcy_lite_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('app-css', get_stylesheet_directory_uri() . '/assets/css/app.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('app-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get('Version'));
}

/** UPDATE JQUERY VERSION */

function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js", array(), NULL );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );


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
    if ( ! (preg_match('/^(0[35789]|09)[0-9]{8}$/', $billing_phone )) ){
        wc_add_notice( "Xin nhập đúng <strong>số điện thoại</strong> của bạn"  ,'error' );
    }
    $billing_first_name = filter_input(INPUT_POST, 'billing_first_name');
    if ( (preg_match('/[0-9]+/', $billing_first_name )) ){
        wc_add_notice( "Xin nhập đúng <strong>họ và tên</strong> của bạn"  ,'error' );
    }
}

/** CUSTOM ALERT THÔNG BÁO NHẬP SAI PAGE CHECK OUT */

add_action('woocommerce_checkout_process', 'misha_check_if_selected');
 
function misha_check_if_selected() {
  
    // you can add any custom validations here
    if ( empty( $_POST['billing_first_name'] ) ){
        wc_add_notice( 'Xin nhập đúng <strong>họ và tên</strong> của bạn', 'error' );
    }
	if ( empty( $_POST['billing_address_1'] ) ){
        wc_add_notice( 'Xin nhập đúng <strong>địa chỉ giao hàng</strong> của bạn', 'error' );
    }
    if ( empty( $_POST['billing_state'] ) ){
        wc_add_notice( 'Xin nhập đúng <strong>Quận/Huyện/Khu vực</strong> của bạn', 'error' );
    }
    if ( empty( $_POST['billing_email'] ) ){
        wc_add_notice( 'Xin nhập đúng <strong>địa chỉ email</strong> của bạn', 'error' );
    }
 
}

add_action( 'woocommerce_after_checkout_validation', 'misha_one_err', 9999, 2);
 
function misha_one_err( $fields, $errors ){
 
	// if any validation errors
	if( !empty( $errors->get_error_codes() ) ) {
 
		// remove all of them
		foreach( $errors->get_error_codes() as $code ) {
			$errors->remove( $code );
		}
 
		// add our custom one
		//$errors->add( 'validation', 'Please fill the fields!' );
 
	}
 
}
// function wpse_284393_checkout_message( $data, $errors ) {
//     if ( empty( $errors ) ) {
//         return;
//     }

//     $shipping_error = $errors->get_error_message( 'billing' );

//         $errors->remove( 'billing' );
//         $errors->add( 'billing', 'hello' );
// }
// add_action( 'woocommerce_after_checkout_validation', 'wpse_284393_checkout_message' );
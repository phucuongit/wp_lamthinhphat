import { isFulfilled } from "q";

jQuery(function($){
    /** HIỂN THỊ BÁO LỖI KHI NHẬP KHÔNG ĐÚNG PAGE CHECKOUT */
    $('body').on('blur change', '#billing_phone', function(){
        var wrapper = $(this).closest('.form-row');
        // you do not have to removeClass() because Woo do it in checkout.js
        if( !(/^(0[35789]|09)[0-9]{8}$/.test( $(this).val() ) ) ) { // check if contains numbers
            wrapper.removeClass('woocommerce-validated');
            wrapper.addClass('woocommerce-invalid woocommerce-invalid-required-field'); // error
        } else {
            wrapper.addClass('woocommerce-validated'); // success
        }
    });
    $('body').on('blur change', '#billing_first_name', function(){
        var wrapper = $(this).closest('.form-row');
        // you do not have to removeClass() because Woo do it in checkout.js
        if( (/[0-9]+/.test( $(this).val() ) ) ||$(this).val().length == 0 ) { // check if contains numbers
            wrapper.removeClass('woocommerce-validated');
            wrapper.addClass('woocommerce-invalid woocommerce-invalid-required-field'); // error
        } else {
            wrapper.addClass('woocommerce-validated'); // success
        }
    });
    $('body').on('blur change', '#billing_email', function(){
        var wrapper = $(this).closest('.form-row');

        var patt = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
        var result = $(this).val().match(patt);
        // you do not have to removeClass() because Woo do it in checkout.js
        if( !(result) ||$(this).val().length == 0 ) { // check if contains numbers
            wrapper.removeClass('woocommerce-validated');
            wrapper.addClass('woocommerce-invalid woocommerce-invalid-required-field'); // error
        } else {
            wrapper.addClass('woocommerce-validated'); // success
        }
    });
    (function(){
        var widthContainer = $('.container').width();
        var widthWindow = $(window).width();
        var Calmargin = (widthWindow - widthContainer)/2;
        $('.google_map_contact').css({'margin': '0 -' + Calmargin + 'px'});
    })();
    
    $(window).on('resize', function(){
        var widthContainer = $('.container').width();
        var widthWindow = $(window).width();
        var Calmargin = (widthWindow - widthContainer)/2;
        $('.google_map_contact').css({'margin': '0 -' + Calmargin + 'px'});
    });
    $('.header-two .search-form-wrap form.woocommerce-product-search button').html(" ") ;
    $('.sub-toggle').click(function(){
        $(this).next().toggle();
    });
})

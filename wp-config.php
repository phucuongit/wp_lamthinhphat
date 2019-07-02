<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'lamthinhphat' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Bs zl><PnAo+xuva}`~L@!Wp}W9H)!L|cuoEeU7%ss~pKXYB3Hx36h&vhL;KO`&e' );
define( 'SECURE_AUTH_KEY',  'zUfBbhik~pjc6OwBc1z=m~P$Kj^C;KXT{SBl3G<nld9U8t2T3#&C|0$meEbZNZY)' );
define( 'LOGGED_IN_KEY',    'La}<aISC`#[uBL56gKefJ_)7,yB4mIn>%[_lpi=,WqO/8A?L>3cd-rof^ocA%OO}' );
define( 'NONCE_KEY',        'qwJ q,HxmL<5knH6bF>%Zjv(N#GfRt`sDf!L$tGM>0qzl>%~,R3kEHe+?ef8w2 T' );
define( 'AUTH_SALT',        'y>}goA>0/O7j onQ6MerX49 oX{|FTW?X;S&PMcx,_683vGRZH4J50J`~t9B39lQ' );
define( 'SECURE_AUTH_SALT', 'yImH1MJ0^EYSM-|&QZeNs:YY*0$xVt1P!WXXF0LX=64^{`Cn,9B|KYdQ04F$lU:3' );
define( 'LOGGED_IN_SALT',   'wYxu@sbd**s&4(H3g*=)PhC7e&10XyTF{K2C9|Hs|qd`V@N;Om-D/V|uH3~=QgA<' );
define( 'NONCE_SALT',       'PH=2%`;Cf/$,U%jX!uFzmy&`GJ{k>[MyBs_/]clH3cxRE>Fd~]glHyeZ@L^dt!3c' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

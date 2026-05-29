<?php
/**
 * Product catalog structure (4 main categories from spec).
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

$c6 = array( 'xanh-duong', 'nau-socola', 'xam-long-chuot', 'do-do', 'xanh-tim', 'do-ngoi' );
$c7 = array( 'xanh-duong', 'nau-socola', 'xam-long-chuot', 'do-do', 'xanh-tim', 'do-ngoi', 'trang-sua' );
$c2 = array( 'xanh-duong', 'trang-sua' );
$c3 = array( 'trang', 'xanh', 'trang-sua' );
$c1 = array( 'trang' );

return array(
	'attribute' => array(
		'slug'  => 'mau',
		'label' => 'Màu sắc',
		'terms' => array(
			'xanh-duong'     => 'Xanh dương',
			'trang-sua'      => 'Trắng sữa',
			'nau-socola'     => 'Nâu socola',
			'xam-long-chuot' => 'Xám lông chuột',
			'do-do'          => 'Đỏ đô',
			'xanh-tim'       => 'Xanh tím',
			'do-ngoi'        => 'Đỏ ngói',
			'trang'          => 'Trắng',
			'xanh'           => 'Xanh',
		),
	),
	'categories' => array(
		array(
			'slug'  => 'ton-nhua-pvc-asa',
			'name'  => 'Tôn nhựa PVC/ASA',
			'products' => array(
				array( 'slug' => 'ton-nhua-5-song', 'name' => 'Tôn Nhựa 5 sóng', 'colors' => $c2, 'price' => 170000 ),
				array( 'slug' => 'ngoi-nhua', 'name' => 'Ngói Nhựa', 'colors' => $c6, 'price' => 170000 ),
			),
		),
		array(
			'slug'  => 'phu-kien-ton-ngoi-nhua',
			'name'  => 'Phụ kiện tôn ngói nhựa',
			'products' => array(
				array( 'slug' => 'tam-up-noc-5-song', 'name' => 'Tấm úp nóc 5 sóng', 'colors' => $c2, 'price' => 128000 ),
				array( 'slug' => 'tam-up-noc-ngoi', 'name' => 'Tấm úp nóc ngói', 'colors' => $c6, 'price' => 128000 ),
				array( 'slug' => 'mang-chu-v', 'name' => 'Máng chữ V', 'colors' => $c7, 'price' => 123000 ),
				array( 'slug' => 'tam-up-suon-ngoi', 'name' => 'Tấm úp sườn ngói', 'colors' => $c6, 'price' => 128000 ),
				array( 'slug' => 'tam-vien-chu-a-trai', 'name' => 'Tấm viền chữ A trái', 'colors' => $c6, 'price' => 123000 ),
				array( 'slug' => 'tam-vien-chu-a-phai', 'name' => 'Tấm viền chữ A phải', 'colors' => $c6, 'price' => 123000 ),
				array( 'slug' => 'tam-diem-hien-hoa', 'name' => 'Tấm diềm hiên hoa', 'colors' => $c6, 'price' => 123000 ),
				array( 'slug' => 'tam-up-goc', 'name' => 'Tấm úp góc', 'colors' => $c6, 'price' => 113000 ),
				array( 'slug' => 'tam-up-duoi-mai', 'name' => 'Tấm úp đuôi mái', 'colors' => $c6, 'price' => 113000 ),
				array( 'slug' => 'tam-chac-3', 'name' => 'Tấm chạc 3', 'colors' => $c6, 'price' => 113000 ),
				array( 'slug' => 'tam-chac-4', 'name' => 'Tấm chạc 4', 'colors' => $c6, 'price' => 113000 ),
				array( 'slug' => 'tam-chac-chu-t', 'name' => 'Tấm chạc chữ T', 'colors' => $c6, 'price' => 113000 ),
				array( 'slug' => 'tam-up-tuong-ton-5-song', 'name' => 'Tấm úp tường tôn 5 sóng', 'colors' => $c2, 'price' => 128000 ),
				array( 'slug' => 'tam-up-tuong-ngoi', 'name' => 'Tấm úp tường ngói', 'colors' => $c6, 'price' => 128000 ),
				array( 'slug' => 'nap-chup-dau-vit', 'name' => 'Nắp chụp đầu vít', 'colors' => $c7, 'price' => 45000 ),
				array( 'slug' => 'vit', 'name' => 'Vít', 'type' => 'simple', 'price' => 0 ),
			),
		),
		array(
			'slug'  => 'ton-lay-sang-frp',
			'name'  => 'Tôn lấy sáng FRP',
			'products' => array(
				array( 'slug' => 'ton-lay-sang-frp-5-song', 'name' => 'Tôn lấy sáng FRP 5 sóng', 'colors' => $c3, 'price' => 0 ),
				array( 'slug' => 'ton-lay-sang-frp-9-song', 'name' => 'Tôn lấy sáng FRP 9 sóng', 'colors' => $c3, 'price' => 0 ),
				array( 'slug' => 'ton-lay-sang-frp-11-song', 'name' => 'Tôn lấy sáng FRP 11 sóng', 'colors' => $c3, 'price' => 0 ),
			),
		),
		array(
			'slug'  => 'xa-go-nhua',
			'name'  => 'Xà gồ nhựa',
			'products' => array(
				array( 'slug' => 'xa-go-50x100', 'name' => 'Xà gồ nhựa 50x100', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-60x120', 'name' => 'Xà gồ nhựa 60x120', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-60x160', 'name' => 'Xà gồ nhựa 60x160', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-60x200', 'name' => 'Xà gồ nhựa 60x200', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-30x60', 'name' => 'Xà gồ nhựa 30x60', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-20x40', 'name' => 'Xà gồ nhựa 20x40', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-40x80', 'name' => 'Xà gồ nhựa 40x80', 'colors' => $c1, 'price' => 0 ),
				array( 'slug' => 'xa-go-phi-rong-34', 'name' => 'Xà gồ nhựa phi rỗng 34', 'colors' => $c1, 'price' => 0 ),
			),
		),
	),
);

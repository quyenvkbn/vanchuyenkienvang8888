<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConfigBie{
	
	function __construct($params = NULL){
		$this->params = $params;
	}

	// meta_title là 1 row -> seo_meta_title
	// contact_address
	// chưa có thì insert
	// có thì update
	public function system(){
		$data['homepage'] =  array(
			'brandname' => array('type' => 'text', 'label' => 'Tên thương hiệu'),
			// 'company' => array('type' => 'text', 'label' => 'Tên công ty'),
			'logo' => array('type' => 'images', 'label' => 'Logo'),
			// 'hi' => array('type' => 'images', 'label' => 'Baner'),
//			'tu' => array('type' => 'editor', 'label' => 'VỀ CHÚNG TÔI – CONDOTEL VIỆT NAM'),
//			'dangky' => array('type' => 'editor', 'label' => 'NHÀ ĐẦU TƯ NHẬN ĐƯỢC GÌ KHI ĐĂNG KÝ'),
			// 'logo1' => array('type' => 'images', 'label' => 'Banner Website'),
			// 'slogan' => array('type' => 'text', 'label' => 'Sologan '),
			// 'bando' => array('type' => 'text', 'label' => 'Bản đồ '),
			'kiki' => array('type' => 'text', 'label' => 'Content Footer1 '),
			'kiki1' => array('type' => 'text', 'label' => 'Content Footer2 '),
			'kiki2' => array('type' => 'text', 'label' => 'Content Footer3 '),
			'kiki3' => array('type' => 'text', 'label' => 'Content Footer 4'),
			'kiki4' => array('type' => 'text', 'label' => 'Content Footer 5'),
			'about' => array('type' => 'dropdown', 'label' => 'Danh mục cho phần giới thiệu'),
			'service' => array('type' => 'dropdown', 'label' => 'Danh mục cho phần dịch vụ'),
			'news' => array('type' => 'dropdown', 'label' => 'Danh mục cho phần tin tức'),
			'representative' => array('type' => 'dropdown', 'label' => 'Danh mục cho phần tiêu biểu'),
			'telcall' => array('type' => 'text', 'label' => 'Số điện thoại gọi trực tuyến'),
			'favicon' => array('type' => 'images', 'label' => 'Favicon'),

			 'cover' => array('type' => 'images', 'label' => 'Ảnh Cover gửi mail'),
			 'website' => array('type' => 'dropdown', 'label' => 'Trạng thái website','value' => array('Mở cửa website','Đóng Website bảo trì')),
			
		);
//		$data['lydo'] =  array(
//			'ld1' => array('type' => 'textarea', 'label' => 'Condotel là gì'),
//			'ld2' => array('type' => 'textarea', 'label' => 'Quyền sở hữu Condotel là bao lâu?'),
//			'ld3' => array('type' => 'textarea', 'label' => 'Người nước ngoài có được sở hữu condotel Việt Nam'),
//
//
//
//
//		);
		$data['contact'] = array(
			'address' => array('type' => 'text','label' => 'Địa chỉ'),

			// 'email2' => array('type' => 'text','label' => 'Văn phòng giao dịch'),
			'phone' => array('type' => 'text','label' => 'Số điện thoại'),
			// 'hotline' => array('type' => 'text','label' => 'Hotline'),
			// 'fax' => array('type' => 'text','label' => 'Fax'),
			'email' => array('type' => 'text','label' => 'Địa chỉ Email'),
			'web' => array('type' => 'text','label' => 'web'),
//			'bannertu' => array('type' => 'images', 'label' => 'Banner quảng cáo'),
//			'bannertuu' => array('type' => 'images', 'label' => 'Banner quảng cáo 2'),
//			'link' => array('type' => 'text','label' => 'Link Banner QC'),
			// 'them' => array('type' => 'text','label' => 'Chú thích'),
			// 'capcuu' => array('type' => 'text','label' => 'SĐT Khiếu nại'),
			// 'time_lv' => array('type' => 'text','label' => 'Thời gian làm việc'),
			// 'links_map' => array('type' => 'textarea', 'label' => 'Links bản đồ'),
			'map' => array('type' => 'textarea', 'label' => 'Bản đồ'),
			'description' => array('type' => 'textarea', 'label' => 'Mô tả thông tin liên hệ'),
//			// 'fange' => array('type' => 'textarea', 'label' => 'Link Fanpage Facebook'),
//			'video' => array('type' => 'textarea', 'label' => 'Link Video'),
//			// 'contact' => array('type' => 'editor','label' => 'Trang liên hệ'),
//			'title' => array('type' => 'text','label' => 'Địa Chỉ 1: '),
//			'content' => array('type' => 'editor','label' => 'Các Tỉnh - Thành Phố 1'),
//			'title1' => array('type' => 'text','label' => 'Địa Chỉ 2:'),
//			'content1' => array('type' => 'editor','label' => 'Các Tỉnh - Thành Phố 2'),

		);
		// $data['vantu'] = array(
		// 	'kq' => array('type' => 'textarea','label' => 'Kết Quả'),


		// );

		

		$data['social'] = array(
			// 'pinterest' => array('type' => 'text', 'label' => 'Pinterest'),
			// 'google' => array('type' => 'text', 'label' => 'Google+'),
			'facebook' => array('type' => 'text', 'label' => 'Facebook'),
			 // 'linkke' => array('type' => 'text', 'label' => 'Instagram'),
			// 'twitter' => array('type' => 'text', 'label' => 'twitter'),
			// 'youtube' => array('type' => 'text', 'label' => 'youtube'),
			// 'zalo' => array('type' => 'text', 'label' => 'Zalo'),
			// 'skype' => array('type' => 'text', 'label' => 'Skype'),
		);
		$data['seo'] = array(
			'meta_title' => array('type' => 'text','label' => 'Meta Title'),
			'meta_keywords' => array('type' => 'text','label' => 'Meta Keyword'),
			'meta_description' => array('type' => 'text','label' => 'Meta Description'),
			'meta_image' => array('type' => 'images','label' => 'Meta Image'),
		);
//		$data['banner'] =  array(
//			'banner1' => array('type' => 'images', 'label' => 'Banner liên hệ'),
//			// 'banner1_link' => array('type' => 'text', 'label' => 'Links liên hệ'),
//			// 'banner2' => array('type' => 'images', 'label' => 'Banner bài viết'),
//			// 'banner2_link' => array('type' => 'text', 'label' => 'Banner bài viết LINK'),
//			// 'banner3' => array('type' => 'images', 'label' => 'Banner sản phẩm'),
//			// 'banner3_link' => array('type' => 'text', 'label' => 'Banner sản phẩm LINK'),
//			// 'banner4' => array('type' => 'images', 'label' => 'Banner bên trái'),
//		);
//		$data['script'] =  array(
//			'header' => array('type' => 'textarea', 'label' => 'Script đầu trang'),
//			'body' => array('type' => 'textarea', 'label' => 'Script thân trang'),
//		);
		// $data['construction'] =  array(
		// 	'menu_backround' => array('type' => 'text', 'label' => 'Màu nền Menu','class'=> 'jscolor'),
		// );
		// $data['loto'] =  array(
		// 	'thayboi' => array('type' => 'text', 'label' => 'Thầy bói phán'),
		// 	'nguoidep' => array('type' => 'text', 'label' => 'Người đẹp phán'),
		// );
		
		return $data;
	}
}
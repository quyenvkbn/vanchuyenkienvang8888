<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="vi" />
	<link rel="alternate" href="<?php echo base_url();?>" hreflang="vi-vn" />
	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="author" content="<?php echo getSystem('homepage_brandname');?>" />
	<meta name="copyright" content="<?php echo getSystem('homepage_brandname');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta http-equiv="refresh" content="1800" />

	<!-- for Google -->
	<title><?php echo isset($meta_title)?htmlspecialchars($meta_title):'';?></title>
	<meta name="keywords" content="<?php echo isset($meta_keywords)?htmlspecialchars($meta_keywords):'';?>" />
	<meta name="description" content="<?php echo isset($meta_description)?htmlspecialchars($meta_description):'';?>" />
	<meta name="revisit-after" content="1 days">
	<meta name="rating" content="general">
	<?php echo isset($canonical)?'<link rel="canonical" href="'.$canonical.'" />':'';?>
	
	<!-- for Facebook -->
	<meta property="og:title" content="<?php echo (isset($meta_title) && !empty($meta_title))?htmlspecialchars($meta_title):'';?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo (isset($meta_images) && !empty($meta_images))?$meta_images:base_url(getSystem('seo_meta_image'));?>" />
	<?php echo isset($canonical)?'<meta property="og:url" content="'.$canonical.'" />':'';?>
	<meta property="og:description" content="<?php echo (isset($meta_description) && !empty($meta_description))?htmlspecialchars($meta_description):'';?>" />
	<meta property="og:site_name" content="<?php echo getSystem('homepage_brandname');?>" />
	<meta property="fb:admins" content="<?php echo getSystem('system_fbadmins');?>"/>
	<meta property="fb:app_id" content="<?php echo getSystem('system_fbappid');?>" />
	
	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo isset($meta_title)?htmlspecialchars($meta_title):'';?>" />
	<meta name="twitter:description" content="<?php echo (isset($meta_description) && !empty($meta_description))?htmlspecialchars($meta_description):'';?>" />
	<meta name="twitter:image" content="<?php echo (isset($meta_images) && !empty($meta_images))?$meta_images:base_url(getSystem('seo_meta_image'));?>" />
	<link rel="icon" href="<?php echo $this->fcSystem['homepage_favicon']; ?>"  type="image/png" sizes="30x30">
	<?php $this->load->view('homepage/frontend/common/head'); ?>
	<script type="text/javascript">
		var BASE_URL = '<?php echo base_url(); ?>';
	</script>
	<style type="text/css">
		.buynow-2 {max-width:740px;margin:0 auto;background:#fff;font-family:'Roboto Condensed',sans-serif!important}.buynow-2 .heading{position:relative;cursor:pointer;padding-left:40px}.buynow-2 .heading:before{content:"";position:absolute;width:22px;height:20px;left:10px;top:0;background-image:url(templates/backend/images/spritesheet.png);background-repeat:no-repeat;background-position:-459px -360px}.buynow-2 .heading .text{padding-left:50px;display:inline-block;font-size:14px;line-height:20px;text-transform:uppercase;color:#555}.buynow-2 .heading .text:hover{color:#0388cd}.buynow-2 .list-cart-heading{width:100%;background:#f7f7f7;font-size:12px;color:#333;padding:0 15px}.buynow-2 .list-cart-heading .item{float:left;padding:6px 15px;text-transform:none;font-weight: bold}.buynow-2 .list-cart-heading .item+.item{border-left:1px solid #fff}.buynow-2 .list-cart-heading .product,.buynow-2 .list-order .product{width:330px}.buynow-2 .list-cart-heading .price,.buynow-2 .list-order .price{width:130px}.buynow-2 .list-cart-heading .count,.buynow-2 .list-order .count{width:114px}.buynow-2 .list-cart-heading .prices,.buynow-2 .list-order .prices{width:130px}.buynow-2 .list-order{padding:0 15px}.buynow-2 .list-order>.item{padding:15px 0}.buynow-2 .list-order>.item+.item{border-top:1px dotted #ccc}.buynow-2 .list-order .product .thumb{width:80px;border:1px solid #d8d8d8}.buynow-2 .list-order .price,.buynow-2 .list-order .prices{padding-right:15px;font-size:12px;font-weight:700}.buynow-2 .list-order .prices span{font-size: 12px;display:block}.buynow-2 .list-order .list-item>*{float:left}.buynow-2 .list-order .product .info{width:250px;padding:0 15px}.buynow-2 .list-order .product .info .title{font-size:13px;line-height:18px;font-weight:700}.buynow-2 .list-order .product .info .title .link{color:#333;font-size:12px}.buynow-2 .list-order .product .info .title .link:hover{color:#0388cd}.buynow-2 .list-order .product .delete{border:none;background:#fff;font-size:11px;color:#6f0600;cursor:pointer}.buynow-2 .list-order .product .delete i{color:#959595;margin-right:5px}.buynow-2 .list-order .price .old{text-decoration:line-through;color:#959595;font-weight:400}.buynow-2 .list-order .price .saleoff{color:#d60c0c;font-weight:400}.buynow-2 .list-order .count{text-align:center}.buynow-2 .list-order .count>*{display:inline-block}.buynow-2 .list-order .count .btns{position:absolute;width:30px;height:30px;border:1px solid #dfdfdf;top:0;cursor:pointer}.buynow-2 .list-order .count .abate:before,.buynow-2 .list-order .count .augment:before{width:12px;height:2px;margin:15px auto;content:"";display:block}.buynow-2 .list-order .count .abate{left:-30px;border-right:none}.buynow-2 .list-order .count .abate:before{background:#ccc}.buynow-2 .list-order .count .augment{right:-30px;border-left:none}.buynow-2 .list-order .count .augment:before{background:#288ad6}.buynow-2 .list-order .count .augment:after{content:"";width:2px;height:12px;background:#288ad6;display:block;margin:0 auto;position:absolute;top:10px;left:0;right:0}.buynow-2 .list-order .count .quantity{width:30px;height:30px;text-align:center;border:1px solid #dfdfdf}.buynow-2 .panel-foot{padding:15px 15px 0;font-size:14px;line-height:20px;color:#333;border-top:1px solid #eee}.buynow-2 .panel-foot .total .price strong{color:#d60c0c}.buynow-2 .panel-foot .total p{font-size:13px}.buynow-2 .panel-foot .action .continue{font-size:13px;color:#0388cd}.buynow-2 .panel-foot .action .purchase{display:block;position:relative;padding:8px 40px 8px 20px;background:#d60c0c;color:#fff;border:none;font-size:13px;line-height:20px;font-weight:700;cursor:pointer;border-radius:4px}.buynow-2 .panel-foot .action .purchase:after{content:"";display:block;position:absolute;width:12px;height:8px;background:url(templates/backend/images/spritesheet.png) -264px -81px no-repeat;top:14px;right:15px}#scrrolbar{max-height:320px}#scrrolbar::-webkit-scrollbar{height:100%;width:6px}#scrrolbar::-webkit-scrollbar-thumb{background:#ccc;height:10px;width:7px;border-radius:3px}#modal-cart .uk-modal-dialog{width:740px!important;padding:20px 0 10px!important}#modal-cart .uk-modal-dialog>.uk-close:first-child{margin:-16px -15px 0 0}
		.action.uk-flex.uk-flex-middle.uk-flex-space-between {width: 100%;}
		.cart-scrrolbar {max-height: 320px}
		.cart-scrrolbar::-webkit-scrollbar {height: 100%; width: 6px;}
		.cart-scrrolbar::-webkit-scrollbar-thumb { background: #ccc; height: 10px; width: 7px; border-radius: 3px; }
		#scrollbar {min-width: 700px;}
	</style>
</head>
<body onload="time()" >
	<div class="page-body-buong">
   <div class="">
    <div id="wrapper">
	<?php $this->load->view('homepage/frontend/common/header'); ?>

	
	<?php echo show_flashdata_frontend(); ?>
	<?php $this->load->view(isset($template) ? $template : ''); ?>



	<?php $this->load->view('homepage/frontend/common/footer'); ?>

	<?php /* $this->load->view('homepage/frontend/common/offcanvas'); ?>
	<?php $this->load->view('homepage/frontend/common/script');*/ ?>

<!-- <div id="modal-cart" class="uk-modal">
	<div class="uk-modal-dialog" style="width:768px;">
		<a class="uk-modal-close uk-close"></a>
		<div class="cart-content">
			
		
		</div>
	</div>
</div>
<div id="modal-buynow" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-large">
	   <a class="uk-modal-close uk-close"></a>
		<div class="cart-content"></div>
	</div>
</div> -->
</div>
</div>
</div>
<!-- <js> -->

<script>
	$(document).ready(function() {
		$('.quantity').change(function(){
			var number = $(this).val();
			$('.ajax-addtocart').attr('data-quantity','');
			$('.ajax-addtocart').attr('data-quantity', number);
		});
		if($('.btn-up')) {
			$('.btn-up').click(function() {
				var $_input = $(this).parent().find('.quantity');
				var quantity = parseInt($_input.val());
				if(quantity <= 1){
					quantity = 1;
				}else {
					quantity -= 1;
				}
				$_input.val(quantity);
				$('.action-button.ajax-addtocart').attr('data-quantity', quantity);
			});
		}
		if($('.btn-down')) {
			$('.btn-down').click(function() {
				var $_input = $(this).parent().find('.quantity');
				var quantity = parseInt($_input.val());
				quantity += 1;
				$_input.val(quantity);
				$('.action-button.ajax-addtocart').attr('data-quantity', quantity);
			});
		}

		$('.ajax-addtocart').click(function(){
			var product = $(this);
			var modal = UIkit.modal('#modal-cart', {
				bgclose: false,
			});
			// if(module != 'redirect'){
				modal.show();
				// $('#modal-cart .cart-content').html('Loading...');
			// }
			$.post('<?php echo site_url('products/ajax/cart/addtocart');?>', {
				id : product.attr('data-id'),
				quantity : product.attr('data-quantity'),
			},function(data){
				// if(module == 'redirect'){
					// window.location.href = '<?php echo BASE_URL ?>' + 'inquiry' + '.html';
				// }
				var json = JSON.parse(data);
				$('#modal-cart .cart-content').html(json.html);
				$('#ajax-home-cart-quantity').html(json.item);
				$('.cart-status .quantity').html(json.item);
			});
			return false;
		});
			
		$(document).on('click', '#ec-module-cart .augment', function(){
		var item = $(this);
			var quantity = parseInt($(this).parent().find('.quantity').val());
			quantity = quantity + 1;
			item.parent().find('.quantity').val(quantity);
			ajax_cart_update();
			return false;
		});	
			
		$(document).on('click', '#ec-module-cart .abate', function(){
			var item = $(this);
			var quantity = parseInt($(this).parent().find('.quantity').val());
			if(quantity <= 1){
				quantity = 1
			} else {
				quantity = quantity - 1;
			}
			item.parent().find('.quantity').val(quantity);
			ajax_cart_update();
			return false;
		});
		
		$(document).on('click', '#ec-module-cart .delete', function(){
			var item = $(this);
			item.parent().parent().parent().parent().parent().find('.quantity').val(0);
			item.parent().parent().parent().parent().parent().addClass('uk-hidden').removeClass('item');
			ajax_cart_update();
			return false;
		});
		
		$(document).on('click', '.ec-cart-continue', function(){
			UIkit.modal('#modal-cart').hide();
			return false;
		});
		
		$('.augment').click(function() {
			var num_order = parseInt($(this).parent().find('.quantity').val());
			num_order += 1;
			$(this).parent().find('.quantity').val(num_order);
		});
		$('.abate').click(function() {
			var cart_class = $(this).attr('data-cart');
			var num_order = parseInt($(this).parent().find('.quantity').val());
			if(num_order <= 1) {
				num_order = 1
			}else {
				num_order -= 1;
			}
			$(this).parent().find('.quantity').val(num_order);
		});
	});
	
	function ajax_cart_update(){
	$.post('<?php echo site_url('products/ajax/cart/updatetocart');?>', $('#ajax-cart-form').serialize(), function(data){
		var price = JSON.parse(data);
		$('#ajax-cart-form').html(price.html);
		$('.cart-status .quantity').html(price.item);
	});
	return false;
}
</script>

<!-- </js> -->
</body>
</html>
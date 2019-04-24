<div id="main" class="wrapper">
  <div id="main-content">
    <div class="brecus">
     <div class="container">
       <ul>
         <li><a href="">Trang chủ</a>&gt;</li>
         <li><a href="">Liên hệ</a></li>
       </ul>
     </div>
   </div>
   <div id="main-contact">
     <div class="container">
       <div class="row">
         <div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp">
           <div class="content-contact">
             <p class="thank-you">Thank you for visiting our website.</p>
             <h1 class="title-contact"><?php echo $this->fcSystem['homepage_brandname'] ?></h1>
             <ul class="adress-contact">
               <li><span>Address: </span><?php echo $this->fcSystem['contact_address'] ?></li>
               <li><span>Hotline: </span><?php echo $this->fcSystem['contact_phone'] ?></li>
               <li><span>Email:</span><?php echo $this->fcSystem['contact_email'] ?></li>
               <li><span>Website: </span><?php echo $this->fcSystem['contact_web'] ?></li>
             </ul>
           </div>
           <div class="map-contact">
             <?php echo $this->fcSystem['contact_map'] ?>
           </div>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-12 wow fadeInUp">
           <div class="form-contat">
             <p class="desc">Vui lòng điền vào mẫu và gửi cho chúng tôi. Chuyên gia tư vấn của chúng tôi sẽ trả lời bạn càng sớm càng tốt.<br>
             Thanks you!</p>
             <form action="" method="post">
              <?php $error = validation_errors(); echo !empty($error) ? '<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>' : '';?>
              <input type="text" placeholder="Họ và tên*" name="fullname" >
              <input type="text" placeholder="Số điện thoại*"  name="phone">
              <input type="text" placeholder="Email" name="email">
              
              <input type="text" placeholder="Địa chỉ" name="address">
              <textarea cols="40" rows="10" name="message" placeholder="Nội dung"></textarea>
              <div class="send-contact">
                
               <div class="item">
                 <input type="submit" name="create" value="<?php echo $this->lang->line('submit_information') ?>">
               </div>
               <div class="clearfix"></div>
             </div>
             
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
 
 
</div>
 <div class="leftTopHome">
  
   <div class="boxSearchSelect">
    <div class="titleSearch">
     Tìm kiếm
   </div>
   <div class="contentSearch boxSizing">
     
    <form action="tim-kiem.html" class="formSearchLabor" method="get">
      <label>Thị trường</label>
      <select name="s1">
       <option value="">-- Thị trường --</option>
       <?php $thitruong = explode(',', $this->fcSystem['vantu_thitruong']);?>
       <?php if(count($thitruong) && is_array($thitruong) && isset($thitruong)){foreach($thitruong as $val){?>
         <option value="<?php echo $val?>"><?php echo $val?></option>
       <?php }}?>
       
     </select>
     <label>Công việc</label>
     <select name="s2">
       <option value="">-- Công Việc --</option>
       
       <?php 
       $congviec = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
        'select' => 'id, title',
        'table' => 'products_catalogues',
        'where' => array('publish' => 1,'trash' => 0, 'alanguage' => $this->fc_lang),
        'limit' => 100000,
        'order_by' => 'id desc',
      ));
      ?>?>
      <?php if(count($congviec) && is_array($congviec) && isset($congviec)){foreach($congviec as $val){?>
       <option value="<?php echo $val['id']?>"><?php echo $val['title']?></option>

     <?php }}?>
   </select>
    <label>Thu nhập</label>
   <select name="s3">
     <option value="">-- Thu Nhập --</option>
     <?php $thunhap = explode(',', $this->fcSystem['vantu_thunhap']);?>
     <?php if(count($thunhap) && is_array($thunhap) && isset($thunhap)){foreach($thunhap as $val){?>
       <option value="<?php echo $val?>"><?php echo $val?></option>
     <?php }}?>
   </select>
  <label>Độ tuổi</label>
   <select name="s4">+

     <option value="">-- Độ Tuổi --</option>
     <?php $dotuoi = explode(',', $this->fcSystem['vantu_dotuoi']);?>
     <?php if(count($dotuoi) && is_array($dotuoi) && isset($dotuoi)){foreach($dotuoi as $val){?>
       <option value="<?php echo $val?>"><?php echo $val?></option>
     <?php }}?>
   </select>
   <div class="">
    <label>Hạn nộp nội dung</label>
    <input type="date" placeholder="Hạn nộp hồ sơ" name="s5" onchange="this.className=(this.value!=''?'has-value':'')" style="width: 100%;">
  </div>
  <div class="">
    <label>Thi tuyển</label>
    <input type="date" name="s6" value="" placeholder="Hạn nộp hồ sơ" style="width: 100%;">
  </div>
  <div class="boxButton">
    <button type="submit" style="background: none;border: 0px;border-radius: 0px;color: #fff">Tìm kiếm</button>
  </div>
</form>

</div>
</div>
</div>
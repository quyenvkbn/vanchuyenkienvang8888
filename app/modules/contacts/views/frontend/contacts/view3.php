<div class="clearix"></div>

<article id="body_home">
  >
  <div class="clearfix-30"></div>
  <section class="content_news">
    <div class="container">
      <div class="row_pc">
        <div class="row">



          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="top_contact">
              <h3><?php echo $this->fcSystem['contact_title'] ?></h3>

              <p> <?php echo $this->fcSystem['contact_content'] ?> </p>
            </div>





            <!-- contact form -->
            <div class="contact_from">
              <h3>Contact form</h3>
              <form action="" method="post">
                <?php $error = validation_errors(); echo !empty($error) ? '<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>' : '';?>
                <div class="from_contac">
                  <label> <span>(*)</span> Fullname:  </label>
                  <input type="text" class="form-control" name="fullname" />
                </div>
                <div class="from_contac">
                  <label> <span>(*)</span>Địa Chỉ:  </label>
                  <input type="text" class="form-control" name="address" />
                </div>
                <div class="from_contac">
                  <label> <span>(*)</span>Telephone: </label>
                  <input type="number"  class="form-control" name="phone" />
                </div>
                <div class="from_contac">
                  <label> <span>(*)</span>Email:  </label>
                  <input type="email" class="form-control" name="email" />
                </div>
                <div class="from_contac">
                  <label> <span>(*)</span> Nội Dung: </label>
                  <textarea name="message"></textarea>
                </div>
                <div class="from_contac from_contac2">
                  <input type="submit" name="create" value="<?php echo $this->lang->line('submit_information') ?>"/>
                </div>
              </form>
            </div>


          </div>




          <!-- LEFT  -->
          <?php echo $this->load->view('homepage/frontend/common/aside'); ?>




        </div>
      </div>
    </div>
  </section>
  <?php echo $this->load->view('menuchantrang'); ?>
</article>

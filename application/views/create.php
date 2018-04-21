
	 <div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-7">
          <?php echo $this->session->flashdata('msg'); ?>
            <div class="panel-title text-center"><h1>Pendaftaran Mahasiswa</h1></div>
                      <?php echo form_open('signup'); ?>
                        <div class="form-group row">
                            <label for="nim" class="col-md-3 col-form-label">NIM</label>
                            <div class="col-md-9">
                              <input id="nim" type="text" class="form-control" name="nim" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo set_value('nim'); ?>" autofocus>
                             <span class="text-danger"><?php echo form_error('nim'); ?></span> 
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-md-3 col-form-label">E-mail</label>
                            <div class="col-md-9">
                              <input id="email" type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
                             <span class="text-danger"><?php echo form_error('email'); ?></span> 
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="password" class="col-md-3 col-form-label">Password</label>
                           <div class="col-md-9">
                             <input id="password" type="password" class="form-control" name="password">
                             <span class="text-danger"><?php echo form_error('password'); ?></span> 
                           </div>
                        </div>

                        <div class="form-group row">
                          <label for="confirm_password" class="col-md-3 col-form-label">Ulangi Password</label>
                           <div class="col-md-9">
                             <input id="confirm_password" type="password" class="form-control" name="confirm_password">
                             <span class="text-danger"><?php echo form_error('confirm_password'); ?></span> 
                           </div>
                        </div>
                        <div class="col-md7 text-center">
                          <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                      <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
	  
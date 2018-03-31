<div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Previlage <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="previlage">
                            <option value="">-- Pilih Item --</option>
                            <option value="0">Staff</option>
                            <option value="1">Admin</option>
                            <option value="2">Marketing</option>                            
                          </select>
                          <div class="error" id="ntf_previlage"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Menu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="menu">
                            <option value="">-- Pilih Item --</option>
                            <?php foreach ($menu as $key => $value) : ?>
                              <option value="<?=$value['id_menu'];?>"><?=$value['nm_menu'];?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="error" id="ntf_menu"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" >Granted</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="hak">
                            <option value="">-- Pilih Item --</option>
                            <option value="0">Sembunyikan</option>
                            <option value="1">Tampilkan</option>
                            <option value="2">Tampilkan dan Menejemen</option>
                          </select>
                          <div class="error" id="ntf_hak"></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" id="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                  <script src="<?=site_url('assets/jun');?>/vendors/jquery/dist/jquery.min.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function () {
                      $('body').on('click','#submit', function(){
                        $.ajax({
                          url : window.location.href,
                          dataType : 'json',
                          data : $('form').serialize(),
                          type : 'POST'
                        }).done(function(data){
                          if (data.state == 1) {
                            if (data.status == 1) {
                              window.location = data.url;
                            }
                          }
                          $.each(data.notif,function(key,value){
                          $('.error').show();
                          $('#ntf_'+ key).html(value);
                          $('#ntf_'+ key).css({'color':'red', 'font-style':'italic'});
                          });
                        });
                      });
                    });
                  </script>
<div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="logo">Logo Perusahaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="logo" class="form-control col-md-7 col-xs-12 disc" disabled="true" value="<?php echo $result['logo']; ?>">
                          <div class="error" id="ntf_logo"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="logo" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nama_perusahaan">Nama Perusahaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_perusahaan" class="form-control col-md-7 col-xs-12 disc" placeholder="Nama Perusahaan . . ." disabled="true" value="<?php if (is_array($result)) { echo $result['nama_perusahaan']; } ?>">
                          <div class="error" id="ntf_nama_perusahaan"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="nama_perusahaan" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Start Of Invoice <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nomor_inv" class="form-control col-md-7 col-xs-12 disc" placeholder="Start Of Invoice" disabled="true" value="<?php echo $result['nomor_inv']; ?>">
                          <div class="error" id="ntf_nomor_inv"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="nomor_inv" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="header">Template <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 disc" name="template" disabled="true">
                            <option value="">-- Pilih Item --</option>
                            <?php foreach ($template as $key => $value) { ?>
                              <option <?php if($value['id_template'] == $result['template']){ ?> selected <?php } ?> value="<?=$value['id_template'];?>"><?=$value['nama'];?></option>
                            <?php } ?>
                          </select>
                          <div class="error" id="ntf_header"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="template" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="email_perusahaan" class="control-label col-md-2 col-sm-3 col-xs-12" >Email Perusahaan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email_perusahaan" class="form-control col-md-7 col-xs-12 disc" placeholder="Email Perusahaan ..." disabled="true" value="<?php echo $result['email_perusahaan']; ?>">
                          <div class="error" id="ntf_email_perusahaan"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="email_perusahaan" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="phone_perusahaan" class="control-label col-md-2 col-sm-3 col-xs-12" >Phone Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phone_perusahaan" class="form-control col-md-7 col-xs-12 disc" placeholder="Number Phone...." disabled="true" value="<?php echo $result['phone_perusahaan']; ?>">
                          <div class="error" id="ntf_email_perusahaan"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="phone_perusahaan" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="alamat_perusahaan" class="control-label col-md-2 col-sm-3 col-xs-12" >Alamat Perusahaan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12 disc" name="alamat_perusahaan" placeholder="Alamat Perusahaan ..." disabled="true"><?php if (is_array($result)) { echo $result['alamat_perusahaan']; } ?></textarea>
                          <div class="error" id="ntf_alamat_perusahaan"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="alamat_perusahaan" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="pajak" class="control-label col-md-2 col-sm-3 col-xs-12" >Pajak</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 disc" type="text" name="pajak" placeholder="pajak ..." disabled="true" value="<?php if (is_array($result)) { echo $result['pajak']; } ?>">
                          <div class="error" id="ntf_pajak"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="pajak" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="nama_rekening" class="control-label col-md-2 col-sm-3 col-xs-12" >Nama Rekening</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 disc" type="text" name="nama_rekening" placeholder="Nama Rekening ..." disabled="true" value="<?php if (is_array($result)) { echo $result['nama_rekening']; } ?>">
                          <div class="error" id="ntf_nama_rekening"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="nama_rekening" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="no_rekening" class="control-label col-md-2 col-sm-3 col-xs-12" >Nomor Rekening</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 disc" type="text" name="no_rekening" placeholder="Nomor Rekening ..." disabled="true" value="<?php if (is_array($result)) { echo $result['no_rekening']; } ?>">
                          <div class="error" id="ntf_no_rekening"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="no_rekening" type="button"> Edit</button></div>
                      </div>
                      <div class="form-group">
                        <label for="nama_bank" class="control-label col-md-2 col-sm-3 col-xs-12" >Nama Bank</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 disc" type="text" name="nama_bank" placeholder="Nama Bank ..." disabled="true" value="<?php if (is_array($result)) { echo $result['nama_bank']; } ?>">
                          <div class="error" id="ntf_nama_bank"></div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12"><button class="btn btn-info btn-sm btn_edit" id="nama_bank" type="button"> Edit</button></div>
                      </div>
                      <div class="ln_solid"></div>

                    </form>
                  </div>
                  <script src="<?=site_url('assets/jun');?>/vendors/jquery/dist/jquery.min.js"></script>
                  <script type="text/javascript">
                    $(document).ready(function () {
                      
                      $('body').on('click','.btn_save', function(){
                        var id = $(this).attr('id');
                        if (id == 'logo') {
                          var value = $(this).parent().parent().find('.disc').prop('files')[0];
                        }else{
                          var value = $(this).parent().parent().find('.disc').val();
                        }
                        var form_data = new FormData();
                        form_data.append(id, value);
                        // console.log(value);
                        // return false;
                        $.ajax({
                          url : window.location.href,
                          dataType : 'json',
                          type : 'POST',
                          data : form_data,
                          async : false,
                          cache : false ,
                          contentType : false , 
                          processData : false
                        }).done(function(data){
                          // console.log(data);
                          // console.log($('#'+id).parent().parent().find('.disc'));
                            if (data.status == 1) {
                              var btn = '<button class="btn btn-info btn-sm btn_edit" id="'+id+'"> Edit</button>';
                              $('#'+id).parent().parent().find('.disc').prop('disabled','disabled');
                              $('#'+id).parent().html(btn);
                              // window.location = data.url;
                            }
                          $.each(data.notif,function(key,value){
                          $('.error').show();
                          $('#ntf_'+ key).html(value);
                          $('#ntf_'+ key).css({'color':'red', 'font-style':'italic'});
                          });
                        });
                      });
                      $('body').on('click','.btn_edit',function(){
                        var id = $(this).attr('id');
                        var btn = '<button class="btn btn-success btn-sm btn_save" id="'+id+'" type="button"> Save</button> <button class="btn btn-danger btn-sm btn_cancel" id="'+id+'" type="button"> Cancel</button>';
                        $(this).parent().parent().find('.disc').prop('disabled',false);
                        $(this).parent().html(btn);
                      });

                      $('body').on('click','.btn_cancel',function(){
                        var id = $(this).attr('id');
                        var btn = '<button class="btn btn-info btn-sm btn_edit" id="'+id+'"> Edit</button>';
                        $(this).parent().parent().find('.disc').prop('disabled','disabled');
                        $(this).parent().html(btn);
                      });
                    });
                  </script>
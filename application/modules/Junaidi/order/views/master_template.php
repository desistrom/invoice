<?php if ($view == 'list'){ ?>	

<a href="<?=site_url('order/cms_inv/create_template');?>" class="btn btn-success"><i class="fa fa-plus"></i> Create Template</a>

<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
	        <th>No</th>
			<th>Nama Template</th>
			<th>File</th>
			<th>action</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach ($template as $key => $value): ?>
			<tr>
				<td><?=($key+1);?></td>
				<td><?=$value['nama'];?></td>
				<td><?=$value['template'];?></td>
				<td><a href="<?=site_url('order/cms_inv/edit_template');?>/<?=$value['id_template'];?>">Edit</a> | <a href="<?=site_url('order/cms_inv/delete_template');?>/<?=$value['id_template'];?>"> Delete</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<?php }else if($view == 'create'){ ?>

<div class="x_content">
    <br />
    <div class="error" id="ntf_alert_file"></div>
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Nama Template <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="nama" id="nama" class="form-control col-md-7 col-xs-12" placeholder="Nama ...">
            	<div class="error" id="ntf_nama"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Template Code <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="file" class="form-control col-md-7 col-xs-12" id="template" name="template" placeholder="Template Code ..">
            	<div class="error" id="ntf_template"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Template Css <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="file" class="form-control col-md-7 col-xs-12" id="css" name="css" placeholder="Template Css ..">
            	<div class="error" id="ntf_css"></div>
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
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('click','#submit',function(){
			$('.error').text('');
			var form_data = new FormData();
			form_data.append('nama',$('#nama').val());
			var file_data = $('#template').prop('files')[0];
			var file_css = $('#css').prop('files')[0];
			form_data.append('template',file_data);
			form_data.append('css',file_css);
			$.ajax({
				url : '<?=site_url("order/cms_inv/create_template");?>',
				dataType : 'json',
				data : form_data,
				type : 'POST',
				async : false,
		        cache : false ,
		        contentType : false , 
		        processData : false
			}).done(function(data){
				console.log(data);
				if (data.state == 1) {
					if (data.upload == 1) {						
						if (data.status == 1) {
							window.location.href = data.url;
						}
					}
				}
				$.each(data.notif,function(key,value){
					$('.error').show();
					$('#ntf_'+key).html(value);
					$('#ntf_'+key).css({'color':'red', 'font-style':'italic'});
            	});
			});
		});
	});
</script>

<?php }else { ?>

<div class="x_content">
    <br />
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Nama Template <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="nama" class="form-control col-md-7 col-xs-12" placeholder="Nama ..." value="<?=$template['nama'];?>">
            	<div class="error" id="ntf_nama"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Template Code <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="file" class="form-control col-md-7 col-xs-12" id="template" name="template" placeholder="Template Code ..">
            	<div class="error" id="ntf_template"></div>
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
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('click','#submit',function(){
			$('.error').text('');
			var form_data = new FormData();
			form_data.append('nama',$('#nama').val());
			var file_data = $('#template').prop('files')[0];
			form_data.append('template',file_data);
			$.ajax({
				url : window.location.href,
				dataType : 'json',
				data : form_data,
				type : 'POST',
				async : false,
		        cache : false ,
		        contentType : false , 
		        processData : false
			}).done(function(data){
				console.log(data);
				if (data.state == 1) {
					if (data.upload == 1) {						
						if (data.status == 1) {
							window.location.href = data.url;
						}
					}
				}
				$.each(data.notif,function(key,value){
					$('.error').show();
					$('#ntf_'+key).html(value);
					$('#ntf_'+key).css({'color':'red', 'font-style':'italic'});
            	});
			});
		});
	});
</script>
<?php } ?>

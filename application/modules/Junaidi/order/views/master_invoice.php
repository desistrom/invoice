<?php if ($view == 'list'){ ?>	

<a href="<?=site_url('order/cms_inv/create_invoice');?>" class="btn btn-success"><i class="fa fa-plus"></i> Create Invoice</a>

<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
	        <th>No</th>
	        <th>No Invoice</th>
			<th>Nama User</th>
			<th>Nama Project</th>
			<th>Tagihan</th>
			<th>action</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach ($invoice as $key => $value): ?>
			<tr>
				<td><?=($key+1);?></td>
				<td><?=$value['perfix'].$value['id_invoice'];?></td>
				<td><?=$value['nama'];?></td>
				<td><?=$value['project'];?></td>
				<td><?=$value['harga'];?></td>
				<td><a href="<?=site_url('order/cms_inv/edit_invoice');?>/<?=$value['id_invoice'];?>">Edit</a> | <a target="_blank" href="<?=site_url('order/cms_inv/preview_invoice');?>/<?=$value['id_invoice'];?>"> Preview</a> | <a target="_blank" href="<?=site_url('order/cms_inv/laporan_pdf');?>/<?=$value['id_invoice'];?>"> PDF</a></td>
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
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Nama User <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="nama" id="nama" class="form-control col-md-7 col-xs-12" placeholder="Nama User...">
            	<div class="error" id="ntf_nama"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Nama Project <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="project" id="project" class="form-control col-md-7 col-xs-12" placeholder="Nama Project...">
            	<div class="error" id="ntf_project"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Deskripsi Project <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<textarea name="deskripsi" id="deskripsi" class="form-control col-md-7 col-xs-12" placeholder="Deskripsi Project..."></textarea>
            	<div class="error" id="ntf_deskripsi"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Tagihan <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="tagihan" id="tagihan" class="form-control col-md-7 col-xs-12" placeholder="Tagihan ...">
            	<div class="error" id="ntf_tagihan"></div>
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
<script src="<?=base_url();?>assets/invoice1/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('click','#submit',function(){
			$('.error').text('');
			$.ajax({
				url : window.location.href,
				dataType : 'json',
				data : $('form').serialize(),
				type : 'POST'
			}).done(function(data){
				console.log(data);
				if (data.state == 1) {
					if (data.status == 1) {
						window.location.href = data.url;
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
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Nama User <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="nama" id="nama" class="form-control col-md-7 col-xs-12" placeholder="Nama User..." value="<?=$invoice['nama'];?>">
            	<div class="error" id="ntf_nama"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Nama Project <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="project" id="project" class="form-control col-md-7 col-xs-12" placeholder="Nama Project..." value="<?=$invoice['project'];?>">
            	<div class="error" id="ntf_project"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Deskripsi Project <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<textarea name="deskripsi" id="deskripsi" class="form-control col-md-7 col-xs-12" placeholder="Deskripsi Project..."></textarea>
            	<div class="error" id="ntf_deskripsi"></div>
            </div>
    	</div>
    	<div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="nomor_inv">Tagihan <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<input type="text" name="tagihan" id="tagihan" class="form-control col-md-7 col-xs-12" placeholder="Tagihan ..." value="<?=$invoice['harga'];?>">
            	<div class="error" id="ntf_tagihan"></div>
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
<script src="<?=base_url();?>assets/invoice1/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('click','#submit',function(){
			$('.error').text('');
			$.ajax({
				url : window.location.href,
				dataType : 'json',
				data : $('form').serialize(),
				type : 'POST'
			}).done(function(data){
				console.log(data);
				if (data.state == 1) {
					if (data.status == 1) {
						window.location.href = data.url;
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

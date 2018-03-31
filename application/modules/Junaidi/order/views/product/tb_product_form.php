<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_product <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Product <?php echo form_error('nama_product') ?></label>
            <input type="text" class="form-control" name="nama_product" id="nama_product" placeholder="Nama Product" value="<?php echo $nama_product; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stock <?php echo form_error('stock') ?></label>
            <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" />
        </div>
	    <input type="hidden" name="id_product" value="<?php echo $id_product; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
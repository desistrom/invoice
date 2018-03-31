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
        <h2 style="margin-top:0px">Tb_product Read</h2>
        <table class="table">
	    <tr><td>Nama Product</td><td><?php echo $nama_product; ?></td></tr>
	    <tr><td>Stock</td><td><?php echo $stock; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
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
        <h2 style="margin-top:0px">Tb_order Read</h2>
        <table class="table">
	    <tr><td>Id Product</td><td><?php echo $id_product; ?></td></tr>
	    <tr><td>Referal</td><td><?php echo $referal; ?></td></tr>
	    <tr><td>Tgl Order</td><td><?php echo $tgl_order; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('order') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
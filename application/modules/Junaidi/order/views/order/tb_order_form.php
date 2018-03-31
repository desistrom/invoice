<!doctype html>
<html>
    <head>
        <title>Order</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px"><?php echo $button ?> Order</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Product <?php echo form_error('id_product') ?></label><!-- 
            <input type="text" class="form-control" name="id_product" id="id_product" placeholder="Id Product" value="<?php echo $id_product; ?>" /> -->
            <select class="form-control" name="id_product" id="id_product">
                <option value="">-- select product --</option>
                <?php foreach ($id_product as $key => $value): ?>
                    <option value="<?=$value['id_product'];?>"><?=$value['nama_product'];?></option>
                <?php endforeach ?>
            </select>
        </div>
        <?php if (isset($id)): ?>
    	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <?php endif ?>
	    <input type="hidden" name="id_order" value="<?php echo $id_order; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('order') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
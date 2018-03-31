<!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/> -->
<table id="datatable" class="table table-striped table-bordered">
    <tr>
        <th>No</th>
		<th>Id Transaksi</th>
		<th>Total harga</th>
		<th>Tgl Order</th>
		<th>Methode</th>
		<th>Status</th>
		<th>Action</th>
    </tr>
    <?php foreach ($trans as $key => $value): ?>
	    <tr>
			<td width="80px"><?=($key+1);?></td>
			<td><?=$value['id_transaksi'];?></td>
			<td>Rp. <?=$value['total'];?></td>
			<td><?=$value['tgl_transaksi'];?></td>
			<td><?php echo $value['methode']; ?></td>
			<td><?php echo $value['status']; ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				if ($this->session->userdata('previlage') == 1) {
					if ($crud['admin'] == 2) {
						echo anchor(site_url('transaksi/approve/'.$value['id_transaksi']),'Approve'); 
						echo ' | '; 
						echo anchor(site_url('transaksi/cancel/'.$value['id_transaksi']),'Cancel'); 
						echo ' | '; 
					}
				}
				else if($this->session->userdata('previlage') == 2){
					if ($crud['marketing'] == 2) {
						echo anchor(site_url('transaksi/approve/'.$value['id_transaksi']),'Approve'); 
						echo ' | '; 
						echo anchor(site_url('transaksi/cancel/'.$value['id_transaksi']),'Cancel'); 
						echo ' | '; 
					}
				}else if($this->session->userdata('previlage') == 0){
					if ($crud['staff'] == 2) {
						echo anchor(site_url('transaksi/approve/'.$value['id_transaksi']),'Approve'); 
						echo ' | '; 
						echo anchor(site_url('transaksi/cancel/'.$value['id_transaksi']),'Cancel'); 
						echo ' | '; 
					}
				}
				
				echo anchor(site_url('transaksi/detail/'.$value['id_transaksi']),'Detail'); 
				?>
			</td>
		</tr>
    <?php endforeach ?>
    
</table>
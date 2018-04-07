<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice</title>
	    <link rel="stylesheet" href="fonts/font-awesome.min.css">
	<style type="text/css">
	@page{
		margin: 0 0 0 -250px;
	}
	body{
		font-size: 14px;
		  font-family: 'Roboto', sans-serif;
		  width: 1290px;
		  margin: 0px;

	}
		h1,h2,h3,h4,h5,h6{
			margin: 5px 0;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.text-bold{
			font-weight:bold; 
		}
		.invoice4{
			padding: 3em 20em;

		}
		.container{
			background-color: #E1E1E1;
			height: auto;
			overflow: hidden;
			border:solid 1px #E1E1E1;
		}
		.header{
			height: auto;
			overflow: hidden;
			background-color: #434345;
			padding: 2em 15px 0 15px;
		}
		.header .sub-header{
			display: inline-block;
		}
		.header .header-left{
			float: left;
			color: white;
			padding-bottom: 30px;
		}
		.header .header-right{
			float: right;
			padding-top: 25px;
			color: #2DBBAD;
		}
/*		.header-line{
			height: auto;
			overflow: hidden;
			background-color: green;
		

		}
		.header-line .line{
			display: inline-block;
			padding: 0;
		}*/
		 .straight-line{
				background-color: #2DBBAD;
			height: 6px;
			width: 50%;

			margin-right: -1em;
		}
		 .square{
			 width: 0;
		    height: 0;
		    width: 10%;
		    float: left;
		    border-top: solid transparent 2em;
		    border-right: solid #2DBBAD 2em;
		    border-bottom: solid transparent 2em;
		/*    margin-top: -2em;*/
/*		    float: right;
		    margin-right: -1px;
		    margin-top: -2em;*/
		}
		 .rectangle h3{
			padding: 13px;
			width: 40%;
			color: white;
			float: right;
	
			background-color: #2DBBAD;
			/*margin-top: -2em;*/
		}
		.header-bottom {
			height: auto;
			overflow: hidden;
			padding: 15px;
			background-color: #E1E1E1;
		}
		.header-bottom .sub-header-bottom{
			display: inline-table;
		}		
		.header-bottom .sub-header-bottom.left{
			
			width: 50%;
			height: auto;
			overflow: hidden;
		}
		.header-bottom .sub-header-bottom.right{
			float: right;
			width: 50%;
			height: auto;
			overflow: hidden;
		}
		.content{
			background-color: white;
		}
		.content .table{
			width: 100%;
		}
		th,td{

			padding: 8px;
			empty-cells: 0;
		}
		.content .table thead{
			background-color: #2DBBAD;
			color: white;
		}
		.content .table thead tr th{
			text-align: left;
			border:solid 1px #2DBBAD;

		}
		.content .table tbody tr td{
			border-top: solid 1px #E1E1E1;
		}
		.content .table tbody tr td.cell-right{
			background-color: #E2F8F6;
		}
		.content .table .cell-foot-left{
			background-color: #E1E1E1;
		}
		.content .table .cell-foot-right{
			background-color: #2DBBAD;
			color: white;
		}
		.footer{
			background-color: white;
			height: auto;
			overflow: hidden;
			padding: 3em 15px 3em 7px;
		}
		.footer .sub-footer{
			display: inline-table;
		}
		.footer .footer-left{
			float: left;
			width: 50%;
		}
		.footer .footer-left tr th,
		.footer .footer-left tr td{
			padding: 0 8px;
		}
		.footer .footer-right{
			float: right;
			width: 50%;
			text-align: right;

		}
		.footer .footer-right .logo{
			width: auto;
			max-width: 200px;
			height: auto;
			margin-left: 450px;
			margin-top: -100px;
				
		}
		.text-footer{
			background-color: white;
		}
		.text-footer h5{
			border-bottom: solid 2px #2DBBAD;
			text-align: center;
			color: #2DBBAD;
			margin: 0;
		}
		.text-invoice{
			color: #2DBBAD;
			font-weight: bold;
			font-size: 45px;
		}
		.line-foot{
			background-color: #434345;
			height: 30px;
		}
		@media (max-width:1199px) {
			.invoice4{
				padding: 3em 15em;

			}
		}
		@media (max-width:991px) {
			.invoice4{
				padding: 3em 10em;

			}
		}
		@media (max-width:790px) {
			.invoice4{
				padding:15px;

			}
		}
		@media (max-width:570px) {
			.header .header-left{
				width: 60%;
				font-size: 12px;
			}
			.header .header-right{
				width: 40%;
			}
			.invoice4{
				padding:0;

			}
		}
	</style>
</head>
<body>
	<div class="invoice4">
		<div class="container">
			<div class="header" style="padding-bottom: 3.5em;">
				<table width="100%">
					<tr>
						<td style="color: white;width: 60%;">
								<h4><?=$result['nama_perusahaan'];?></h4>
                    			<h4><?=$result['alamat_perusahaan'];?></h4>
                    			<table>
                    				<tr style="padding: 0;font-weight:bold; ">
                    					<td style="padding: 0;">No. Telp</td>
                    					<td style="padding: 0;">:</td>
                    					<td style="padding: 0;"><?=$result['phone_perusahaan'];?></td>
                    				</tr>
                    				<tr style="padding: 0;font-weight:bold; ">
                    					<td style="padding: 0;">Email</td>
                    					<td style="padding: 0;">:</td>
                    					<td style="padding: 0;"><?=$result['email_perusahaan'];?></td>
                    				</tr>
                    			</table>
                    <!-- 			<h4>No. Telp :<?=$result['phone_perusahaan'];?></h4>
                    			<h4>Email : <?=$result['email_perusahaan'];?></h4>	 -->
						</td>
						<td style="width: 40%;">
							<h1 class="text-invoice">INVOICE</h1>
						</td>
					</tr>
				</table>
<!-- 				<div class="sub-header header-left">
 					<h4><?=$result['nama_perusahaan'];?></h4>
                    <h4 ><?=$result['alamat_perusahaan'];?></h4>
                 	<h4>
                 	<table cellspacing="0;">
                    	<tr>
                    		<td style="padding: 0 5px 0 0"><i class="fa fa-mobile-phone fa-2x"></i></td>
                    		<td style="padding: 0 5px 0 0"><?=$result['phone_perusahaan'];?></td>
                    	</tr>
                    	<tr>
                    		<td style="padding: 0 5px 0 0"><i class="fa fa-envelope"></i></td>
                    		<td style="padding: 0 5px 0 0"><?=$result['email_perusahaan'];?></td>
                    	</tr>
                    </table>
                 	</h4>
                </div> -->
       <!--          <div class="sub-header header-right" style="margin-left: -200px">
					<h1 class="text-invoice">INVOICE</h1>
				</div> -->
			</div>
			<table width="100%" style="margin-top: -2.3em; padding: 0;" >
				<tr style="padding: 0;">
					<td width="30%" style="padding: 0;">
						<div class="line straight-line" style="width: 100%;margin-left: -1em;"></div>
					</td>
					<td width="70%" style="padding: 0;">
						<table width="100%;" style="padding: 0;margin-right: -1em;">
							<tr style="padding: 0; ">
								<td style="padding: 0; ">
									<div class="line straight-line" style="width: 100%;"></div>
								</td>
								<td style="padding: 0;width: 5%; text-align: right">
									<div class="line square"></div>
								</td>
								<td style="padding: 0;width: 58%;background-color: #2DBBAD">
									<div class="line rectangle">
										<h3 style="background-color: #2DBBAD">No <?=$invoice['perfix'].$invoice['id_invoice'];?></h3>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		<!-- 	<div class="header-line" style="top: -10em;">
				<div class="line straight-line"></div>
				<div class="line square"></div>
				
				<div class="line rectangle" >
					<h3 style="background-color: #2DBBAD">#mg1239829387812387</h3>
				</div>

			</div> -->
			<div class="header-bottom">
				<table style="width: 100%;">
					<tr>
						<td style="width: 60%">
								
							<h2>INVOICE TO</h2>
							<h3><?=$invoice['nama'];?></h3>
							
						</td>
						<td style="width: 40%;">
							<div class="sub-header-bottom right" style="margin-top: -30px">
								<h4 style="">Total due : Rp. <?=number_format($invoice['harga'],2);?></h4>
								<h4 style="">Invoice Date : <?=date("d M Y", strtotime($invoice['created']));?></h4>
								<!-- <h4 style="">Invoice No : <?=$invoice['perfix'].$invoice['id_invoice'];?></h4> -->
							</div>
						</td>
					</tr>
				</table>
			

			</div>
			<div class="content">
				<table class="table" cellspacing="0">
					<thead>
						<tr>
							<th width="60%">Name Project</th>
							<th width="40%">Price</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><b><?=$invoice['project'];?></b><br>
								<span style=" color: #5A5A5A;"><?=$invoice['deskripsi'];?></span>
							</td>
							<td class="cell-right">Rp. <?=number_format($invoice['harga'],2);?></td>
						</tr>
						<tr>
							<td class="text-right text-bold">Total</td>
							<td class="text-bold cell-right">Rp. <?=number_format($invoice['harga'],2);?></td>
						</tr>
						<tr>
							<td class="text-right text-bold">Tax VAT <?=$result['pajak'];?>%</td>
							<td class="text-bold cell-right">Rp. <?=$pajak = number_format(($result['pajak']/100)*$invoice['harga'],2);?></td>
						</tr>
						<tr>
							<td class="text-right text-bold cell-foot-left">Total Due</td>
							<td class="text-bold cell-foot-right">Rp. <?=number_format($pajak+$invoice['harga'],2);?></td>
						</tr>

					</tbody>
				</table>
			</div>
			<div class="footer">
						<caption class="text-bold" style="text-align:left;padding-left: 8px;">TRANSFER TO</caption>
				<div class="sub-footer footer-left">

					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?=$result['nama_rekening'];?></td>
						</tr>
						<tr>
							<td>Nama Bank</td>
							<td>:</td>
							<td><?=$result['nama_bank'];?></td>
						</tr>
						<tr>
							<td>No. rek.</td>
							<td>:</td>
							<td><?=$result['no_rekening'];?></td>
						</tr>
					</table>
				</div>
				<div class="sub-footer footer-right">
					<img class="logo" src="<?=$_SERVER['DOCUMENT_ROOT'].'/invoice/assets/file/'.$result['logo']; ?>">
				</div>
			</div>
			<div class="text-footer">
				<h5>THANK YOU FOR YOUR BUSINESS</h5>
			</div>
			<div class="line-foot"></div>

				
			</div>
		</div>
	</div>
</body>
</html>
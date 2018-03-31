<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice 3</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
     <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/css/style_invoice3.css">
</head>

<body>
    <div class="container wraper">
        <div class="sub-wraper">
            <div class="row header-top">
                <div class="col-md-4 col-sm-4 col-xs-4 header-top-left">
                    <div class="img-logo"><img class="img-responsive logo" src="<?=base_url();?>assets/file/<?=$result['logo'];?>"></div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 header-top-right">
                    <div class="col col-md-12 col-sm-12 col-xs-12 sub-header-top-right">
                        <div class="col col-md-4 col-sm-4 col-xs-4"><i class="fa fa-building"></i>
                            <h5><?=$result['nama_perusahaan'];?> </h5></div>
                        <div class="col col-md-4 col-sm-4 col-xs-4"><i class="fa fa-map-marker"></i>
                            <h5><?=$result['alamat_perusahaan'];?></h5></div>
                        <div class="col col-md-4 col-sm-4 col-xs-4"><i class="fa fa-mobile-phone"></i>
                            <h5><?=$result['phone_perusahaan'];?> <?=$result['email_perusahaan'];?></h5></div>
                    </div>
                </div>
            </div>
            <div class="row line">
                <div class="col col-md-4 col-sm-4 col-xs-4 sub-header-left">
                    <h3>INVOICE TO</h3>
                    <h4><?=$invoice['nama'];?></h4></div>
                <div class=" col-md-8 col-sm-8 col-xs-8 sub-header-right">
                    <h1 class="invoice-text">INVOICE </h1></div>
            </div>
            <div class="row header-bottom">
                <div class="col-md-4 col-sm-4 col-xs-4 col">
                    <h5><i class="glyphicon glyphicon-list-alt icon"></i> No Invoice : <?=$invoice['perfix'].$invoice['id_invoice'];?></h5></div>
                <div class="col-md-4 col-sm-4 col-xs-4 col">
                    <h5><i class="glyphicon glyphicon-calendar icon"></i> Invooice Date : <?=date("d M Y", strtotime($invoice['created']));?></h5></div>
                <div class="col-md-4 col-sm-4 col-xs-4 col">
                    <h5> <i class="glyphicon glyphicon-usd icon"></i> Total due : Rp. <?=$invoice['harga'];?></h5></div>
            </div>
            <div class="row content">
                <div class="col-md-12 sub-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project name</th>
                                    <th class="tb-cell-right">Price </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tb-cell-border-white"><?=$invoice['project'];?> <br>
                                        <span style="font-size: 11px;color: #A5A5A5;"><?=$invoice['deskripsi'];?> </span>
                                    </td>
                                    <td class="tb-cell-border-white tb-cell-right">Rp <?=$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="tb-cell-text-right tb-cell-border-white">Total </td>
                                    <td class="tb-cell-border-white tb-cell-right">Rp. <?=$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="tb-cell-text-right tb-cell-border-white">Tax VAT <?=$result['pajak'];?>%</td>
                                    <td class="tb-cell-border-white tb-cell-right">Rp. <?=$pajak = ($result['pajak']/100)*$invoice['harga'];?> </td>
                                </tr>
                                <tr>
                                    <td class="tb-cell-border-white tb-cell-footer-left">Total Amount due</td>
                                    <td class="tb-cell-footer-right">Rp. <?=$pajak+$invoice['harga'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h5 class="text-bold">TRANSFER TO</h5>
                    <h5>Nama : <?=$result['nama_rekening'];?></h5>
                    <h5>Nama Bank : <?=$result['nama_bank'];?></h5>
                    <h5>No. Rekening : <?=$result['no_rekening'];?></h5></div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-footer">
                    <h4 class="text-center">THANK YOU FOR YOUR BUSINESS</h4></div>
            </div>
        </div>
    </div>
   <script src="<?=base_url();?>assets/invoice1/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/invoice1/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
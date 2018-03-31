<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice 5</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/css/style_invoice5.css">
</head>

<body>
    <div class="container invoice5">
        <div class="col-md-12 col-sm-12 col-xs-12 sub-invoice5">
            <div class="row header-top">
                <div class="col-md-7 col-sm-7 col-xs-7 header-top-right">
                    <div class="img-filter"><img src="assets/img/logo-ex-5.png"></div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5 header-top-left none-padding">
                    <h5><?=$result['nama_perusahaan'];?></h5>
                    <h5><?=$result['alamat_perusahaan'];?></h5>
                    <h5><i class="glyphicon glyphicon-phone"></i> <?=$result['phone_perusahaan'];?></h5>
                    <h5><i class="glyphicon glyphicon-envelope"></i> <?=$result['email_perusahaan'];?></h5></div>
            </div>
            <div class="row header-center">
                <div class="col-md-4 col-sm-4 col-xs-4 sub-header-center sub-header-center-left">
                    <div class="col col-md- col-sm-4 col-xs-4 none-padding ribbon-short ribbon-short-left ">
                        <div class="bg-blue-double-dark"></div>
                    </div>
                    <div class="col col-md-8 col-sm-8 col-xs-8 ribbon-long bg-blue-dark"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 sub-header-center sub-header-center-center-center text-bold bg-blue-dark">
                    <h2 class="text-center text-bold text-invoice">INVOICE </h2></div>
                <div class="col-md-4 col-sm-4 col-xs-4 sub-header-center sub-header-center-right">
                    <div class="col col-md-8 col-sm-8 col-xs-8 ribbon-long bg-blue-dark"></div>
                    <div class="col col-md-4 col-sm-4 col-xs-4 none-padding ribbon-short ribbon-short-right ">
                        <div class="bg-blue-double-dark"></div>
                    </div>
                </div>
            </div>
            <div class="row header-bottom">
                <div class="col-md-6 col-sm-5 col-xs-5 sub-header-bottom-left">
                    <h4 class="text-bold">INVOICE TO</h4>
                    <h5><?=$invoice['nama'];?></h5></div>
                <div class="col-md-6 col-sm-7 col-xs-7 sub-header-bottom-right none-padding">
                    <ul class="list-inline">
                        <li class="li-date">No Invoice: <?=$invoice['perfix'].$invoice['id_invoice'];?></li>
                        <li>Date : <?=date("d M Y", strtotime($invoice['created']));?> </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 none-padding">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-blue-dark">
                                <tr>
                                    <th>Project-name </th>
                                    <th>Price </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b><?=$invoice['project'];?></b><br>
                                         <span style="font-size: 11px;color: #A5A5A5;"><?=$invoice['deskripsi'];?> </span>
                                    </td>
                                    <td class="tb-cell-right bg-blue-light">Rp. <?=$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right text-bold">Total </td>
                                    <td class="tb-cell-right bg-blue-light text-bold">Rp. <?=$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right text-bold">Tax VAT <?=$result['pajak'];?>%</td>
                                    <td class="tb-cell-right bg-blue-light text-bold">Rp. <?=$pajak = ($result['pajak']/100)*$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right text-bold tb-cell-foot-left">Total Amount Due</td>
                                    <td class="tb-cell-foot-right bg-blue-dark text-bold">Rp. <?=$pajak+$invoice['harga'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <h4 class="text-bold">Transfer to</h4>
                    <h5>Nama : <?=$result['nama_rekening'];?></h5>
                    <h5>Nama Bank : <?=$result['nama_bank'];?></h5>
                    <h5>No. Rekening : <?=$result['no_rekening'];?></h5></div>
            </div>
            <div class="row footer-line border-blue">
                <div class="col-md-8 col-sm-8 col-xs-8 footer-line-left none-padding color-blue">
                    <h3 class="text-footer text-bold">Thank You For Your Business</h3></div>
                <div class="col-md-2 col-sm-2 col-xs-2 footer-line-triangle none-padding">
                    <div class="triangle triangle-blue"></div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2 footer-line-right none-padding text-center bg-blue-dark"><img src="assets/img/logo-ex-5.png"></div>
            </div>
        </div>
    </div>
    <script src="<?=base_url();?>assets/invoice1/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/invoice1/assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>

</html>
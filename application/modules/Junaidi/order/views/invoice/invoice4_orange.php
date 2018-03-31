<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice 4</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/css/style_invoice4.css">

<body>
    <div class="container invoice4">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col sub-invoice">
            <div class="row header-top">
                <div class="col-md-8 col-sm-8 col-xs-8 header-top-left">
                    <h5><?=$result['nama_perusahaan'];?></h5>
                    <h5><?=$result['alamat_perusahaan'];?></h5>
                    <h5><i class="glyphicon glyphicon-phone"></i> <?=$result['phone_perusahaan'];?></h5>
                    <h5><i class="glyphicon glyphicon-envelope"></i> <?=$result['email_perusahaan'];?></h5></div>
                <div class="col-md-4 col-sm-4 col-xs-4 header-top-right">
                    <div class="filter-image">
                        <h1 class="text-invoice text-orange">INVOICE </h1></div>
                </div>
            </div>
            <div class="row header-line">
                <div class="col-md-4 col-sm-4 col-xs-2"></div>
                <div class="col-md-8 col-sm-8 col-xs-10 none-padding">
                    <div class="col col-md-4 col-sm-4 col-xs-4">
                        <div class="shape-line bg-orange-dark"></div>
                    </div>
                    <div class="col col-md-2 col-sm-2 col-xs-2 none-padding">
                        <div class="shape-segitiga segitiga-orange"></div>
                    </div>
                    <div class="col col-md-6 col-sm-6 col-xs-6 none-padding shape-persegi bg-orange-dark">
                        <h3>No. <?=$invoice['perfix'].$invoice['id_invoice'];?></h3></div>
                </div>
            </div>
            <div class="row header-bottom">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <h3>Invoice to</h3>
                    <h4><?=$invoice['nama'];?></h4></div>
                <div class="col-md-4 col-sm-4 col-xs-4 none-padding">
                    <h4>Invoice Date : <?=date("d M Y", strtotime($invoice['created']));?></h4>
                    <h4>Total due : Rp. <?=$invoice['harga'];?></h4></div>
            </div>
            <div class="row content">
                <div class="col-md-12 col-sm-12 col-xs-12 none-padding">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-orange-dark">
                                <tr>
                                    <th>Name Project</th>
                                    <th>Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b><?=$invoice['project'];?></b><br>
                                        <span style="color:#969696;font-size: 12px; "><?=$invoice['deskripsi'];?></span>
                                    </td>
                                    <td class="bg-orange-light">Rp. <?=$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right text-bold">Total </td>
                                    <td class="bg-orange-light">Rp. <?=$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right text-bold">Tax VAT <?=$result['pajak'];?>%</td>
                                    <td class="bg-orange-light">Rp. <?=$pajak = ($result['pajak']/100)*$invoice['harga'];?></td>
                                </tr>
                                <tr>
                                    <td class="text-right text-bold bg-color-default">Total Amount Due</td>
                                    <td class="bg-color-green-dark bg-orange-dark" style="color: white;">Rp. <?=$pajak+$invoice['harga'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <h4 class="text-bold">TRANSFER TO</h4>
                    <h4>Nama : <?=$result['nama_rekening'];?></h4>
                    <h4>Nama Bank : <?=$result['nama_bank'];?></h4>
                    <h4>No. Rekening : <?=$result['no_rekening'];?></h4></div>
                <div class="col-md-5 col-sm-5 col-xs-5 filter-img text-center"><img class="img-responsive img-logo" src="<?=base_url();?>assets/file/<?=$result['logo'];?>"></div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-footer">
                    <h3 class="text-center text-bold text-orange">THANK YOU FOR YOUR BUSINESS</h3></div>
            </div>
        </div>
    </div>
    <script src="<?=base_url();?>assets/invoice1/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/invoice1/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice1</title>
    <!-- <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice1/assets/css/styles.css">
    
</head>

    <div class="container content">
        <div class="col col-md-12 col-sm-12 col-xs-12 box">
            <div class="row header">
                <div class="col-md-7 col-sm-7 col-xs-6 header-logo"><img class="img-responsive img-logo" src="<?=base_url();?>assets/file/<?=$result['logo'];?>"></div>
                <div class="col-md-5 col-sm-5 col-xs-6 header-left">
                    <h5>Dari : Softnesia</h5>
                    <h5><?=$result['alamat_perusahaan'];?></h5>
                    <h5><i class="glyphicon glyphicon-phone"></i> <?=$result['phone_perusahaan'];?></h5>
                    <h5><i class="glyphicon glyphicon-envelope"></i> <?=$result['email_perusahaan'];?></h5></div>
            </div>
            <div class="row sub-header">
                <div class="col-md-4 col-sm-4 col-xs-4 sub-header-left">
                    <h4>No Invoice : <?=$invoice['perfix'].$invoice['id_invoice'];?></h4>
                    <h4>Tanggal Invoice : <?=date("d M Y", strtotime($invoice['created']));?></h4>
                    </div>
                <div class="col-md-8 col-sm-8 col-xs-8 sub-header-right">
                    <h4>kepada : <?=$invoice['nama'];?></h4></div>
            </div>
            <div class="row content">
                <div class="col-md-12 sub-content">
                    <div class="">
                        <table class="table">
                            <thead class="content-header">
                                <tr>
                                    <th> No</th>
                                    <th>Nama Project
                                      

                                    </th>
                                
                                    <th>Harga </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tb-row-content">
                                    <td>1 </td>
                                    <td><?=$invoice['project'];?></td>
                                    
                                    <td><?=$invoice['harga'];?></td>
                                </tr>
                                <tr class="tb-row-content">
                                    
                                    <td class="border-right"> </td>
                                    <td class="tb-cell-total">Total </td>
                                    <td class="tb-cell-price">Rp. <?=$invoice['harga'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Silahkan transfer ke :</h4></div>
            </div>
            <p>Nama : Dika</p>
            <p>Nama Bank : BAnk Mandiri</p>
            <p>No Rek. : 1999921110-12</p>
        </div>
    </div>
    <script src="<?=base_url();?>assets/invoice1/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/invoice1/assets/bootstrap/js/bootstrap.min.js"></script>

</html>
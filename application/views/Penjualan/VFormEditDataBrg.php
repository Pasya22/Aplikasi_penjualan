<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>

    <div class="card text-black  mb-3" ;>
        <h5 class=" card-header" style="margin-left: 20%; margin-right:20%;">Form Edit Data Barang </h5>
        <div class="card-body">

            <form role="form" action="<?php echo site_url('Welcome/EditDataBrg/') . $tampil2->id; ?>"
                enctype="multipart/form-data" method="post" style="margin-left:20%;">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input class="form-control validate" type="hidden" name="username" value="<?= $tampil2->id; ?>">
                        <input class="form-control validate" type="text" name="nama_brg"
                            value="<?= $tampil2->nama_brg; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Upload</label>
                        <input class="form-control validate" type="file" name="foto_brg"
                            value="<?php echo $tampil2->foto_brg; ?>" required>
                        <br>
                        <img width="100px" height="100px" src="<?php echo base_url('./foto/' . $tampil2->foto_brg); ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga Beli :</label>
                        <input class="form-control validate" type="text" name="harga_beli"
                            onkeypress="return hanyaAngka(event)" value="<?php echo $tampil2->harga_beli; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Harga Jual</label>
                        <input class="form-control validate" type="text" name="harga_jual"
                            onkeypress="return hanyaAngka(event)" value="<?php echo $tampil2->harga_jual; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stok Barang</label>
                        <input class="form-control validate" type="text" name="stok"
                            onkeypress="return hanyaAngka(event)" value="<?php echo $tampil2->stok; ?>" required>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <script>
            function hanyaAngka(event) {
                var harga_beli = (event.which) ? event.which : event.keyCode
                var harga_jual = (event.which) ? event.which : event.keyCode
                var stok = (event.which) ? event.which : event.keyCode
                if (harga_beli != 46 && harga_beli > 31 && (harga_beli < 48 || harga_beli > 57))
                    if (harga_jual != 46 && harga_jual > 31 && (harga_jual < 48 || harga_jual > 57))
                        if (stok != 46 && stok > 31 && (stok < 48 || stok > 57))
                            return false;
                return true;
            }
            </script>
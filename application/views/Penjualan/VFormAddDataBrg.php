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
    <!-- <link rel="stylesheet" href="http://temp/dist/css/AdminLTE.min.css"> -->

</head>

<body>
    <div class="card text-black  mb-3" ;>
        <h5 class=" card-header" style="margin-left: 20%; margin-right:20%;">Form Add Data Barang </h5>
        <div class="card-body" style="margin-left:20%;">
            <?= form_open_multipart('Welcome/AddDataBrg'); ?>
            <div class="box-body">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="hidden" class="form-control" id="inputEmail3" placeholder="Kode" name="id"><br>
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Barang"
                            name="nama_brg" required><br>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Upload </label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="inputEmail3" name="foto_brg"
                            enctype="multipart/form-data" required><br>
                    </div>
                </div>
                <div class=" form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Harga Beli</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control " id="inputEmail3" placeholder="Harga Beli"
                            name="harga_beli" onkeypress="return hanyaAngka(event)" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">harga Jual</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Harga Jual"
                            name="harga_jual" onkeypress="return hanyaAngka(event)" required><br>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Stok Barang" name="stok"
                            onkeypress="return hanyaAngka(event)" required><br>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-info pull-right" value="simpan">
            </div>
            <!-- /.box-footer -->
            </form>

        </div>
    </div>
    <br>
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
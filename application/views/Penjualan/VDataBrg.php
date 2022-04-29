<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="<?= site_url('Welcome'); ?>">Home </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('Welcome/DataBrg'); ?>">Data Barang<span
                    class="sr-only">(current)</span></a>
        </li>
    </ul>
</div>
</nav>
<br>
<div class="col-md-10 side-devider" style="margin-left: 7%;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Add Data Barang
    </button>
    <?= $this->session->flashdata('message'); ?>
    <?= $this->session->flashdata('msg'); ?>
    <?= $this->session->flashdata('msgDel'); ?>
    <?= $this->session->flashdata('msgEdit'); ?>
    <?= $this->session->flashdata('msgUbah'); ?>
    <!-- <a href="<?= site_url('Welcome/VFormAddDataBrg'); ?>" class="btn btn-success">Add Data</a> -->
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Foto Barang</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                foreach ($tampil as $rm) {
                ?>
            <tr>
                <th scope="row"><?= $rm->id; ?></th>
                <td>
                    <?= $rm->nama_brg ?>
                </td>
                <td>
                    <img src="<?= base_url('foto/'); ?><?= $rm->foto_brg ?>" width="67px" height="80px"
                        alt="<?= $rm->foto_brg ?>">
                </td>
                <td>
                    <?= $rm->harga_beli; ?>
                </td>
                <td>
                    <?= $rm->harga_jual; ?> </td>
                <td>
                    <?= $rm->stok; ?>
                </td>
                <td>
                    <a href="<?= site_url('Welcome/VFormEditDataBrg/') . $rm->id; ?>" class="btn btn-info"><i
                            class="fa fa-edit">
                        </i></a>
                    <a href="<?= site_url('Welcome/DeleteDataBrg/') . $rm->id; ?>" class="btn btn-danger delete"
                        onclick="javascript: return confirm('apakah anda yakin ?')"><i class="fa fa-trash">
                        </i></a>
                </td>
                <td>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- <div class="bottom_shadow"></div> -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Welcome/AddDataBrg'); ?>" method="post" enctype="multipart/form-data">

                    <!-- <div class="box-body"> -->

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="recipient-name" placeholder="Kode" name="id"><br>
                        <label for="recipient-name" class="col-form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="recipient-name nama_brg" placeholder="Nama Barang"
                            name="nama_brg" required><br>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Upload </label>
                        <input type="file" class="form-control" id="recipient-name foto_brg" name="foto_brg"
                            enctype="multipart/form-data" required><br>
                    </div>
                    <div class=" form-group">
                        <label for="recipient-name" class="col-form-label"> Harga Beli</label>
                        <input type="text" class="form-control " id="recipient-name harga_beli" placeholder="Harga Beli"
                            name="harga_beli" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Harga Jual</label>
                        <input type="text" class="form-control" id="recipient-name harga_jual" placeholder="Harga Jual"
                            name="harga_jual" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stok</label>
                        <input type="text" class="form-control" id="recipient-name stok" placeholder="Stok Barang"
                            name="stok" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <!-- </div> -->
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <input type="submit" name="simpan" class="btn btn-primary" id="simpan" value="simpan"> -->
                <button class="btn btn-primary" type="submit" name="simpan">simpan</button>
                <!-- <button type="button" class="btn btn-primary" ">Save changes</button> -->
            </div>
            </form>
        </div>
    </div>
</div>
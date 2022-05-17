<div class="hasil-data">
<div class="modal fade" id="tambah_data_produk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Data Produk</h4>
            </div>
            <div class="modal-body">
                <form action="tambah_proses_data_produk.php" method="POST">
                <label>ID Produk<font color="red">*</font></label>
                <input class="form-control" name="id_produk" required="">
                <label>Nama Produk<font color="red">*</font></label>
                <input class="form-control" name="nm_produk" required="">
                <label>Merek Produk</label>
                <input class="form-control" name="merek_produk">
                <label>Ukuran Produk</label>
                <input class="form-control" name="ukuran_produk">
                <label>Harga Produk (Rp)<font color="red">*</font></label>
                <input class="form-control" name="hrg_produk" required="">
                <label>Harga Satuan Produk (Rp)</label>
                <input class="form-control" name="hrg_satuan_produk">
                <label>Stok Produk (Pcs)<font color="red">*</font></label>
                <input class="form-control" name="stok_produk" required="">
                <label>Kategori Produk<font color="red">*</font></label>
                <select class="form-control" name="kategori_produk" required="">
                    <option value="Alat Musik">Alat Musik</option>
                    <option value="Alat Pancing">Alat Pancing</option>
                    <option value="Alat Olahraga">Alat Olahraga</option>
                </select>
                <label>Foto Produk (Jpg)<font color="red">*</font></label>
                <input type="file" name="foto_produk" required="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="tambah_data_produk">Tambah</button>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
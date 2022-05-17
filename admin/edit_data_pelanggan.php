<?php
$id=isset($_GET['id']) ? $_GET['id'] : '';
$show=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
  if(mysqli_num_rows($show)==0){
    $status = 'ada';
  }else{
    $status = 'tiada';
    $data=mysqli_fetch_assoc($show);
  }
?>

<input type="hidden" name="id" value="<?php echo $id;?>">
<section class="col-md-12">
  <style>
.modal-content {
    height: 900px;
  </style>
  <div class="modal fade" id="edit_data_pelanggan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><center><b>Edit Data Pelanggan</b></center></h4>
                </div>
                <div class="modal-body mymodal-body">

                  <div class="col-md-12 divider"></div>
                  <div class="col-md-12" style="text-align: left;">
                    <center><?php echo '<img src="../images/'.$data['foto'].'" height="150px" width="150px">'; ?></center>
    <form action="edit_proses_data_pelanggan.php" method="POST" id="login-form">
        <div class="form-group">
          <label class="label-control">
            <span class="label-text">ID Pelanggan<font color="red">*</font></span>
          </label>
          <input type="text" name="id_pelanggan" class="form-control" value='<?php echo $data['id_pelanggan']; ?>' readonly/>
        </div>        <div class="form-group">
          <label class="label-control">
            <span class="label-text">Username<font color="red">*</font></span>
          </label>
          <input type="text" name="username" class="form-control" value='<?php echo $data['username']; ?>' readonly/>
        </div>
         <div class="form-group">
          <label class="label-control">
            <span class="label-text">Email<font color="red">*</font></span>
          </label>
          <input type="text" name="email" class="form-control" value='<?php echo $data['email']; ?>' required/>
        </div>
        <div class="form-group">
          <label class="label-control">
            <span class="label-text">Nama<font color="red">*</font></span>
          </label> 
          <input type="text" name="nama_lengkap" class="form-control" value='<?php echo $data['nama_lengkap']; ?>' required/>
        </div>
          <label class="label-control">
            <span class="label-text">Jenis Kelamin<font color="red">*</font></span>
          </label><br>
                              <input name="jkel" type="radio" value="L" required="" <?php if($data['jkel']=='L'){echo'checked';}?>>Laki-Laki
                              <input name="jkel" type="radio" value="P" required="" <?php if($data['jkel']=='P'){echo'checked';}?>>Perempuan<br><br>
        <div class="form-group">
          <label class="label-control">
            <span class="label-text">Foto</span>
          </label>
                              <input type="hidden" name="fotoawal" value="<?php echo $data['foto']; ?>" />
                              <input type="file" name="foto" value="<?php echo $data['foto']; ?>"/>
        </div>
        <div class="form-group">
          <label class="label-control">
            <span class="label-text">No Telp<font color="red">*</font></span>
          </label> 
          <input type="text" name="no_telp" class="form-control" value='<?php echo $data['no_telp']; ?>' required/>
        </div>
        <div class="form-group">
          <label class="label-control">
            <span class="label-text">Alamat<font color="red">*</font></span>
          </label> 
          <input type="text" name="alamat" class="form-control" value='<?php echo $data['alamat']; ?>' required/>
        </div>
        <input type="submit" value="Perbarui Data" class="btn" name="simpan"/><input type="reset" value="Kembali Semula" class="btn" />
    </form>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function(){
  $('.form-group input').on('focus blur', function (e) {
      $(this).parents('.form-group').toggleClass('active', (e.type === 'focus' || this.value.length > 0));
  }).trigger('blur');
});
</script>
<br>
                  </div>
              </div>
        </div>
      </div>
    </div>
</section>
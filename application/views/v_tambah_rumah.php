
<div class="col-lg-7">
  <div class="panel panel-primary">
     <div class="panel-heading"><i class="fa fa-plus"></i>
           Lokasi rumah kisaran
     </div>
         <div class="panel-body">
              <?= $map['html']; ?>
         </div>
         </div>
         </div>


<div class="col-lg-5">
 <div class="panel panel-danger">
  <div class="panel-heading">
           Input data User Admin
  </div>
    <div class="panel-body">
              <!-- Form Input Data -->
          <?php echo form_open_multipart('home/tambah_rumah') ?>
              <!-- rumkit/input, input ini kita ambil dari function input dalam folder controller>rumkit -->
          <div class="form-group">
            <label>Nama Perumahan</label>
            <input class="form-control" name="nama_rumkit"  required>
          </div>

         <div class="form-group">
            <label>Nomor IMB</label>
            <input class="form-control" name="kecamatan"  required>
          </div>

           <div class="form-group">
            <label>No Telpon</label>
            <input class="form-control" name="no_telpon" required>
          </div>
          
           <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" name="alamat"  required>
          </div>

           <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude"  >
          </div>

           <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" >
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
          <textarea class="form-control" name="deskripsi" cols="50" required></textarea>
          </div>

          <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="filefoto" class="form-control" required>
          </div>

           <div class="form-group">
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            <button class="btn btn-success btn-sm" type="reset">Reset</button>
          </div>

          <?php echo form_close() ?>
        </div>
      </div>
      </div>


    <div class="row"></div>
                                      



          
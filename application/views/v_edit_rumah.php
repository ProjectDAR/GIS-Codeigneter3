
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
           Edit data User Admin
  </div>
    <div class="panel-body">
              <!-- Form Input Data -->
          <?php 
          echo form_open('home/edit/'.$rumah->id_rumkit);
         ?>
              <!-- rumkit/input, input ini kita ambil dari function input dalam folder controller>rumkit -->
          <div class="form-group">
            <label>Nama Perumahan</label>
            <input class="form-control" value=" <?=$rumah->nama_rumkit ?>" name="nama_rumkit" placeholder="Nama Rumah Sakit" required>
          </div>

          <div class="form-group">
            <label>Nomor IMB</label>
            <input class="form-control" value=" <?=$rumah->kecamatan ?>" name="kecamatan" placeholder="Nama Rumah Sakit" required>
          </div>

           <div class="form-group">
            <label>No Telpon</label>
            <input class="form-control" value=" <?=$rumah->no_telpon ?>"name="no_telpon" placeholder="No Telpon" required>
          </div>

           <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" value=" <?=$rumah->alamat ?>" name="alamat" placeholder="Alamat" required>
          </div>

           <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" value=" <?=$rumah->latitude ?>" name="latitude" placeholder="Latitude">
          </div>

           <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" value=" <?=$rumah->longitude ?>"name="longitude" placeholder="longitude" >
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
          <textarea class="form-control" name="deskripsi" cols="50" required><?=$rumah->deskripsi?></textarea>
          </div>

          <div class="form-group">
          <div class="col-md-3">
              <img style="width:100%;" src="<?php echo base_url($rumah->gambar)?>" alt=""> 
          </div>
          
              <label for="image">Update Photo</label> 
              <input class="form-control" style="padding:3px;"  value=" <?=$rumah->gambar ?>" type="file" name="filefoto" size="20" class="form-control"> 
           
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
                                      



          
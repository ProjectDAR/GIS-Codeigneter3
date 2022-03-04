 <!-- /.col -->
     
        <!-- /.col -->



<div class="col-lg-5">
 <div class="panel panel-danger">
  <div class="panel-heading">
           Input data User Admin
  </div>
    <div class="panel-body">
              <!-- Form Input Data -->
          <?php echo form_open_multipart('user/tambah_user') ?>
              <!-- rumkit/input, input ini kita ambil dari function input dalam folder controller>rumkit -->
              <div class="form-group">
            <label>Nama Admn</label>
            <input class="form-control" name="nama_user"  required>
          </div>
         

           <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="username" placeholder="Username" required>
          </div>

           <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
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
                                      



          
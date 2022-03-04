



<div class="col-lg-5">
 <div class="panel panel-danger">
  <div class="panel-heading">
           Input data User Admin
  </div>
    <div class="panel-body">
              <!-- Form Input Data -->
          <?php echo form_open('user/edit/'.$user->id_user);?>
              <!-- rumkit/input, input ini kita ambil dari function input dalam folder controller>rumkit -->
           <div class="form-group">
            <label>Nama User</label>
            <input class="form-control" value=" <?=$user->nama_user ?>" name="nama_user" placeholder="Nama user" required>
          </div>

           <div class="form-group">
            <label>Username</label>
            <input class="form-control" value=" <?=$user->username ?>" name="username" placeholder="Username" required>
          </div>

           <div class="form-group">
            <label>Password</label>
            <input class="form-control" value=" <?=$user->password ?>" type="password" name="password" placeholder="Password" required>
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
                                      



          
<div class="box">
            <div class="box-header">
          <a href="<?= base_url('user/tambah_user') ?>"class="btn btn-primary">Input Data</a>
          <br><br>

         
          <div  class="external-event bg-green col-lg-3 col-xs-6">
            
          <?php 
             echo $this->session->flashdata('pesan');
          ?>
         
        </div> 

            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
            <th>NO</th>
            <th>Nama User</th>
             <th>Username</th>
              <th class="form-control" type="password">Password</th>
              
               <th>Action</th>
                </tr>
                </thead>
          <tbody>
            <?php $no=1; foreach ($user as $key => $value) {?>
        <tr>  
            <td>  <?= $no++; ?> </td>
            <td> <?= $value->nama_user ?> </td>
            <td> <?= $value->username ?> </td> 
            <td> <?= $value->password ?> </td>

             
            
<!-- Codingan baris 49 dan 55 merupakan menyembunyikan button edit dan delete jika yg masuk bkan admin -->
            <td>
              <a href="<?= base_url('user/edit/'.$value->id_user); ?>"class="btn btn-success btn-sm">Edit</a> 
              <a href="<?= base_url('user/delete/'.$value->id_user); ?>" class="btn btn-danger btn-sm" onclick="return confirm ('Apakah data ingin dihapus?')">Delete</a>
           </td>
           
        </tr>
         <?php } ?>

         </tbody>
                
              </table>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
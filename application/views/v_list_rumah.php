<div class="box">
            <div class="box-header">
                
<?php if ($this->session->userdata('username')<>"") {?>
          <a href="<?= base_url('home/tambah_rumah') ?>" class="btn btn-primary">InputData</a>
       <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: #0077b3">
                <tr >
                 <th style="color: white">NO</th>
                  <th style="color: white">Perumahan</th>
                  <th style="color: white">No IMB</th>
                  <th style="color: white">Alamat</th>
                  <th style="color: white">No Telpon</th>
                  <th style="color: white">Latitude</th>
                  <th style="color: white">longitude</th>
                  <th style="color: white">Deskripsi</th>
                   <th style="color: white">Gambar</th>
                   
                  <th style="color: white">Action</th>
                  
                </tr>
                </thead>
          <tbody>
            <?php $no=1; foreach ($rumah as $key => $value) {?>
        <tr>  
            <td>  <?= $no++; ?> </td>
            <td> <?= $value->nama_rumkit ?> </td>
            <td> <?= $value->kecamatan ?> </td>
            <td> <?= $value->alamat ?> </td> 
            <td> <?= $value->no_telpon ?> </td>
            <td> <?= $value->latitude ?> </td>
            <td> <?= $value->longitude ?> </td>
            <td> <?= $value->deskripsi ?> </td>

             <td><img src="<?php echo base_url($value->gambar) ?> " width="100px" height="100px"> </td>
            
<!-- Codingan baris 49 dan 55 merupakan menyembunyikan button edit dan delete jika yg masuk bkan admin -->
            
            <td>
              <a class="btn btn-success btn-sm btn-flat" href="<?= base_url('home/tampil_detail/'.$value->id_rumkit); ?>"><i class="fa fa-map-o"></i> View Map</a><br><br>
              <?php if ($this->session->userdata('username')<>"") {?>
              <a href="<?= base_url('home/edit/'.$value->id_rumkit); ?>"class="btn btn-success btn-sm">Edit</a> 
              <a href="<?= base_url('home/delete/'.$value->id_rumkit); ?>" class="btn btn-danger btn-sm" onclick="return confirm ('Apakah data ingin dihapus?')">Delete</a>
           </td>
           <?php } ?>
           
        </tr>
         <?php } ?>

         </tbody>
                
              </table>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
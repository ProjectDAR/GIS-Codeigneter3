<br>

  <div class="row">
    <div class="col-sm-5">
      <div class="panel panel-primary">
        <div class="panel-heading">    
          Lokasi Perumahan
        </div>
        <div class="panel-body">
        <script type="text/javascript">
            var centreGot = false;
        </script>
          
          <?=$map['html'];?>
          
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>

<div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">    
          Detail Rute
          
        </div>
        <div class="panel-body">
         <div id="directionsDiv"></div>
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>

   <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading">    
          Detail Tempat
        </div>
        <div class="panel-body">
         <?php 
          echo form_open('home/tampil_detail/'.$rumah->id_rumkit);
         ?>

         <div class="form-group">
         <div class="col-md-10">
        <p>Nama Rumah: <?=$rumah->nama_rumkit?></p>
        <p>Kecamatan: <?=$rumah->kecamatan?></p>
        <p>Alamat: <?=$rumah->alamat?></p>
        <p>No Hp: <?=$rumah->no_telpon?></p>
        <p>Latitude: <?=$rumah->latitude?></p>
        <p>Longitude: <?=$rumah->longitude?></p>
        +===============+
        <p>Keterangan: <?=$rumah->deskripsi?></p>

        </div>
         </div>

        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
    



          
       
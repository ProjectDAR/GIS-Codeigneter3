

  <!-- =============================================== -->

  

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <!-- <small>it all starts here</small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div>
       
      </div>


      <!-- /.box -->
<?php 
if ($isi) {
  $this->load->view($isi);  
}
?>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

 

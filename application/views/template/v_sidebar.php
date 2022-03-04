<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <br>
            <?php if ($this->session->userdata('username')<>"") {?>
           <b style="color: white"><?php echo $this->session->userdata('nama_user'); ?></b> 
        <?php } else{ ?>
           <?php } ?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="<?php echo base_url() ?>"><i class="fa fa-circle-o"></i> Pemetaan</a></li>
        <li><a href="<?php echo base_url('home/list_rumah') ?>"><i class="fa fa-firefox"></i> Perumahan Asahan</a></li>
        <li><a href="<?php echo base_url('user/about') ?>"><i class="fa fa-firefox"></i>About</a></li>
<?php if ($this->session->userdata('username')<>"") {?>
         <li><a href="<?php echo base_url('user/list_user') ?>"><i class="fa fa-adjust"></i> Admin</a></li>
<?php } ?>

             
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
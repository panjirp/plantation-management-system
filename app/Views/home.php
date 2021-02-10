<?php include 'header.php';?>
  <div class="content content-fixed bd-b">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
            <img src="<?php echo base_url(); ?>/assets/img/plx.svg">
            </div>
        </div>
        </div><!-- container -->
    </div><!-- content -->
    <div class="content content-fixed content-auth">
      <div class="container tx-center">
        <div class="row justify-content-center">
          <div class="col-10 col-sm-6 col-md-4 col-lg-3">
          <a href="harvesting">
            <div class="card border-0 h-100">
              <img src="<?php echo base_url(); ?>/assets/img/menu1.svg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title">Panen TBS & Brondolan</h3>
              </div>
            </div>
          </a>
          </div><!-- col -->
          <div class="col-10 col-sm-6 col-md-4 col-lg-3" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Tidak Tersedia Untuk Demo Version">
            <a href="#" data-container="body">
              <div class="card border-0 h-100">
                <img src="<?php echo base_url(); ?>/assets/img/menu2.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Field Upkeep</h3>
                </div>
              </div>
            </a>
          </div><!-- col -->
          <div class="col-10 col-sm-6 col-md-4 col-lg-3" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Tidak Tersedia Untuk Demo Version">
            <a href="#">
                <div class="card border-0 h-100">
                  <img src="<?php echo base_url(); ?>/assets/img/menu3.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h3 class="card-title">Fertilizer / Pemupukan</h3>
                  </div>
                </div>
              </a>
          </div><!-- col -->
        </div><!-- row -->

        <div class="row justify-content-center">
          <div class="col-10 col-sm-6 col-md-4 col-lg-3" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Tidak Tersedia Untuk Demo Version">
          <a href="#">
            <div class="card border-0 h-100">
              <img src="<?php echo base_url(); ?>/assets/img/menu4.svg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title">Bibit / Nursery</h3>
              </div>
            </div>
          </a>
          </div><!-- col -->
          <div class="col-10 col-sm-6 col-md-4 col-lg-3">
            <a href="dashboard">
              <div class="card border-0 h-100">
                <img src="<?php echo base_url(); ?>/assets/img/menu5.svg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Dashboard</h3>
                </div>
              </div>
            </a>
          </div><!-- col -->
          <div class="col-10 col-sm-6 col-md-4 col-lg-3" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Tidak Tersedia Untuk Demo Version">
            <a href="#">
                <div class="card border-0 h-100">
                  <img src="<?php echo base_url(); ?>/assets/img/menu6.svg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h3 class="card-title">Pengaturan</h3>
                  </div>
                </div>
              </a>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content -->
  </body>

  <?php include 'footer.php';?>
  <script>
  $(function(){
        'use strict'

        $('[data-toggle="popover"]').popover();
  })
  </script>
<div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="<?php echo $content['icon']?>"></i> <?php echo $content['header']?></h2>
                <hr>
                <div class="row">
                    <div class="col-md-6"> <b>Template :</b>  <?php echo $content['tmplt']?></div>
                    <div class="col-md-6"><b>Status :</b> <?php echo $content['status']?></div>
                    <div class="col-md-6"><b>Version :</b> <?php echo $content['version']?></div>
                    <div class="col-md-6"><b>On Config :</b> [ - ]</div>
                </div>
                
            </div>
        </div>  
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <?php $this->load->view('module/'.$module)?>
        </div>
    </div>
          
</div>
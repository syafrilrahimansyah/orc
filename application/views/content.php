<div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"><i class="<?php echo $content['icon']?>"></i> <?php echo $content['header']?></h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php foreach($content['bdcmb'] as $item){?>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $item?></a></li>
                            <?php }?>
                        </ol>
                    </nav>
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
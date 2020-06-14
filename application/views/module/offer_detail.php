    <div class="row">
        
        <?php foreach($form as $formx){ ?>
            <?php foreach($formx as $component => $part){ ?>
                <div class="col-md-6">
                    <?php $this->load->view('component/'.$component, $part) ?>
                </div>
            <?php }?>
        <?php }?>

        <!-- Button trigger modal -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url().'/offer/config?offer_uid='.$offer_uid?>"><button type="button" class="btn btn-primary" >Edit</button></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

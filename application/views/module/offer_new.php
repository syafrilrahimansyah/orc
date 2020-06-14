<form action="<?php echo base_url()?>/offer/add" method="POST">
<input type="text" name="template" value="<?php echo $tmplt_uid ?>" hidden="">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#save">Save</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approve">Approve</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $content['header']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Save changes
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $content['header']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Approve draft offer
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="approve">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
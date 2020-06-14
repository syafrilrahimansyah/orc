<div class="row" style="margin-bottom:10px">
    <div class="col-md-6">
        <form action="#" method="POST">
            <input class="form-control" type="text" placeholder="Search..">
        </form>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new"><i class="fas fa-plus fa-lg"></i> New Template</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th>UniqID</th>
                <th>Name</th>
                <th>Total Component</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($data as $row){?>
            <tr>
                <td><?php echo $row['uid']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo count_component($row['uid'])?></td>
                <td>
                    <i class="fas fa-edit" data-toggle="modal" data-target="#<?php echo $row['uid']?>"></i>
                </td>
            </tr>
            <?php }?>
            
        </tbody>
        
    </table>
</div>
<!-- MODULE -->
<div style="margin-top:10px" class="float-right">
    <nav aria-label="Page navigation example">
        <?php echo $pagination?>
    </nav>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<?php foreach($data as $row){?>
<div class="modal fade" id="<?php echo $row['uid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>TC/u_template" method="POST">
        <input id="inputText3" type="text" class="form-control" name="uid" value="<?php echo $row['uid']?>" hidden="">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">UniqID</label>
                <p><?php echo $row['uid']?></p>
            </div>
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Name</label>
                <input id="inputText3" type="text" class="form-control" name="name" value="<?php echo $row['name']?>">
            </div>
            <div class="row">
              <div class="col-md-6">
                  <h5>Generic Option</h5>
                  <label class="custom-control custom-radio custom-control-inline">
                      <input type="radio" name="gen_opt" value="1" <?php echo ($row['gen_opt']==1)?'checked=""':'' ?> class="custom-control-input"><span class="custom-control-label">True</span>
                  </label>
                  <label class="custom-control custom-radio custom-control-inline">
                      <input type="radio" name="gen_opt" value="0" <?php echo ($row['gen_opt']==0)?'checked=""':'' ?> class="custom-control-input"><span class="custom-control-label">False</span>
                  </label>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="inputText3" class="col-form-label">Form Group Generic</label>
                      <input id="inputText3" type="text" class="form-control" name="gen_component" value="<?php echo $row['gen_component']?>">
                  </div>
              </div>
            </div>
            <div class="form-group">
                <label for="input-select">Form Group</label>
                <select class="form-control" id="input-select" name="component_t2crtb[]" multiple>
                    <?php
                        $match = [];
                        foreach($row['component_t2crtb'] as $option){
                            $match[] = $option['c_uid']; 
                        }
                        foreach(component_data() as $component){
                    ?>
                    <option value="<?php echo $component['uid']?>" <?php echo (in_array($component['uid'],$match))?'selected=""':'' ?> ><?php echo $component['uid']?> | <?php echo $component['title']?></option>
                    <?php }?>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#del<?php echo $row['uid']?>">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php }?>

<?php foreach($data as $row){ ?>
<div class="modal fade" id="del<?php echo $row['uid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/d_template" method="POST">
            <input id="inputText3" type="text" class="form-control" value="<?php echo $row['uid']?>" name="uid" hidden="">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">UniqID</label>
                <p><?php echo $row['uid']?></p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php }?>

<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>TC/n_template" method="POST">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Name</label>
                <input id="inputText3" type="text" class="form-control" name="name" value="">
            </div>
            <div class="row">
              <div class="col-md-6">
                  <h5>Generic Option</h5>
                  <label class="custom-control custom-radio custom-control-inline">
                      <input type="radio" name="gen_opt" value="1" checked="" class="custom-control-input"><span class="custom-control-label">True</span>
                  </label>
                  <label class="custom-control custom-radio custom-control-inline">
                      <input type="radio" name="gen_opt" value="0" class="custom-control-input"><span class="custom-control-label">False</span>
                  </label>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="inputText3" class="col-form-label">Form Group Generic</label>
                      <input id="inputText3" type="text" class="form-control" name="gen_component" >
                  </div>
              </div>
            </div>
            <div class="form-group">
                <label for="input-select">Form Group</label>
                <select class="form-control" id="input-select" name="component_t2crtb[]" multiple>
                    <?php
                        foreach(component_data() as $component){
                    ?>
                    <option value="<?php echo $component['uid']?>" ><?php echo $component['uid']?> | <?php echo $component['title']?></option>
                    <?php }?>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
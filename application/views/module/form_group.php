<div class="row" style="margin-bottom:10px">
    <div class="col-md-6">
        <form action="#" method="POST">
            <input class="form-control" type="text" placeholder="Search..">
        </form>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-lg"></i> New Component</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th>UniqID</th>
                <th>Generic</th>
                <th>Type</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row){?>
            <tr>
                <td><?php echo $row['uid']?></td>
                <td><?php echo $row['generic']?></td>
                <td><?php echo $row['type']?></td>
                <td><?php echo $row['title']?></td>
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

<?php foreach($data as $row){?>
<?php switch($row['type']){?>
<?php case(in_array($row['type'], ['input','password','textarea'])):?>
<!-- Modal -->
<div class="modal fade" id="<?php echo $row['uid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>TC/u_fgroup" method="POST">
            <input id="inputText3" type="text" class="form-control" name="uid" value="<?php echo $row['uid']?>" hidden="">
            <input id="inputText3" type="text" class="form-control" name="type" value="<?php echo $row['type']?>" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">UniqID</label>
                        <p><?php echo $row['uid']?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p><?php echo $row['type']?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="<?php echo $row['generic']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="<?php echo $row['title']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="<?php echo $row['name']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Value</label>
                        <input id="inputText3" type="text" class="form-control" name="value" value="<?php echo $row['value']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"><?php echo $row['note']?></textarea>
                    </div>
                </div>
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
<?php break;?>
<?php case(in_array($row['type'], ['radio','singleselect','multiselect'])):?>
<div class="modal fade" id="<?php echo $row['uid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>TC/u_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="uid" value="<?php echo $row['uid']?>" hidden="">
        <input id="inputText3" type="text" class="form-control" name="type" value="<?php echo $row['type']?>" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">UniqID</label>
                        <p><?php echo $row['uid']?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p><?php echo $row['type']?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="<?php echo $row['generic']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="<?php echo $row['title']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="<?php echo $row['name']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Generic Option</h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gen_opt" <?php echo ($row['gen_opt']==1)?'checked=""':'' ?> class="custom-control-input"><span class="custom-control-label">True</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gen_opt" <?php echo ($row['gen_opt']==0)?'checked=""':'' ?> class="custom-control-input"><span class="custom-control-label">False</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Lookup Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="gen_lookup" value="<?php echo $row['gen_lookup']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-select">Option</label>
                        <select class="form-control" id="input-select" name="option_c2lrtb[]" multiple>
                            <?php
                                $match = [];
                                foreach($row['option_c2lrtb'] as $option){
                                    $match[] = $option['l_uid']; 
                                }
                                foreach(lookup_data() as $lookup){
                            ?>
                            <option value="<?php echo $lookup['uid']?>" <?php echo (in_array($lookup['uid'],$match))?'selected=""':'' ?> ><?php echo $lookup['title']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
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
<?php break;?>
<?php case(in_array($row['type'], ['association'])):?>
<div class="modal fade" id="<?php echo $row['uid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>TC/u_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="uid" value="<?php echo $row['uid']?>" hidden="">
        <input id="inputText3" type="text" class="form-control" name="type" value="<?php echo $row['type']?>" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">UniqID</label>
                        <p><?php echo $row['uid']?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p><?php echo $row['type']?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="<?php echo $row['generic']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="<?php echo $row['title']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="<?php echo $row['name']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-select">Template</label>
                        <select class="form-control" id="input-select" name="template_c2trtb[]" multiple>
                            <?php
                                $match = [];
                                foreach($row['template_c2trtb'] as $option){
                                    $match[] = $option['t_uid']; 
                                }
                                foreach(template_data() as $template){
                            ?>
                            <option value="<?php echo $template['uid']?>" <?php echo (in_array($template['uid'],$match))?'selected=""':'' ?> ><?php echo $template['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
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
<?php break;?>
<?php default:?>
<?php }?>
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
        <form action="<?php echo base_url()?>/TC/d_fgroup" method="POST">
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





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Component Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-input">Input</button>
            </div>
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-pass">Password</button>
            </div>
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-area">Text Area</button>
            </div>
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-radio">Radio</button>
            </div>
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-sglsel">Single Select</button>
            </div>
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-mltsel">Multi Select</button>
            </div>
            <div class="col-md-6" style="margin-bottom:5px">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" data-toggle="modal" data-target="#n-assc">Association</button>
            </div>
        </div>
        
        
        
        
        
        
        
      </div>
    </div>
  </div>
</div>

<!-- INPUT -->
<div class="modal fade" id="n-input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="input" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>Input</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Value</label>
                        <input id="inputText3" type="text" class="form-control" name="value" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
                    </div>
                </div>
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
<!-- Password -->
<div class="modal fade" id="n-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="password" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>Password</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Value</label>
                        <input id="inputText3" type="text" class="form-control" name="value" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
                    </div>
                </div>
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
<!-- TEXT AREA -->
<div class="modal fade" id="n-area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="textarea" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>TextArea</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Value</label>
                        <input id="inputText3" type="text" class="form-control" name="value" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
                    </div>
                </div>
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
<!-- RADIO -->
<div class="modal fade" id="n-radio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="radio" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>Radio</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Generic Option</h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" checked="" name="gen_opt" class="custom-control-input"><span class="custom-control-label">True</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gen_opt" class="custom-control-input"><span class="custom-control-label">False</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Lookup Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="gen_lookup" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-select">Option</label>
                        <select class="form-control" id="input-select" name="option_c2lrtb[]" multiple>
                            <?php foreach(lookup_data() as $lookup){?>
                            <option value="<?php echo $lookup['uid']?>"><?php echo $lookup['title']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
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
<!-- SINGLE SELECT -->
<div class="modal fade" id="n-sglsel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="singleselect" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>Single Select</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Generic Option</h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" checked="" name="gen_opt" class="custom-control-input"><span class="custom-control-label">True</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gen_opt" class="custom-control-input"><span class="custom-control-label">False</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Lookup Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="gen_lookup" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-select">Option</label>
                        <select class="form-control" id="input-select" name="option_c2lrtb[]" multiple>
                            <?php foreach(lookup_data() as $lookup){?>
                            <option value="<?php echo $lookup['uid']?>"><?php echo $lookup['title']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
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
<!-- MULTI SELECT -->
<div class="modal fade" id="n-mltsel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="multiselect" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>Multi Select</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Generic Option</h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" checked="" name="gen_opt" class="custom-control-input"><span class="custom-control-label">True</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gen_opt" class="custom-control-input"><span class="custom-control-label">False</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Lookup Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="gen_lookup" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-select">Option</label>
                        <select class="form-control" id="input-select" name="option_c2lrtb[]" multiple>
                            <?php foreach(lookup_data() as $lookup){?>
                            <option value="<?php echo $lookup['uid']?>"><?php echo $lookup['title']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
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
<!-- ASSOCIATION -->
<div class="modal fade" id="n-assc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:700px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Value Editor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>/TC/n_fgroup" method="POST">
        <input id="inputText3" type="text" class="form-control" name="type" value="association" hidden="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Type</label>
                        <p>Association</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Generic</label>
                        <input id="inputText3" type="text" class="form-control" name="generic" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input id="inputText3" type="text" class="form-control" name="name" required value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-select">Template</label>
                        <select class="form-control" id="input-select" name="template_c2trtb[]" multiple>
                            <?php foreach(template_data() as $template){?>
                            <option value="<?php echo $template['uid']?>"><?php echo $template['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
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
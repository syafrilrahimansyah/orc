<div class="row" style="margin-bottom:10px">
    <div class="col-md-6">
        <form action="#" method="POST">
            <input class="form-control" type="text" placeholder="Search..">
        </form>
    </div>
    <div class="col-md-6">
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new"><i class="fas fa-plus fa-lg"></i> New Value</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th>UniqID</th>
                <th>Generic</th>
                <th>Title</th>
                <th>value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row){ ?>
            <tr>
                <td><?php echo $row['uid']?></td>
                <td><?php echo $row['generic']?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['value']?></td>
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

<?php foreach($data as $row){ ?>
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
        <form action="<?php echo base_url()?>/TC/u_lookup" method="POST">
            <input id="inputText3" type="text" class="form-control" value="<?php echo $row['uid']?>" name="uid" hidden="">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">UniqID</label>
                <p><?php echo $row['uid']?></p>
            </div>
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Generic</label>
                <input id="inputText3" type="text" class="form-control" value="<?php echo $row['generic']?>" name="generic">
            </div>
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Title</label>
                <input id="inputText3" type="text" class="form-control" value="<?php echo $row['title']?>" name="title" required>
            </div>
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Value</label>
                <input id="inputText3" type="text" class="form-control" value="<?php echo $row['value']?>" name="value" required>
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
        <form action="<?php echo base_url()?>/TC/d_lookup" method="POST">
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
        <form action="<?php echo base_url()?>/TC/n_lookup" method="POST">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Generic</label>
                <input id="inputText3" type="text" class="form-control" name="generic">
            </div>
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Title</label>
                <input id="inputText3" type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Value</label>
                <input id="inputText3" type="text" class="form-control" name="value" required>
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
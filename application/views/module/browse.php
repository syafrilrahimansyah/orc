<form action="<?php echo base_url()?>Main/browse" method="POST">
<div class="row" style="margin-bottom:10px">

    <div class="col-md-6">
            <input class="form-control" type="text" name="search" placeholder="Search.." value=<?php echo $data_search?>>
        
    </div>
    </form>
    <div class="col-md-6">
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new"><i class="fas fa-plus fa-lg"></i> New Offer</button>
        </div>
    </div>
</div>


<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second" style="width:100%">
        <thead>
            <tr>
                <th>UniqID</th>
                <th>Name</th>
                <th>Template</th>
                <th>Status</th>
                <th>Version</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($data as $row){?>
            <tr>
                <td><a href="<?php echo base_url().'/offer/detail?offer_uid='.$row->uid ?>"><?php echo $row->uid ?></a></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $this->db->get_where('tc_template',['uid'=>$row->template])->row()->name ?></td>
                <td><?php echo $row->status ?></td>
                <td><?php echo $row->version ?></td>
                <td>
                    <i class="fas fa-edit" data-toggle="modal" data-target="#Modal<?php echo $row->uid?>"></i>
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

<?php foreach($data as $row){?>
<div class="modal fade" id="Modal<?php echo $row->uid?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Action Select</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="<?php echo base_url().'offer/config?offer_uid='.$row->uid?>"><button type="button" class="btn btn-primary">Edit Offer</button></a>
        <button type="button" class="btn btn-primary">Offer Relation</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#Delete<?php echo $row->uid?>">Delete</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php }?>

<?php foreach($data as $row){?>
<form action="<?php echo base_url()?>/offer/delete" method="POST">
<div class="modal fade" id="Delete<?php echo $row->uid?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Delete Offer UID : <?php echo $row->uid?> ?
        <input type="text" name="uid" value="<?php echo $row->uid?>" hidden>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php }?>    

<form action="<?php echo base_url()?>/offer/new" method="GET">
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Action Select</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="input-select">Select Template</label>
                <select class="form-control" id="input-select" name="template">
                    <?php foreach($template as $row){?>
                      <option value="<?php echo $row['uid']?>"><?php echo $row['name']?></option>
                    <?php }?>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
</form>
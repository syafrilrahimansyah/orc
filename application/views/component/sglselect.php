<div class="form-group"  >
    <label for="input-select"><?php echo $title ?></label>
    <select class="form-control" id="input-select" name="<?php echo $name ?>">
        <?php foreach($opt as $li){ ?>
            <option value="<?php echo $li['value'] ?>" <?php echo (isset($li['selected']))?'selected':'' ?>><?php echo $li['title'] ?></option>
        <?php }?>
    </select>
</div>
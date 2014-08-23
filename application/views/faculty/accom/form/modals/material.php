<!-- "mat" Form -->
<div class="modal fade" id="modal_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h4>
      </div>

      <?php
      $url = ($session->get('spec_details') ? 'faculty/accom/edit/mat/'.$session->get('spec_details')['material_ID'] : 'faculty/accom/add/mat');
      print form::open($url, array('class'=>'form-horizontal', 'role'=>'form'));
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Author</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="year" class="col-sm-3 control-label">Year</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="year" name="year" pattern="([0-9]{4})" title="Format is YYYY" value="<?php echo $session->get('spec_details')['year']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $session->get('spec_details')['title']; ?>" required>
          </div>
        </div>
      </div>
    
      <div class="modal-footer">
        <?php if (!$session->get('spec_details')) echo '<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>'; ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php
        $button = ($session->get('spec_details') ? 'Save' : 'Add');
        print form::submit(NULL, $button, array('type'=>'submit', 'class'=>'btn btn-primary'));
        ?>
      </div>
      
      <?php print form::close();?>
    </div>
  </div>
</div>
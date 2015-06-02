<!-- Add/Edit Publication Form -->
<div class="modal fade" id="modal_publication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
        <h4 class="modal-title" id="accom-label"></h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'publicationForm', 'enctype'=>'multipart/form-data', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="accom-alert"></p>
        </div>

        <div class="radio">
          <label>
            <input type="radio" name="type" id="bookType" value="Book" required>
            Book
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="type" id="chapterType" value="Chapter in a Book" required>
            Chapter in a Book
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="type" id="journalType" value="Journal" required>
            Journal
          </label>
        </div>
        <?php echo View::factory('faculty/accom/form/modals/publication_fragment')->bind('session', $session); ?>

        <div class="form-group">
          <label for="attachment" class="col-sm-4 control-label">Attachment(s)</label>
          <div class="col-sm-7" id="add-attachment">
            <input type="file" id="accom-attachment" name="attachment[]" accept="image/*" multiple="true" required>
            <span class="help-block">You can add up to 5 attachments.</span>
          </div>
          <div class="col-sm-7" id="view-attachment"></div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="back-button" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'accom-submit')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>
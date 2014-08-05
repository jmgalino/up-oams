<!-- "pub" Form -->
<div class="modal fade" id="modal_publication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>        
        <h4 class="modal-title" id="myModalLabel">Journal Publication/Book/Chapter in a Book</h4>
      </div>

      <?php print form::open('faculty/accom/add/pub', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="radio">
          <label>
            <input type="radio" name="type" value="Book" checked>
            Book
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="type" value="Chapter in a Book">
            Chapter in a Book
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="type" value="Journal">
            Journal
          </label>
        </div>
        <hr>
        <?php echo View::factory('faculty/accom/form/modals/publication_fragment')->bind('session', $session); ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>

      <?php print form::close();?>
    </div>
  </div>
</div>
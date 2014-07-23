<div class="modal fade" id="modal_ar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Accomplishment</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="radio">
            <input type="radio" name="choice" value="publication" checked>
            Journal Publication/Book/Chapter in a Book
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="award">
            Award/Grant Received
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="research">
            Research Grants/Fellowships Received
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="paper">
            Oral Paper/Poster Presentation
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="creative">
            Presentation of Creative Work Output
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="participation">
            Participation in Seminars/Conferences/Workshops/Training Courses/Fora
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="material">
            Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals
          </div>
          <div class="radio">
            <input type="radio" name="choice" value="other">
            Other Accomplishments
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default pull-right next_choice" data-dismiss="modal" data-toggle="modal" data-target="#modal_publication" role="button" href="">Next</a>
      </div>
    </div>
  </div>
</div>

<?php echo View::factory('faculty/ar/form/_modals/publication')->render(); ?><!-- I. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/award')->render(); ?><!-- II. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/research')->render(); ?><!-- III. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/paper')->render(); ?><!-- IV. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/creative')->render(); ?><!-- V. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/participation')->render(); ?><!-- VI. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/material')->render(); ?><!-- VII. Modal -->
<?php echo View::factory('faculty/ar/form/_modals/other')->render(); ?><!-- VIII. Modal -->

<!-- Add Accomplishment Form -->
<div class="modal fade" id="modal_accom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Accomplishment</h4>
      </div>

      <form class="form-horizontal" id="accomInit" role="form">
        <div class="modal-body">
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="publication" url="<?php echo URL::site('faculty/accom/add/pub');?>" required>
              Journal Publication/Book/Chapter in a Book
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="award" url="<?php echo URL::site('faculty/accom/add/awd');?>" required>
              Award/Grant Received
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="research" url="<?php echo URL::site('faculty/accom/add/rch');?>" required>
              Research Grants/Fellowships Received
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="paper" url="<?php echo URL::site('faculty/accom/add/ppr');?>" required>
              Oral Paper/Poster Presentation
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="creative" url="<?php echo URL::site('faculty/accom/add/ctv');?>" required>
              Presentation of Creative Work Output
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="participation" url="<?php echo URL::site('faculty/accom/add/par');?>" required>
              Participation in Seminars/Conferences/Workshops/Training Courses/Fora
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="material" url="<?php echo URL::site('faculty/accom/add/mat');?>" required>
              Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="accom_type" value="other" url="<?php echo URL::site('faculty/accom/add/oth');?>" required>
              Other Accomplishments
            </label>
          </div>
        </div>

        <div class="modal-footer">
          <input type="submit" id="next-button" value="Next" class="btn btn-default pull-right" data-toggle="modal">
        </div>
      </form>

    </div>
  </div>
</div>

<?php 
// Publication Form
echo View::factory('faculty/accom/form/modals/publication')
  ->bind('session', $session);

// Award Form
echo View::factory('faculty/accom/form/modals/award')
  ->bind('session', $session);

// Research Form
echo View::factory('faculty/accom/form/modals/research')
  ->bind('session', $session);

// Paper Form
echo View::factory('faculty/accom/form/modals/paper')
  ->bind('session', $session);

// Creative Form
echo View::factory('faculty/accom/form/modals/creative')
  ->bind('session', $session);

// Participation Form
echo View::factory('faculty/accom/form/modals/participation')
  ->bind('session', $session);

// Material Form
echo View::factory('faculty/accom/form/modals/material')
  ->bind('session', $session);

// Other Form
echo View::factory('faculty/accom/form/modals/other')
  ->bind('session', $session);
?>
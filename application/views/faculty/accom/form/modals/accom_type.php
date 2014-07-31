<div class="modal fade" id="modal_accom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Accomplishment</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="publication" checked>
              Journal Publication/Book/Chapter in a Book
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="award">
              Award/Grant Received
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="research">
              Research Grants/Fellowships Received
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="paper">
              Oral Paper/Poster Presentation
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="creative">
              Presentation of Creative Work Output
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="participation">
              Participation in Seminars/Conferences/Workshops/Training Courses/Fora
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="material">
              Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="choice" value="other">
              Other Accomplishments
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right next_choice" data-dismiss="modal" data-toggle="modal" data-target="#modal_publication">Next</a>
      </div>
    </div>
  </div>
</div>

<?php 
// I. Modal
echo View::factory('faculty/accom/form/modals/publication')
  ->bind('session', $session);

// II. Modal
echo View::factory('faculty/accom/form/modals/award')
  ->bind('session', $session);

// III. Modal
echo View::factory('faculty/accom/form/modals/research')
  ->bind('session', $session);

// IV. Modal
echo View::factory('faculty/accom/form/modals/paper')
  ->bind('session', $session);

// V. Modal
echo View::factory('faculty/accom/form/modals/creative')
  ->bind('session', $session);

// VI. Modal
echo View::factory('faculty/accom/form/modals/participation')
  ->bind('session', $session);

// VII. Modal
echo View::factory('faculty/accom/form/modals/material')
  ->bind('session', $session);

// VIII. Modal
echo View::factory('faculty/accom/form/modals/other')
  ->bind('session', $session);

?>
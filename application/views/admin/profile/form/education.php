<!-- New/Update Education Form -->
<div class="modal fade" id="modal_education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myEducLabel">New Educational Attainment</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'educationForm', 'role'=>'form')); ?>
      <div class="modal-body">
        <input type="text" id="education-id" name="education_ID" hidden>

        <div class="form-group">
          <label for="major" class="col-sm-3 control-label">Major</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="major" name="major" required>
          </div>
        </div>

        <div class="form-group">
          <label for="minor" class="col-sm-3 control-label">Minor</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="minor" name="minor" placeholder="(Optional)">
          </div>
        </div>

        <div class="form-group">
          <label for="qualification" class="col-sm-3 control-label">Qualification</label>
          <div class="col-sm-8">
            <select class="form-control" id="qualification" name="qualification">
              <option value="certificate">Certificate/Diploma</option>
              <option value="bachelor">Bachelor's Degree</option>
              <option value="honours">Honours Degree</option>
              <option value="master">Master's Degree</option>
              <option value="postgraduate">Postgraduate Certificate/Diploma</option>
              <option value="graduate">Graduate Certificate/Diploma</option>
              <option value="doctorate">Doctorate Degree</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="continuing" class="col-sm-3 control-label">Continuing</label>
          <div class="col-sm-8">
            <select class="form-control" id="continuing" name="continuing" required>
              <option>Yes</option>
              <option>No</option>
            </select>
          </div>
        </div>

        <div class="form-group" id="date" style="display:none">
          <label for="date_obtained" class="col-sm-3 control-label">Date Obtained</label>
          <div class="col-sm-8" id="datepicker">
            <div class="input-group date">
              <input type="text" class="form-control" id="date_obtained" name="date_obtained">
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="institution" class="col-sm-3 control-label">Institution</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="institution" name="institution" required>
          </div>
        </div>

        <div class="form-group">
          <label for="thesis" class="col-sm-3 control-label">Thesis Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="thesis" name="thesis" placeholder="(Optional)">
          </div>
        </div>

        <div class="form-group">
          <label for="city" class="col-sm-3 control-label">City</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="city" name="city" required>
          </div>
        </div>

        <div class="form-group">
          <label for="country" class="col-sm-3 control-label">Country</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="country" name="country" required>
          </div>
        </div>

        <div class="form-group">
          <label for="notes" class="col-sm-3 control-label">Notes</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="notes" name="notes" rows="5" onkeyup="countChar(this)" maxlength="255" placeholder="(Optional)"></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      </form>
    </div>
  </div>
</div>
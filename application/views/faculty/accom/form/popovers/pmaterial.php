<form method="post" class="form-horizontal" role="form">
  <div class="form-group">
    <label for="year" class="col-sm-3 control-label">Year</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="year" name="year" pattern="([0-9]{4})" title="Format is YYYY">
    </div>
  </div>

  <div class="form-group">
    <label for="title" class="col-sm-3 control-label">Title</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="title" name="title">
    </div>
  </div>

  <div class="btn-toolbar pull-right" role="toolbar" style="padding-bottom:10px;">
    <input type="submit" class="btn btn-primary" value="Save">
  </div>
</form>
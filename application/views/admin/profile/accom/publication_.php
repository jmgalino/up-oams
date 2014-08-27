<?php $fullname = $user->last_name.", ".$user->first_name." ".$user->middle_initial."."?>

<div class="form-group">
  <label for="author" class="col-sm-4 control-label">Author</label>
  <div class="col-sm-7">
    <input class="form-control" id="author" name="author" value="<?php echo $fullname; ?>" readonly>
    <!-- <br><a class="btn btn-primary btn-xs" role="button" href="">
    <span class="glyphicon glyphicon-plus"></span> Add
  </a> -->
</div>
</div>

<div class="form-group">
  <label for="title" class="col-sm-4 control-label">Title</label>
  <div class="col-sm-7">
    <input type="text" class="form-control getPub" id="title" name="title" required>
  </div>
</div>

<div class="form-group">
  <label for="year" class="col-sm-4 control-label">Year</label>
  <div class="col-sm-7">
    <input type="int" class="form-control" id="year" name="year" pattern="([0-9]{4})" title="Format is YYYY" required>
  </div>
</div>

<!-- Book -->

<div class="form-group pub_book">
  <label for="publisher" class="col-sm-4 control-label">Publisher</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_b" id="publisher" name="bpublisher" required>
  </div>
</div>

<div class="form-group pub_book">
  <label for="place" class="col-sm-4 control-label">Place of Publication</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_b" id="place" name="bplace" required>
  </div>
</div>

<div class="form-group pub_book">
  <label for="pagination_book" class="col-sm-4 control-label">Total Number of Pages</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_b" id="pagination_book" name="pagination_book" required>
  </div>
</div>

<!-- Chapter -->

<div class="form-group pub_chapter" hidden>
  <label for="publisher" class="col-sm-4 control-label">Publisher</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_c" id="publisher" name="cpublisher">
  </div>
</div>

<div class="form-group pub_chapter" hidden>
  <label for="place" class="col-sm-4 control-label">Place of Publication</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_c" id="place" name="cplace">
  </div>
</div>

<div class="form-group pub_chapter" hidden>
  <label for="pages_chapter" class="col-sm-4 control-label">Inclusive Pages</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_c" id="pages_chapter" name="pages_chapter">
  </div>
</div>

<!-- Journal -->

<div class="form-group pub_journal" hidden>
  <label for="volume" class="col-sm-4 control-label">Volume No.</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="volume" name="volume" placeholder="III">
  </div>
</div>

<div class="form-group pub_journal" hidden>
  <label for="issue" class="col-sm-4 control-label">Issue No.</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="issue" name="issue" placeholder="2">
  </div>
</div>

<div class="form-group pub_journal" hidden>
  <label for="pages_journal" class="col-sm-4 control-label">Incusive Pages</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="pages" name="pages_journal" placeholder="62-68">
  </div>
</div>
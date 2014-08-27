<div class="form-group">
  <label for="author" class="col-sm-4 control-label">Author</label>
  <div class="col-sm-7">
    <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
    <input type="text" class="form-control" id="author" name="author" data-toggle="tooltip" data-placement="top" title="No need to include other faculty." placeholder="(Optional)">
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

<!-- Book/Chapter in a Book -->
<div class="form-group pub_book">
  <label for="book_publisher" class="col-sm-4 control-label">Publisher</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_b" id="book_publisher" name="book_publisher" required>
  </div>
</div>

<div class="form-group pub_book">
  <label for="book_place" class="col-sm-4 control-label">Place of Publication</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_b" id="book_place" name="book_place" required>
  </div>
</div>

<!-- Journal -->
<div class="form-group pub_journal" style="display:none;">
  <label for="journal_volume" class="col-sm-4 control-label">Volume No.</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="journal_volume" name="journal_volume" placeholder="III">
  </div>
</div>

<div class="form-group pub_journal" style="display:none;">
  <label for="journal_issue" class="col-sm-4 control-label">Issue No.</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="journal_issue" name="journal_issue" placeholder="2">
  </div>
</div>

<div class="form-group">
  <label for="page" class="col-sm-4 control-label pub_bookk">Total Number of Pages</label>
  <label for="page" class="col-sm-4 control-label pub_chapter" style="display:none;">Inclusive Pages</label>
  <label for="page" class="col-sm-4 control-label pub_journal" style="display:none;">Inclusive Pages</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="page" name="page" required>
  </div>
</div>

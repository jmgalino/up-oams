<div id="publicationDetails">
  <hr>
  <input type="text" id="publication-id" name="publication_ID" hidden>

  <div class="form-group">
    <label for="publication-author" class="col-sm-4 control-label">Author/s</label>
    <div class="col-sm-7">
      <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
      <input type="text" class="form-control" id="publication-author" name="author" data-toggle="tooltip" data-placement="top" title="No need to include other faculty." placeholder="(Optional)">
    </div>
  </div>

  <div class="form-group">
    <label for="publication-year" class="col-sm-4 control-label">Year</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="publication-year" name="year" pattern="([0-9]{4})" title="Format is YYYY" required>
    </div>
  </div>

  <div class="form-group">
    <label for="publication-title" class="col-sm-4 control-label">Title</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="publication-title" name="title" required>
    </div>
  </div>

  <!-- Book/Chapter in a Book -->
  <div class="form-group">
    <label for="book_publisher" class="col-sm-4 control-label">Publisher</label>
    <div class="col-sm-7">
      <input type="text" class="form-control book-details" id="book_publisher" name="book_publisher" required>
    </div>
  </div>

  <div class="form-group">
    <label for="book_place" class="col-sm-4 control-label">Place of Publication</label>
    <div class="col-sm-7">
      <input type="text" class="form-control book-details" id="book_place" name="book_place" required>
    </div>
  </div>

  <!-- Journal -->
  <div class="form-group" style="display:none;">
    <label for="journal_volume" class="col-sm-4 control-label">Volume No.</label>
    <div class="col-sm-7">
      <input type="text" class="form-control journal-details" id="journal_volume" name="journal_volume">
    </div>
  </div>

  <div class="form-group" style="display:none;">
    <label for="journal_issue" class="col-sm-4 control-label">Issue No.</label>
    <div class="col-sm-7">
      <input type="text" class="form-control journal-details" id="journal_issue" name="journal_issue">
    </div>
  </div>

  <div class="form-group">
    <label for="publication-page" class="col-sm-4 control-label" id="pages-label">Total Number of Pages</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="publication-page" name="page" required>
    </div>
  </div>
</div>
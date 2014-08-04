<div class="form-group">
  <label for="author" class="col-sm-4 control-label">Author</label>
  <div class="col-sm-7">
    <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
    <!-- <input type="text" class="form-control" id="author" name="author" required> -->
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
    <input type="int" class="form-control" id="year" name="year" pattern="([0-9][0-9][0-9][0-9])" required>
  </div>
</div>

<!-- Book/Chapter in a Book -->
<div class="form-group pub_book">
  <label for="publisher" class="col-sm-4 control-label">Publisher</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="publisher" name="book_publisher" required>
  </div>
</div>

<div class="form-group pub_book">
  <label for="place" class="col-sm-4 control-label">Place of Publication</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="place" name="book_place" required>
  </div>
</div>

<!-- Journal -->
<div class="form-group pub_journal" style="display:none;">
  <label for="volume" class="col-sm-4 control-label">Volume No.</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="volume" name="volume" placeholder="III">
  </div>
</div>

<div class="form-group pub_journal" style="display:none;">
  <label for="issue" class="col-sm-4 control-label">Issue No.</label>
  <div class="col-sm-7">
    <input type="text" class="form-control pub_j" id="issue" name="issue" placeholder="2">
  </div>
</div>

<!-- <div class="form-group pub_book">
  <label for="page" class="col-sm-4 control-label pub_book">Total Number of Pages</label>
  <label for="page" class="col-sm-4 control-label pub_chapter">Inclusive Pages</label>
  <label for="page" class="col-sm-4 control-label pub_journal">Incusive Pages</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="pagination_book" name="page" required>
    <input type="text" class="form-control" id="pages" name="pages_journal" placeholder="62-68">
  </div>
</div> -->

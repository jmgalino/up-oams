<!-- Message -->
<div class="modal fade" id="modal_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span id="message-read"></span>&nbsp&nbsp
        <span id="message-star"></span>&nbsp&nbsp
        <span id="message-delete"></span>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      
      <div class="modal-body">
        From: <strong id="message-sender" ></strong>
        <hr style="border-top:1px solid #b3b3b3; margin-top:10px; margin-bottom:10px;">
        <strong id="message-subject"></strong> &nbsp <!-- <span class="glyphicon glyphicon-star"></span> -->
        <p id="message-date" style="font-size:12px"></p>
        <hr style="border-top:1px solid #b3b3b3; margin-top:15px; margin-bottom:10px;">
        <p id="message-message" style="word-break:break-all;"></p>
      </div>
      
    </div>
  </div>
</div>
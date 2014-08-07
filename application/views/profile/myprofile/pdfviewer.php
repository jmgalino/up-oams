<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('faculty/myprofile'); ?>>My Profile</a></li>
  <li class="active"><?php echo $label; ?></li>
</ol>

<div class="pdf-viewer text-center">
<embed src="<?php echo URL::base(); ?>application/files/document_accom/2014041935.pdf" width="850" height="500">
</div>
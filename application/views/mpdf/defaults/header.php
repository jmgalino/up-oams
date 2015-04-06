<?php
if ($header_contents)
{
	echo '<p class="text-center"><img src="', URL::base().'application/assets/img/upmindanao_logo_small.png', '"></p>';
	echo '<h1 class="text-center" style="text-transform:uppercase">', $header_contents['university'], '</h1>';

	if ($header_contents['level'] == 'college')
	{
		echo '<h1 class="text-center">', $header_contents['college'], '</h1>';
		echo '<p style="border-top:1px solid #000; margin: 0 0 20px;"></p>';
	}
	else
	{
		echo '<h1 class="text-center" style="text-transform:uppercase">', $header_contents['college'], '</h1>';
		echo '<h1 class="text-center">', $header_contents['department'], '</h1>';
		echo '<p style="border-top:1px solid #000; margin: 5px 0 20px;"></p>';
	}
}
?>
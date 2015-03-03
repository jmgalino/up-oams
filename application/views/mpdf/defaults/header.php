<?php
echo '<p class="text-center"><img src="', URL::base().'application/assets/img/upmindanao_logo_small.png', '"></p>';
echo '<h1 class="text-center" style="text-transform:uppercase">', $this->session->get('university'), '</h1>';
echo '<h1 class="text-center" style="text-transform:uppercase">', $this->session->get('college_details')['college'], '</h1>';

if ($this->session->get('level') == 'department')
{
	echo '<h1 class="text-center">', $this->session->get('department_details')['department'], '</h1>';
	echo '<hr style="border-top:1px solid #000; margin: 5px 0 20px;">';
}
else
{
	echo '<hr style="border-top:1px solid #000; margin: 5px 0 20px;">';
}
?>
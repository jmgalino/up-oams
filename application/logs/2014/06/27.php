<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-06-27 04:18:22 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Cookie.php:67
2014-06-27 04:18:22 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('_em_t', NULL)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('_em_t')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Cookie.php:67
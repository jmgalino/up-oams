<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-15 16:51:02 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/views/admin/user.php [ 24 ] in file:line
2014-07-15 16:51:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-15 17:01:20 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '' class="dropdown-toggle" data' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ';' ~ APPPATH/views/admin/user.php [ 49 ] in file:line
2014-07-15 17:01:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-15 17:01:54 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '' class="dropdown-toggle" data' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ';' ~ APPPATH/views/admin/user.php [ 49 ] in file:line
2014-07-15 17:01:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-15 17:02:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '' class="dropdown-toggle" data' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ';' ~ APPPATH/views/admin/user.php [ 49 ] in file:line
2014-07-15 17:02:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-15 17:11:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session ~ APPPATH/views/admin/user.php [ 55 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/user.php:55
2014-07-15 17:11:46 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/user.php(55): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 55, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(16): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(50): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#9 [internal function]: Kohana_Controller->execute()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#14 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/user.php:55
2014-07-15 17:13:18 --- EMERGENCY: ErrorException [ 1 ]: Cannot use object of type Session_Native as array ~ APPPATH/views/admin/user.php [ 55 ] in file:line
2014-07-15 17:13:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-15 17:14:12 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH/classes/Controller/Admin.php [ 50 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php:50
2014-07-15 17:14:12 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(50): Kohana_Core::error_handler(2048, 'Only variables ...', '/Applications/X...', 50, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php:50
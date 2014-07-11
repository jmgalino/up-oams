<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-11 07:30:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: employee_code ~ APPPATH/classes/Controller/Site.php [ 74 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php:74
2014-07-11 07:30:48 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(74): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 74, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php:74
2014-07-11 08:50:52 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: employee_code ~ APPPATH/classes/Controller/Site.php [ 74 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php:74
2014-07-11 08:50:52 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(74): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 74, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php:74
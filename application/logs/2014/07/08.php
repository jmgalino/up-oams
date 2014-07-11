<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-08 21:34:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: page_title ~ APPPATH/views/templates/template.php [ 9 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php:9
2014-07-08 21:34:49 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 9, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(60): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_contact()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php:9
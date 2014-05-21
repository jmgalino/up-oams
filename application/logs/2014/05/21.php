<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-21 08:44:20 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Controller::__construct() must be an instance of Request, none given, called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php on line 11 and defined ~ SYSPATH/classes/Kohana/Controller.php [ 43 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php:43
2014-05-21 08:44:20 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(43): Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/Applications/X...', 43, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(11): Kohana_Controller->__construct()
#2 [internal function]: Controller_Site->__construct(Object(Request), Object(Response))
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php:43
2014-05-21 08:45:20 --- EMERGENCY: ErrorException [ 1 ]: Class 'Univ_Model' not found ~ APPPATH/classes/Controller/Site.php [ 12 ] in file:line
2014-05-21 08:45:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 08:46:53 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{', expecting function (T_FUNCTION) ~ APPPATH/classes/Controller/Site.php [ 144 ] in file:line
2014-05-21 08:46:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 08:57:44 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Kohana_Form::submit(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/fragments/site.php on line 30 and defined ~ SYSPATH/classes/Kohana/Form.php [ 354 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-05-21 08:57:44 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php(354): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 354, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/fragments/site.php(30): Kohana_Form::submit(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(15): Kohana_View->__toString()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(10): Kohana_View->render()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#15 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-05-21 08:59:20 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Kohana_Form::submit(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/fragments/site.php on line 30 and defined ~ SYSPATH/classes/Kohana/Form.php [ 354 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-05-21 08:59:20 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php(354): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 354, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/fragments/site.php(30): Kohana_Form::submit(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(15): Kohana_View->__toString()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(10): Kohana_View->render()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#15 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-05-21 09:02:57 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Kohana_Form::submit(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/fragments/site.php on line 30 and defined ~ SYSPATH/classes/Kohana/Form.php [ 354 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-05-21 09:02:57 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php(354): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 354, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/fragments/site.php(30): Kohana_Form::submit(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(15): Kohana_View->__toString()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(10): Kohana_View->render()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#15 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-05-21 09:18:04 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Response::bode() ~ APPPATH/classes/Controller/Site.php [ 24 ] in file:line
2014-05-21 09:18:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-21 09:18:23 --- EMERGENCY: ErrorException [ 1 ]: Class 'Captcha' not found ~ APPPATH/classes/Controller/Site.php [ 29 ] in file:line
2014-05-21 09:18:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
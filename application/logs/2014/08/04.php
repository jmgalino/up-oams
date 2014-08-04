<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-04 17:33:43 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/views/faculty/accom/form/fragments/creative.php [ 4 ] in file:line
2014-08-04 17:33:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 18:42:39 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/accom/form/modals/other2 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-04 18:42:39 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/accom/f...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/accom/f...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/template.php(41): Kohana_View::factory('faculty/accom/f...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(21): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(164): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(78): Controller_Faculty_Accom->action_draft(NULL)
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_update()
#12 [internal function]: Kohana_Controller->execute()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#17 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-04 21:17:19 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/publication.php [ 21 ] in file:line
2014-08-04 21:17:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:18:29 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/research.php [ 14 ] in file:line
2014-08-04 21:18:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:19:10 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/publication.php [ 21 ] in file:line
2014-08-04 21:19:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:19:46 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/publication.php [ 21 ] in file:line
2014-08-04 21:19:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:19:57 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/research.php [ 14 ] in file:line
2014-08-04 21:19:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:20:17 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/research.php [ 21 ] in file:line
2014-08-04 21:20:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:20:23 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/faculty/accom/form/fragments/research.php [ 22 ] in file:line
2014-08-04 21:20:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:20:27 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/views/faculty/accom/form/fragments/paper.php [ 4 ] in file:line
2014-08-04 21:20:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-04 21:21:18 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/accom/form/modals/other2 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-04 21:21:18 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/accom/f...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/accom/f...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/template.php(41): Kohana_View::factory('faculty/accom/f...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(21): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(164): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(78): Controller_Faculty_Accom->action_draft(NULL)
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_update()
#12 [internal function]: Kohana_Controller->execute()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#17 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-04 23:55:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: accom_reports ~ APPPATH/views/faculty/accom/list/department.php [ 10 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/list/department.php:10
2014-08-04 23:55:56 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/list/department.php(10): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 10, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(21): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accomext.php(30): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_AccomExt->action_dept()
#9 [internal function]: Kohana_Controller->execute()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_AccomExt))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#14 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/list/department.php:10
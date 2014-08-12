<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-11 10:22:59 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '=' ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 43 ] in file:line
2014-08-11 10:22:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-11 10:25:02 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/views/faculty/ipcr/form/template.php [ 87 ] in file:line
2014-08-11 10:25:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-11 10:25:10 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: warning ~ APPPATH/views/faculty/ipcr/form/template.php [ 15 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/template.php:15
2014-08-11 10:25:10 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/template.php(15): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 15, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(182): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(56): Controller_Faculty_Ipcr->action_draft()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#10 [internal function]: Kohana_Controller->execute()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#15 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/template.php:15
2014-08-11 12:11:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: target_ID ~ APPPATH/classes/Model/Ipcr.php [ 193 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:193
2014-08-11 12:11:35 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(193): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 193, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(200): Model_Ipcr->add_target(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:193
2014-08-11 12:13:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Ipcr::$session ~ APPPATH/classes/Model/Ipcr.php [ 207 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:207
2014-08-11 12:13:32 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(207): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 207, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(200): Model_Ipcr->add_target(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:207
2014-08-11 12:19:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Ipcr::$session ~ APPPATH/classes/Model/Ipcr.php [ 208 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:208
2014-08-11 12:19:22 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(208): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 208, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(200): Model_Ipcr->add_target(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:208
2014-08-11 13:10:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Model_Ipcr::$session ~ APPPATH/classes/Model/Ipcr.php [ 209 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:209
2014-08-11 13:10:58 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(209): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 209, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(200): Model_Ipcr->add_target(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:209
2014-08-11 13:38:08 --- EMERGENCY: ErrorException [ 2 ]: Illegal string offset 'ipcr_ID' ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 47 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:47
2014-08-11 13:38:08 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(47): Kohana_Core::error_handler(2, 'Illegal string ...', '/Applications/X...', 47, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:47
2014-08-11 16:04:17 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting ',' or ';' ~ APPPATH/classes/Controller/Site.php [ 5 ] in file:line
2014-08-11 16:04:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-11 16:05:03 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'new' (T_NEW) ~ APPPATH/classes/Controller/User.php [ 5 ] in file:line
2014-08-11 16:05:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-11 16:06:21 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting ',' or ';' ~ APPPATH/classes/Controller/User.php [ 6 ] in file:line
2014-08-11 16:06:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-11 20:58:51 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: evaluation ~ APPPATH/views/faculty/ipcr/view/group.php [ 16 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/view/group.php:16
2014-08-11 20:58:51 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/view/group.php(16): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 16, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php(58): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#14 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/view/group.php:16
2014-08-11 21:23:42 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/ipcr/form/initial/template could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:23:42 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/ipcr/fo...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/ipcr/fo...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(173): Kohana_View::factory('faculty/ipcr/fo...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(82): Controller_Faculty_Ipcr->action_draft()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:24:02 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/ipcr/form/intial/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:24:02 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/ipcr/fo...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/ipcr/fo...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/initial/template.php(61): Kohana_View::factory('faculty/ipcr/fo...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(184): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(82): Controller_Faculty_Ipcr->action_draft()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#12 [internal function]: Kohana_Controller->execute()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#17 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:25:36 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/ipcr/form/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:25:36 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/ipcr/fo...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/ipcr/fo...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/initial/template.php(61): Kohana_View::factory('faculty/ipcr/fo...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(184): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(82): Controller_Faculty_Ipcr->action_draft()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#12 [internal function]: Kohana_Controller->execute()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#17 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:25:55 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/ipcr/form/intial/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:25:55 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/ipcr/fo...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/ipcr/fo...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/initial/template.php(61): Kohana_View::factory('faculty/ipcr/fo...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(184): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(82): Controller_Faculty_Ipcr->action_draft()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#12 [internal function]: Kohana_Controller->execute()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#17 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-11 21:31:37 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr_forms ~ APPPATH/views/faculty/ipcr/form/modals/consolidate.php [ 17 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/modals/consolidate.php:17
2014-08-11 21:31:37 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/modals/consolidate.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 17, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/group.php(22): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php(137): Kohana_View->render()
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php(18): Controller_Faculty_IpcrGroup->action_view_group('Department of H...', Array, Array, 'faculty/ipcr_de...')
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_dept()
#14 [internal function]: Kohana_Controller->execute()
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#19 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/modals/consolidate.php:17
2014-08-11 21:43:48 --- EMERGENCY: ErrorException [ 1 ]: Call to private method Controller_Faculty_IpcrGroup::action_consolidate() from context 'Kohana_Controller' ~ SYSPATH/classes/Kohana/Controller.php [ 84 ] in file:line
2014-08-11 21:43:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-11 22:23:40 --- EMERGENCY: ErrorException [ 2 ]: preg_match(): Compilation failed: unmatched parentheses at offset 152 ~ SYSPATH/classes/Kohana/Route.php [ 423 ] in file:line
2014-08-11 22:23:40 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'preg_match(): C...', '/Applications/X...', 423, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Route.php(423): preg_match('#^(?P<directory...', 'faculty/mpdf/in...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(466): Kohana_Route->matches(Object(Request))
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(938): Kohana_Request::process(Object(Request), Array)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#5 {main} in file:line
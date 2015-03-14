<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-12 00:03:35 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(' ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 151 ] in file:line
2015-03-12 00:03:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-12 01:01:10 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ipcr ~ APPPATH/classes/Controller/Faculty/Opcr.php [ 31 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:31
2015-03-12 01:01:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(31): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 31, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:31
2015-03-12 01:01:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ipcr_forms ~ APPPATH/views/faculty/opcr/form/modals/initialize.php [ 12 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:12
2015-03-12 01:01:41 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php(12): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 12, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(40): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(42): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_index()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#17 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:12
2015-03-12 01:18:42 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$filename' (T_VARIABLE) ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 155 ] in file:line
2015-03-12 01:18:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-12 01:50:43 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 292 ] in file:line
2015-03-12 01:50:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-12 01:51:00 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 292 ] in file:line
2015-03-12 01:51:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-12 01:59:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ipcr_forms ~ APPPATH/views/faculty/opcr/view/faculty.php [ 17 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:17
2015-03-12 01:59:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 17, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(105): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:17
2015-03-12 02:00:23 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 62 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:00:23 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(62): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 62, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(94): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:00:54 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 62 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:00:54 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(62): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 62, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(94): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:02:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: period ~ APPPATH/views/faculty/opcr/view/faculty.php [ 29 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:29
2015-03-12 02:02:09 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php(29): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 29, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(108): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:29
2015-03-12 02:02:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 62 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:02:59 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(62): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 62, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(94): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:03:45 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 62 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 02:03:45 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(62): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 62, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(94): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:62
2015-03-12 06:03:22 --- EMERGENCY: Database_Exception [ 2002 ]: SQLSTATE[HY000] [2002] No such file or directory ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
2015-03-12 06:03:22 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
#1 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database.php(478): Kohana_Database_PDO->escape('page_title')
#2 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query/Builder.php(116): Kohana_Database->quote('page_title')
#3 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query/Builder/Select.php(372): Kohana_Database_Query_Builder->_compile_conditions(Object(Database_PDO), Array)
#4 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query_Builder_Select->compile(Object(Database_PDO))
#5 /Users/jenny/Sites/up-oams/application/classes/Model/Oams.php(57): Kohana_Database_Query->execute()
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(19): Model_Oams->get_page_title()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(69): Controller_User->before()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
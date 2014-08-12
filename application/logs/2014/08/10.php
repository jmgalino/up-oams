<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-10 00:42:48 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_group_ipcr() ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 114 ] in file:line
2014-08-10 00:42:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 01:12:36 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: output ~ APPPATH/views/faculty/ipcr/form/modals/output.php [ 37 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/modals/output.php:37
2014-08-10 01:12:36 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/modals/output.php(37): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 37, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/template.php(38): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(136): Kohana_View->render()
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(61): Controller_Faculty_Ipcr->action_draft()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#14 [internal function]: Kohana_Controller->execute()
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#19 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/modals/output.php:37
2014-08-10 01:13:01 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ APPPATH/views/faculty/ipcr/form/modals/output.php [ 40 ] in file:line
2014-08-10 01:13:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 14:18:05 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 148 ] in file:line
2014-08-10 14:18:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 15:25:31 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')', expecting ',' or ';' ~ APPPATH/views/faculty/ipcr/form/template.php [ 12 ] in file:line
2014-08-10 15:25:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 15:57:17 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_group_ipcr() ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 114 ] in file:line
2014-08-10 15:57:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 16:42:57 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: details ~ APPPATH/classes/Model/Ipcr.php [ 48 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:48
2014-08-10 16:42:57 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(48): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 48, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(148): Model_Ipcr->get_details(NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:48
2014-08-10 17:26:36 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 149 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:149
2014-08-10 17:26:36 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(149): Kohana_Core::error_handler(8, 'Undefined offse...', '/Applications/X...', 149, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:149
2014-08-10 17:27:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 149 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:149
2014-08-10 17:27:26 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(149): Kohana_Core::error_handler(8, 'Undefined offse...', '/Applications/X...', 149, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:149
2014-08-10 17:28:41 --- EMERGENCY: Database_Exception [ 42S22 ]: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'category_ID' in 'field list' [ INSERT INTO ipcr_targettbl (category_ID, output_ID) VALUES ('1', '7') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-10 17:28:41 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO ipc...', false, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(150): Kohana_Database_Query->execute()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(153): Model_Ipcr->add_target(Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-10 17:30:16 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/Ipcr.php [ 142 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:30:16 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(142): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Applications/X...', 142, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(153): Model_Ipcr->add_target('output_ID')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:30:44 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/Ipcr.php [ 142 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:30:44 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(142): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Applications/X...', 142, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(153): Model_Ipcr->add_target('output_ID')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:30:52 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/Ipcr.php [ 142 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:30:52 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(142): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Applications/X...', 142, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(153): Model_Ipcr->add_target('output_ID')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:31:41 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/Ipcr.php [ 142 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:31:41 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(142): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Applications/X...', 142, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(153): Model_Ipcr->add_target('output_ID')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:31:49 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/Ipcr.php [ 142 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:31:49 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php(142): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Applications/X...', 142, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(153): Model_Ipcr->add_target('output_ID')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Ipcr.php:142
2014-08-10 17:33:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: ouput_ID ~ APPPATH/views/faculty/ipcr/form/fragment.php [ 22 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/fragment.php:22
2014-08-10 17:33:09 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/fragment.php(22): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 22, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/template.php(57): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(139): Kohana_View->render()
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(61): Controller_Faculty_Ipcr->action_draft()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#14 [internal function]: Kohana_Controller->execute()
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#19 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/form/fragment.php:22
2014-08-10 17:51:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ipcr_ID ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 171 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:171
2014-08-10 17:51:40 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(171): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 171, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_remove()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:171
2014-08-10 18:15:23 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::submit() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 98 ] in file:line
2014-08-10 18:15:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 18:16:16 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: submit_success ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 99 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:99
2014-08-10 18:16:16 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(99): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 99, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_submit()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php:99
2014-08-10 18:19:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session ~ APPPATH/views/faculty/ipcr/list/faculty.php [ 21 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/faculty.php:21
2014-08-10 18:19:56 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/faculty.php(21): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 21, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(27): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#14 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/faculty.php:21
2014-08-10 19:54:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: comment ~ APPPATH/views/faculty/opcr/list/faculty.php [ 74 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/opcr/list/faculty.php:74
2014-08-10 19:54:58 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/opcr/list/faculty.php(74): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 74, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Opcr.php(27): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#14 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/opcr/list/faculty.php:74
2014-08-10 20:02:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: remarks ~ APPPATH/views/faculty/ipcr/list/faculty.php [ 70 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/faculty.php:70
2014-08-10 20:02:14 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/faculty.php(70): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 70, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcr.php(28): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#14 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/ipcr/list/faculty.php:70
2014-08-10 20:14:01 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 115 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php:115
2014-08-10 20:14:01 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php(115): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 115, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php(18): Controller_Faculty_IpcrGroup->action_view_group('Department of H...', Array, Array, 'faculty/ipcr_de...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_dept()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Ipcrgroup.php:115
2014-08-10 20:15:24 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH/views/faculty/ipcr/list/group.php [ 20 ] in file:line
2014-08-10 20:15:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 21:55:36 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_User::get_details(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php on line 128 and defined ~ APPPATH/classes/Model/User.php [ 25 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:25
2014-08-10 21:55:36 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(25): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 25, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(128): Model_User->get_details('123400014')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(52): Model_User->add_user(Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:25
2014-08-10 22:48:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_type ~ APPPATH/classes/Controller/Admin/Profile.php [ 37 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:37
2014-08-10 22:48:49 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(37): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 37, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:37
2014-08-10 22:57:22 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on a non-object ~ APPPATH/classes/Controller/Admin/Profile.php [ 35 ] in file:line
2014-08-10 22:57:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 23:01:44 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on a non-object ~ APPPATH/classes/Controller/Admin/Profile.php [ 116 ] in file:line
2014-08-10 23:01:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 23:23:28 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Controller/Admin/Profile.php [ 129 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:129
2014-08-10 23:23:28 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(129): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 129, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:129
2014-08-10 23:28:28 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$details' (T_VARIABLE) ~ APPPATH/classes/Controller/Admin/Profile.php [ 130 ] in file:line
2014-08-10 23:28:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 23:38:13 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/Controller/Admin/Profile.php [ 147 ] in file:line
2014-08-10 23:38:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-10 23:38:27 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Controller/Admin/Profile.php [ 129 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:129
2014-08-10 23:38:27 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(129): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 129, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:129
2014-08-10 23:40:52 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Controller/Admin/Profile.php [ 81 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:81
2014-08-10 23:40:52 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(81): Kohana_Core::error_handler(8, 'Undefined offse...', '/Applications/X...', 81, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:81
2014-08-10 23:44:39 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_Univ::get_department_details(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php on line 88 and defined ~ APPPATH/classes/Model/Univ.php [ 90 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Univ.php:90
2014-08-10 23:44:39 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Univ.php(90): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 90, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(88): Model_Univ->get_department_details('3')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Univ.php:90
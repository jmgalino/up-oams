<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-27 18:40:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: accom_details ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 74 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:74
2015-03-27 18:40:32 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(74): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 74, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:74
2015-03-27 18:40:57 --- EMERGENCY: ErrorException [ 1 ]: Cannot use object of type Model_Ipcr as array ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 74 ] in file:line
2015-03-27 18:40:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 18:41:08 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: identifier ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 74 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:74
2015-03-27 18:41:08 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(74): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 74, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:74
2015-03-27 18:53:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:53:44 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:53:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:53:50 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:54:13 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:54:13 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:54:16 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:54:16 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:09 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:26 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:30 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:30 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(451): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:57 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:55:57 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(452): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:57:23 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:57:23 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:57:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:57:44 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:57:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:57:48 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:58:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 18:58:14 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:00:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:00:47 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:01:52 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:01:52 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:02:39 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 230 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:02:39 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(230): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 230, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(454): Model_Ipcr->get_target_details('null')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_target_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:230
2015-03-27 19:04:31 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO), expecting function (T_FUNCTION) ~ APPPATH/classes/Controller/Ajax.php [ 465 ] in file:line
2015-03-27 19:04:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 19:10:15 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/classes/Controller/Ajax.php [ 461 ] in file:line
2015-03-27 19:10:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 19:19:31 --- EMERGENCY: ErrorException [ 2048 ]: Declaration of Controller_Faculty_IpcrGroup::action_check() should be compatible with Controller_Faculty::action_check($user_ID) ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 3 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:3
2015-03-27 19:19:31 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(3): Kohana_Core::error_handler(2048, 'Declaration of ...', '/Users/jenny/Si...', 3, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Core.php(511): require('/Users/jenny/Si...')
#2 [internal function]: Kohana_Core::auto_load('Controller_Facu...')
#3 [internal function]: spl_autoload_call('Controller_Facu...')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(74): class_exists('Controller_Facu...')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:3
2015-03-27 19:31:12 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '?' ~ APPPATH/views/faculty/ipcr/view/group.php [ 43 ] in file:line
2015-03-27 19:31:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 19:48:20 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE), expecting ',' or ';' ~ APPPATH/views/faculty/ipcr/view/group.php [ 51 ] in file:line
2015-03-27 19:48:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 19:48:45 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/views/faculty/ipcr/view/group.php [ 55 ] in file:line
2015-03-27 19:48:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 19:53:23 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: label ~ APPPATH/views/faculty/ipcr/form/initial/template.php [ 5 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/initial/template.php:5
2015-03-27 19:53:23 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/initial/template.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 5, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(352): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(109): Controller_Faculty_Ipcr->show_draft(Array)
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/initial/template.php:5
2015-03-27 20:15:57 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Controller_Faculty_Opcr::show_pdf(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php on line 110 and defined ~ APPPATH/classes/Controller/Faculty/Opcr.php [ 258 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:258
2015-03-27 20:15:57 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(258): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(110): Controller_Faculty_Opcr->show_pdf(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:258
2015-03-27 21:03:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 71 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:71
2015-03-27 21:03:49 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(71): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 71, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(168): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:71
2015-03-27 21:05:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 71 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:71
2015-03-27 21:05:59 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(71): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 71, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(168): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:71
2015-03-27 21:06:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ipcr_forms ~ APPPATH/views/faculty/opcr/form/final/fragment.php [ 69 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/fragment.php:69
2015-03-27 21:06:40 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/fragment.php(69): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 69, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php(46): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(205): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#17 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/fragment.php:69
2015-03-27 21:07:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: rermarks ~ APPPATH/views/faculty/opcr/form/final/fragment.php [ 103 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/fragment.php:103
2015-03-27 21:07:40 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/fragment.php(103): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 103, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php(50): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(205): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#17 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/fragment.php:103
2015-03-27 21:49:29 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ']' ~ APPPATH/views/faculty/opcr/form/final/template.php [ 64 ] in file:line
2015-03-27 21:49:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 21:52:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: flag ~ APPPATH/views/faculty/opcr/form/final/template.php [ 22 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php:22
2015-03-27 21:52:09 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php(22): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 22, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(201): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php:22
2015-03-27 22:01:34 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: flag ~ APPPATH/views/faculty/opcr/form/final/template.php [ 22 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php:22
2015-03-27 22:01:34 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php(22): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 22, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(201): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php:22
2015-03-27 22:04:27 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: identifier ~ APPPATH/views/faculty/opcr/form/final/template.php [ 65 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php:65
2015-03-27 22:04:27 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php(65): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 65, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(209): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/final/template.php:65
2015-03-27 22:12:35 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'opcr_ID' cannot be null [ INSERT INTO ipcrtbl (opcr_ID, user_ID) VALUES (NULL, '12') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-27 22:12:35 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO ipc...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(92): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(41): Model_Ipcr->initialize(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-27 22:12:37 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'opcr_ID' cannot be null [ INSERT INTO ipcrtbl (opcr_ID, user_ID) VALUES (NULL, '12') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-27 22:12:37 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO ipc...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(92): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(41): Model_Ipcr->initialize(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-27 22:13:04 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'opcr_ID' cannot be null [ INSERT INTO ipcrtbl (opcr_ID, user_ID) VALUES (NULL, '12') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-27 22:13:04 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO ipc...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(92): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(41): Model_Ipcr->initialize(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-27 22:14:44 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/opcr/chair/template could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-27 22:14:44 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/opcr/ch...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/opcr/ch...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(199): Kohana_View::factory('faculty/opcr/ch...')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-27 22:38:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: programIDs ~ APPPATH/classes/Controller/Ajax.php [ 490 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:490
2015-03-27 22:38:49 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(490): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 490, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_output_details()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:490
2015-03-27 22:39:20 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: programIDs ~ APPPATH/classes/Controller/Ajax.php [ 490 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:490
2015-03-27 22:39:20 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(490): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 490, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_output_details()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:490
2015-03-27 22:39:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: univ ~ APPPATH/classes/Controller/Ajax.php [ 490 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:490
2015-03-27 22:39:59 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(490): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 490, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_output_details()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:490
2015-03-27 22:40:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Ajax::$session ~ APPPATH/classes/Controller/Ajax.php [ 491 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:491
2015-03-27 22:40:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(491): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/jenny/Si...', 491, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_output_details()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:491
2015-03-27 22:41:05 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: i ~ APPPATH/classes/Controller/Ajax.php [ 498 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:498
2015-03-27 22:41:05 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(498): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 498, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_output_details()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:498
2015-03-27 22:41:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Controller/Ajax.php [ 503 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:503
2015-03-27 22:41:24 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(503): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 503, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_output_details()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:503
2015-03-27 22:42:59 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Opcr::get_output_targets() ~ APPPATH/classes/Controller/Ajax.php [ 488 ] in file:line
2015-03-27 22:42:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 22:47:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: output_ID ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 202 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:202
2015-03-27 22:47:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(202): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 202, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:202
2015-03-27 22:56:18 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Model_Opcr::get_details(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php on line 241 and defined ~ APPPATH/classes/Model/Opcr.php [ 63 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:63
2015-03-27 22:56:18 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(63): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 63, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(241): Model_Opcr->get_details()
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_save()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:63
2015-03-27 22:56:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: ipcr ~ APPPATH/classes/Controller/Faculty/Opcr.php [ 244 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:244
2015-03-27 22:56:46 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(244): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 244, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_save()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:244
2015-03-27 23:01:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr ~ APPPATH/views/faculty/opcr/view/faculty.php [ 19 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:19
2015-03-27 23:01:42 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 19, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(338): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(110): Controller_Faculty_Opcr->show_pdf(Array)
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:19
2015-03-27 15:21:54 --- EMERGENCY: ErrorException [ 2 ]: array_sum() expects parameter 1 to be array, null given ~ APPPATH/views/mpdf/opcr/basic.php [ 97 ] in file:line
2015-03-27 15:21:54 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_sum() exp...', '/Users/jenny/Si...', 97, Array)
#1 /Users/jenny/Sites/up-oams/application/views/mpdf/opcr/basic.php(97): array_sum(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(384): Kohana_View->__toString()
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(33): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'submit', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2015-03-27 15:23:00 --- EMERGENCY: ErrorException [ 2 ]: array_sum() expects parameter 1 to be array, null given ~ APPPATH/views/mpdf/opcr/basic.php [ 97 ] in file:line
2015-03-27 15:23:00 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_sum() exp...', '/Users/jenny/Si...', 97, Array)
#1 /Users/jenny/Sites/up-oams/application/views/mpdf/opcr/basic.php(97): array_sum(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(384): Kohana_View->__toString()
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(33): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'submit', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2015-03-27 15:23:57 --- EMERGENCY: ErrorException [ 2 ]: array_sum() expects parameter 1 to be array, null given ~ APPPATH/views/mpdf/opcr/basic.php [ 97 ] in file:line
2015-03-27 15:23:57 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_sum() exp...', '/Users/jenny/Si...', 97, Array)
#1 /Users/jenny/Sites/up-oams/application/views/mpdf/opcr/basic.php(97): array_sum(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(384): Kohana_View->__toString()
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(33): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'submit', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2015-03-27 15:24:11 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get_user_group() on null ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 285 ] in file:line
2015-03-27 15:24:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 15:24:55 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Opcr::get_targets() ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 288 ] in file:line
2015-03-27 15:24:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-27 15:25:58 --- EMERGENCY: View_Exception [ 0 ]: The requested view mpdf/ipcr/consolidated.php could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-27 15:25:58 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('mpdf/ipcr/conso...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('mpdf/ipcr/conso...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(291): Kohana_View::factory('mpdf/ipcr/conso...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(29): Controller_Faculty_Mpdf->ipcr_pdf('2', 'ipcr-consolidat...', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-27 15:26:07 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/views/mpdf/ipcr/consolidated.php [ 60 ] in /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php:60
2015-03-27 15:26:07 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php(60): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Users/jenny/Si...', 60, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(293): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(29): Controller_Faculty_Mpdf->ipcr_pdf('2', 'ipcr-consolidat...', 'preview', Array)
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php:60
2015-03-27 23:26:10 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-27 23:26:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(70): Model_Ipcr->get_details('2')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-27 15:27:04 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/views/mpdf/ipcr/consolidated.php [ 60 ] in /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php:60
2015-03-27 15:27:04 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php(60): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Users/jenny/Si...', 60, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(293): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(29): Controller_Faculty_Mpdf->ipcr_pdf('2', 'ipcr-consolidat...', 'download', Array)
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php:60
2015-03-27 15:28:08 --- EMERGENCY: ErrorException [ 2 ]: number_format() expects parameter 1 to be double, array given ~ APPPATH/views/mpdf/ipcr/consolidated.php [ 95 ] in file:line
2015-03-27 15:28:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'number_format()...', '/Users/jenny/Si...', 95, Array)
#1 /Users/jenny/Sites/up-oams/application/views/mpdf/ipcr/consolidated.php(95): number_format(Array, 1)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(294): Kohana_View->__toString()
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(29): Controller_Faculty_Mpdf->ipcr_pdf('2', 'ipcr-consolidat...', 'download', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
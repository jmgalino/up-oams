<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-25 09:29:37 --- EMERGENCY: ErrorException [ 2048 ]: Declaration of Controller_Faculty_IpcrGroup::action_check() should be compatible with Controller_Faculty::action_check($user_ID) ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 3 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:3
2015-03-25 09:29:37 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(3): Kohana_Core::error_handler(2048, 'Declaration of ...', '/Users/jenny/Si...', 3, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Core.php(511): require('/Users/jenny/Si...')
#2 [internal function]: Kohana_Core::auto_load('Controller_Facu...')
#3 [internal function]: spl_autoload_call('Controller_Facu...')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(74): class_exists('Controller_Facu...')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:3
2015-03-25 09:30:39 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH/views/faculty/ipcr/view/group.php [ 17 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/group.php:17
2015-03-25 09:30:39 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/group.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 17, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(68): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/group.php:17
2015-03-25 09:32:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php:956
2015-03-25 09:32:49 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 956, Array)
#1 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#2 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php:956
2015-03-25 09:34:11 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Controller_Faculty::action_check(), called in /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php on line 84 and defined ~ APPPATH/classes/Controller/Faculty.php [ 8 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty.php:8
2015-03-25 09:34:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty.php(8): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 8, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty.php:8
2015-03-25 09:35:29 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Controller_Faculty::action_check(), called in /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php on line 84 and defined ~ APPPATH/classes/Controller/Faculty.php [ 8 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty.php:8
2015-03-25 09:35:29 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty.php(8): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 8, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty.php:8
2015-03-25 09:46:21 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 82 ] in file:line
2015-03-25 09:46:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-25 09:46:32 --- EMERGENCY: ErrorException [ 1 ]: Class 'Debugg' not found ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 83 ] in file:line
2015-03-25 09:46:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-25 16:01:28 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 129 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:129
2015-03-25 16:01:28 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(129): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 129, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:129
2015-03-25 18:04:25 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Opcr.php [ 71 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:71
2015-03-25 18:04:25 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php(71): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 71, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(132): Model_Opcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_consolidate()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Opcr.php:71
2015-03-25 18:57:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: consolidate_url ~ APPPATH/views/faculty/opcr/form/modals/initialize.php [ 18 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 18:57:58 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 18, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(41): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(41): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_index()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#17 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 18:59:49 --- EMERGENCY: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH/classes/Controller/Faculty/Opcr.php [ 41 ] in file:line
2015-03-25 18:59:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-25 19:00:51 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: consolidate_url ~ APPPATH/views/faculty/opcr/form/modals/initialize.php [ 18 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:00:51 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 18, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(41): Kohana_View->__toString()
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
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:01:17 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: consolidate_url ~ APPPATH/views/faculty/opcr/form/modals/initialize.php [ 18 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:01:17 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 18, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(41): Kohana_View->__toString()
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
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:01:18 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: consolidate_url ~ APPPATH/views/faculty/opcr/form/modals/initialize.php [ 18 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:01:18 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 18, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(41): Kohana_View->__toString()
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
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:01:18 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: consolidate_url ~ APPPATH/views/faculty/opcr/form/modals/initialize.php [ 18 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
2015-03-25 19:01:18 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 18, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(41): Kohana_View->__toString()
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
#18 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/form/modals/initialize.php:18
<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-22 10:29:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Admin_User::$user ~ APPPATH/classes/Controller/Admin/User.php [ 15 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/User.php:15
2014-07-22 10:29:43 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/User.php(15): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 15, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_User->action_user()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/User.php:15
2014-07-22 16:37:55 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_User::$oams ~ APPPATH/classes/Controller/User.php [ 71 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:71
2014-07-22 16:37:55 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(71): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 71, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(113): Controller_User->action_index()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_logout()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:71
2014-07-22 16:49:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session_details ~ APPPATH/classes/Controller/User.php [ 28 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:49:32 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(28): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 28, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:49:55 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session_details ~ APPPATH/classes/Controller/User.php [ 28 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:49:55 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(28): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 28, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:50:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session_details ~ APPPATH/classes/Controller/User.php [ 28 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:50:02 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(28): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 28, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:51:38 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session_details ~ APPPATH/classes/Controller/User.php [ 28 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:51:38 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(28): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 28, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:51:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session_details ~ APPPATH/classes/Controller/User.php [ 28 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:51:44 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(28): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 28, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:52:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session_details ~ APPPATH/classes/Controller/User.php [ 28 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 16:52:14 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(28): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 28, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:28
2014-07-22 17:13:14 --- EMERGENCY: View_Exception [ 0 ]: The requested view admin/user/form/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-07-22 17:13:14 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('admin/user/form...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('admin/user/form...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/profile/form/template.php(30): Kohana_View::factory('admin/user/form...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/profile.php(113): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(19): Kohana_View->__toString()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(30): Kohana_View->render()
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_index()
#15 [internal function]: Kohana_Controller->execute()
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#19 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#20 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-07-22 17:13:17 --- EMERGENCY: View_Exception [ 0 ]: The requested view admin/user/form/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-07-22 17:13:17 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('admin/user/form...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('admin/user/form...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/profile/form/template.php(30): Kohana_View::factory('admin/user/form...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/profile.php(113): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(19): Kohana_View->__toString()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(30): Kohana_View->render()
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_index()
#15 [internal function]: Kohana_Controller->execute()
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#19 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#20 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-07-22 17:13:19 --- EMERGENCY: View_Exception [ 0 ]: The requested view admin/user/form/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-07-22 17:13:19 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('admin/user/form...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('admin/user/form...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/profile/form/template.php(30): Kohana_View::factory('admin/user/form...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/profile/template.php(53): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(19): Kohana_View->__toString()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(87): Kohana_View->render()
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_view()
#15 [internal function]: Kohana_Controller->execute()
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#19 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#20 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-07-22 19:41:18 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Faculty::$oams ~ APPPATH/classes/Controller/User.php [ 10 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:10
2014-07-22 19:41:18 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(10): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 10, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:10
2014-07-22 19:41:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Faculty::$oams ~ APPPATH/classes/Controller/User.php [ 10 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:10
2014-07-22 19:41:24 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php(10): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 10, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_User->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/User.php:10
2014-07-22 21:49:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:49:22 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:50:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:50:48 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:50:48 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/Controller/Admin/Admin.php [ 14 ] in file:line
2014-07-22 21:50:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-22 21:52:01 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:01 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:19 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:19 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:35 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:43 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:44 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:45 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: controller ~ SYSPATH/classes/Kohana/Request.php [ 956 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
2014-07-22 21:52:45 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(956): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 956, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:956
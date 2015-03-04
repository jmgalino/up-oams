<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-04 14:42:39 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 4 for Model_Accom::get_faculty_accom(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php on line 77 and defined ~ APPPATH/classes/Model/Accom.php [ 8 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:8
2015-03-04 14:42:39 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(8): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 8, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(77): Model_Accom->get_faculty_accom('49', NULL, NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:8
2015-03-04 14:44:33 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Controller/Admin/Profile.php [ 339 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:44:33 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(339): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 339, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(51): Controller_Admin_Profile->update_univ(Array, false)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:46:10 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Controller/Admin/Profile.php [ 339 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:46:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(339): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 339, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(51): Controller_Admin_Profile->update_univ(Array, false)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:46:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Controller/Admin/Profile.php [ 339 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:46:40 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(339): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 339, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(51): Controller_Admin_Profile->update_univ(Array, false)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:47:07 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Controller/Admin/Profile.php [ 339 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:47:07 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(339): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 339, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(51): Controller_Admin_Profile->update_univ(Array, false)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:339
2015-03-04 14:49:16 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_User::update_univ() ~ APPPATH/classes/Model/User.php [ 124 ] in file:line
2015-03-04 14:49:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 14:57:38 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$positions' (T_VARIABLE) ~ APPPATH/classes/Model/User.php [ 123 ] in file:line
2015-03-04 14:57:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 14:57:44 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$positions' (T_VARIABLE) ~ APPPATH/classes/Model/User.php [ 123 ] in file:line
2015-03-04 14:57:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 14:59:09 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH/classes/Model/User.php [ 167 ] in file:line
2015-03-04 14:59:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 15:35:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH/classes/Model/User.php [ 164 ] in file:line
2015-03-04 15:35:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 15:37:12 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: insert_profile ~ APPPATH/classes/Model/User.php [ 167 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:167
2015-03-04 15:37:12 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(167): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 167, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:167
2015-03-04 15:38:34 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user_detail ~ APPPATH/classes/Model/User.php [ 158 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:158
2015-03-04 15:38:34 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(158): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 158, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:158
2015-03-04 15:38:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 306 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:306
2015-03-04 15:38:58 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(306): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 306, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(158): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(324): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(158): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:306
2015-03-04 15:39:33 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 306 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:306
2015-03-04 15:39:33 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(306): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 306, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(158): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(324): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(158): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:306
2015-03-04 15:40:36 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 307 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:40:36 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(307): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 307, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(325): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:40:51 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 307 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:40:51 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(307): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 307, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(325): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:41:16 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 307 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:41:16 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(307): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 307, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(325): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:42:05 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 307 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:42:05 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(307): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 307, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(325): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:42:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 307 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:42:14 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(307): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 307, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(325): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(159): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:307
2015-03-04 15:43:10 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' ~ APPPATH/classes/Model/User.php [ 159 ] in file:line
2015-03-04 15:43:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 15:43:16 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 308 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:308
2015-03-04 15:43:16 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(308): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 308, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(160): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(326): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(160): Model_User->update_univ(Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(182): Model_User->update_details(Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:308
2015-03-04 15:46:00 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: program_ID ~ APPPATH/classes/Model/User.php [ 308 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:308
2015-03-04 15:46:00 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(308): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 308, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(160): Model_User->update_univ(Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(274): Model_User->update_details(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(191): Controller_Admin_University->update_user('52', '', 'dean')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:308
2015-03-04 15:55:07 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_User::get_details(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php on line 272 and defined ~ APPPATH/classes/Model/User.php [ 25 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:25
2015-03-04 15:55:07 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(25): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 25, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(272): Model_User->get_details('52')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(191): Controller_Admin_University->update_user('52', '', 'dean')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:25
2015-03-04 15:55:37 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 15:55:37 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(194): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 15:59:14 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 15:59:14 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(194): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:02:02 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/Controller/Admin/University.php [ 196 ] in file:line
2015-03-04 16:02:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 16:02:23 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:02:23 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(198): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:03:46 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:03:46 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(199): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:09:25 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:09:25 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(199): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:10:35 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:10:35 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(200): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:11:18 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:11:18 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(199): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:11:46 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ UPDATE univ_collegetbl SET college_ID = '7', college = 'hey', short = 'h', user_ID = '' WHERE college_ID = '7' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:11:46 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(3, 'UPDATE univ_col...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(137): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(199): Model_Univ->update_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(128): Controller_Admin_University->update_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_update()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 16:18:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: profile_deleted ~ APPPATH/classes/Model/User.php [ 273 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:273
2015-03-04 16:18:56 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(273): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 273, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(280): Model_User->delete_profile('52')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_delete()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:273
2015-03-04 17:00:52 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '000000001' for key 'employee_code' [ INSERT INTO user_profiletbl (user_type, employee_code, title, first_name, middle_name, last_name, suffix, birthday, faculty_code, rank, program_ID, position) VALUES ('Admin', '000000001', '', 'a', 'a', 'a', '', '2015-03-25', NULL, NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 17:00:52 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(114): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(45): Model_User->add_user(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 17:04:04 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '000000002' for key 'employee_code' [ INSERT INTO user_profiletbl (user_type, employee_code, title, first_name, middle_name, last_name, suffix, birthday, faculty_code, rank, program_ID, position) VALUES ('Admin', '000000002', '', 'q', 'q', 'q', '', '2015-03-10', NULL, NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 17:04:04 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(114): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(45): Model_User->add_user(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 17:04:40 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '000000003' for key 'employee_code' [ INSERT INTO user_profiletbl (user_type, employee_code, title, first_name, middle_name, last_name, suffix, birthday, faculty_code, rank, program_ID, position) VALUES ('Admin', '000000003', '', 'q', 'q', 'q', '', '2015-03-24', NULL, NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 17:04:40 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(114): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(45): Model_User->add_user(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-04 17:15:36 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH/classes/Controller/Admin/Profile.php [ 46 ] in file:line
2015-03-04 17:15:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 17:20:11 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '=>' (T_DOUBLE_ARROW) ~ APPPATH/classes/Model/User.php [ 264 ] in file:line
2015-03-04 17:20:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-04 17:20:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: rows_updated ~ APPPATH/classes/Model/User.php [ 267 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:267
2015-03-04 17:20:24 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(267): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 267, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(245): Model_User->reset_password('2')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:267
2015-03-04 17:22:55 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_User::get_details(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php on line 253 and defined ~ APPPATH/classes/Model/User.php [ 25 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:25
2015-03-04 17:22:55 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(25): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 25, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(253): Model_User->get_details('47')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:25
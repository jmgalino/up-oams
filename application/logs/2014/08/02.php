<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-02 10:42:08 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Route could not be converted to string ~ APPPATH/classes/Controller/Admin/Profile.php [ 150 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:150
2014-08-02 10:42:08 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(150): Kohana_Core::error_handler(4096, 'Object of class...', '/Applications/X...', 150, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:150
2014-08-02 11:19:32 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Request::process() must be an instance of Request, instance of Response given, called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php on line 156 and defined ~ SYSPATH/classes/Kohana/Request.php [ 457 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:457
2014-08-02 11:19:32 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(457): Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/Applications/X...', 457, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(156): Kohana_Request::process(Object(Response))
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php:457
2014-08-02 11:20:33 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/classes/Controller/Admin/Profile.php [ 158 ] in file:line
2014-08-02 11:20:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 11:21:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/classes/Controller/Admin/Profile.php [ 158 ] in file:line
2014-08-02 11:21:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 11:22:08 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/classes/Controller/Admin/Profile.php [ 158 ] in file:line
2014-08-02 11:22:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 11:29:48 --- EMERGENCY: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 16531456 bytes) ~ APPPATH/classes/Controller/Admin/Profile.php [ 159 ] in file:line
2014-08-02 11:29:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 11:30:11 --- EMERGENCY: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 16564224 bytes) ~ APPPATH/classes/Controller/Admin/Profile.php [ 159 ] in file:line
2014-08-02 11:30:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 11:41:55 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Request::$controller ~ APPPATH/classes/Controller/Admin/Profile.php [ 154 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:154
2014-08-02 11:41:55 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(154): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 154, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:154
2014-08-02 11:47:49 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Route could not be converted to string ~ APPPATH/classes/Controller/Admin/Profile.php [ 153 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:153
2014-08-02 11:47:49 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(153): Kohana_Core::error_handler(4096, 'Object of class...', '/Applications/X...', 153, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:153
2014-08-02 11:54:15 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Route::$action ~ APPPATH/classes/Controller/Admin/Profile.php [ 154 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:154
2014-08-02 11:54:15 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php(154): Kohana_Core::error_handler(8, 'Undefined prope...', '/Applications/X...', 154, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_reset()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Profile.php:154
2014-08-02 16:54:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: delete_success ~ APPPATH/classes/Controller/Faculty/Accom.php [ 90 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php:90
2014-08-02 16:54:48 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(90): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 90, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php:90
2014-08-02 16:59:25 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/views/faculty/accom/form/template.php [ 49 ] in file:line
2014-08-02 16:59:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 17:00:04 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/views/faculty/accom/form/template.php [ 49 ] in file:line
2014-08-02 17:00:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 17:00:20 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH/views/faculty/accom/form/template.php [ 49 ] in file:line
2014-08-02 17:00:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 17:22:12 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: accom ~ APPPATH/views/faculty/accom/form/template.php [ 48 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/template.php:48
2014-08-02 17:22:12 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/template.php(48): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 48, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(21): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(146): Kohana_View->render()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(39): Controller_Faculty_Accom->action_draft(NULL)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#10 [internal function]: Kohana_Controller->execute()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#15 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/template.php:48
2014-08-02 18:50:52 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Accom::find() ~ APPPATH/classes/Controller/Faculty/Accom.php [ 146 ] in file:line
2014-08-02 18:50:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 19:53:10 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Accom::find() ~ APPPATH/classes/Controller/Faculty/Accom.php [ 146 ] in file:line
2014-08-02 19:53:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-02 19:54:06 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-reporttbl WHERE accom_ID = '3' AND type = 'pub'' at line 1 [ SELECT accom_specID FROM connect_accom-reporttbl WHERE accom_ID = '3' AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-02 19:54:06 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT accom_sp...', false, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(153): Kohana_Database_Query->execute()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(155): Model_Accom->find_accom('3', 'pub')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(79): Controller_Faculty_Accom->action_draft(NULL)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_edit()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-02 20:00:23 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-reporttbl WHERE accom_ID = '3' AND type = 'pub'' at line 1 [ SELECT accom_specID FROM connect_accom-reporttbl WHERE accom_ID = '3' AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-02 20:00:23 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT accom_sp...', false, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(153): Kohana_Database_Query->execute()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(155): Model_Accom->find_accom('3', 'pub')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(79): Controller_Faculty_Accom->action_draft(NULL)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_edit()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-02 20:01:51 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/views/faculty/accom/form/fragments/publication.php [ 4 ] in file:line
2014-08-02 20:01:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
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
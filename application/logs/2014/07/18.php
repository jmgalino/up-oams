<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-18 17:27:15 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Model_User::get_users(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php on line 52 and defined ~ APPPATH/classes/Model/User.php [ 52 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:52
2014-07-18 17:27:15 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(52): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 52, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(52): Model_User->get_users()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:52
2014-07-18 17:56:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/classes/Model/User.php [ 69 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:69
2014-07-18 17:56:46 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(69): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 69, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(53): Model_User->get_users(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:69
2014-07-18 17:57:13 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Admin.php [ 52 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php:52
2014-07-18 17:57:13 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(52): Kohana_Core::error_handler(8, 'Array to string...', '/Applications/X...', 52, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php:52
2014-07-18 17:57:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/classes/Model/User.php [ 69 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:69
2014-07-18 17:57:24 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(69): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 69, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(53): Model_User->get_users(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:69
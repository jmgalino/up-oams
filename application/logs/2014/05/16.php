<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-16 12:42:13 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-16 12:42:13 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM u...', false, Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(8): Kohana_Database_Query->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(12): Model_User->get_users()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-16 13:39:13 --- EMERGENCY: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user ''@'localhost' (using password: YES) ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-16 13:39:13 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM u...', false, Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(8): Kohana_Database_Query->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(12): Model_User->get_users()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-16 13:39:57 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Database_Result_Cached could not be converted to string ~ APPPATH/classes/Model/User.php [ 9 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:9
2014-05-16 13:39:57 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(9): Kohana_Core::error_handler(4096, 'Object of class...', '/Applications/X...', 9, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(12): Model_User->get_users()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:9
2014-05-16 13:40:50 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$result' (T_VARIABLE), expecting '(' ~ APPPATH/classes/Model/User.php [ 9 ] in file:line
2014-05-16 13:40:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-16 13:41:22 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Model/User.php [ 10 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:10
2014-05-16 13:41:22 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php(10): Kohana_Core::error_handler(8, 'Array to string...', '/Applications/X...', 10, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Site.php(12): Model_User->get_users()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/User.php:10
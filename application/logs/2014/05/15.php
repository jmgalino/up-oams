<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-15 20:04:12 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Cookie.php:67
2014-05-15 20:04:12 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('_em_t', NULL)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('_em_t')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Cookie.php:67
2014-05-15 20:15:01 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant university_of_the_philippines_mindanao_college_of_science_and_mathematics_department_of_mathematics_physics_and_computer_science - assumed 'university_of_the_philippines_mindanao_college_of_science_and_mathematics_department_of_mathematics_physics_and_computer_science' ~ APPPATH/bootstrap.php [ 147 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/bootstrap.php:147
2014-05-15 20:15:01 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/bootstrap.php(147): Kohana_Core::error_handler(8, 'Use of undefine...', '/Applications/X...', 147, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(102): require('/Applications/X...')
#2 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/bootstrap.php:147
2014-05-15 21:02:01 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'new' (T_NEW) ~ APPPATH/classes/Controller/Site.php [ 5 ] in file:line
2014-05-15 21:02:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-15 21:03:33 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:03:33 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:05:43 --- EMERGENCY: Database_Exception [ 2002 ]: SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: nodename nor servname provided, or not known ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:05:43 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:06:19 --- EMERGENCY: Database_Exception [ 1130 ]: SQLSTATE[HY000] [1130] Host '192.168.1.6' is not allowed to connect to this MySQL server ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:06:19 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:06:29 --- EMERGENCY: Database_Exception [ 1130 ]: SQLSTATE[HY000] [1130] Host '192.168.1.6' is not allowed to connect to this MySQL server ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:06:29 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:06:46 --- EMERGENCY: Database_Exception [ 1130 ]: SQLSTATE[HY000] [1130] Host '192.168.1.6' is not allowed to connect to this MySQL server ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:06:46 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:06:47 --- EMERGENCY: Database_Exception [ 1130 ]: SQLSTATE[HY000] [1130] Host '192.168.1.6' is not allowed to connect to this MySQL server ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:06:47 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:06:53 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:06:53 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:07:03 --- EMERGENCY: Database_Exception [ 1130 ]: SQLSTATE[HY000] [1130] Host '192.168.1.6' is not allowed to connect to this MySQL server ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:07:03 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:07:10 --- EMERGENCY: Database_Exception [ 1130 ]: SQLSTATE[HY000] [1130] Host '192.168.1.6' is not allowed to connect to this MySQL server ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:07:10 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:07:44 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:07:44 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 21:07:46 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 21:07:46 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 23:04:11 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 23:04:11 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 23:19:28 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 23:19:28 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
2014-05-15 23:22:14 --- EMERGENCY: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'testdb' ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php:130
2014-05-15 23:22:14 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/PDO.php(130): Kohana_Database_PDO->connect()
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
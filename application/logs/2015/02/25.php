<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-25 10:05:27 --- EMERGENCY: ErrorException [ 2 ]: date() expects at least 1 parameter, 0 given ~ APPPATH/classes/Controller/User.php [ 262 ] in file:line
2015-02-25 10:05:27 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date() expects ...', '/Users/jenny/Si...', 262, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(262): date()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(79): Controller_User->check_announcements()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_User->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-02-25 23:24:03 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ INSERT INTO user_profiletbl (user_type, user_ID, employee_code, first_name, middle_name, last_name, birthday, faculty_code, rank, program_ID, position, department_ID) VALUES ('Admin', '', '111122222', 'a', 'b', 'b', '2015-03-02', NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-25 23:24:03 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(116): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(55): Model_User->add_user(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-25 23:28:42 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ INSERT INTO user_profiletbl (user_type, user_ID, employee_code, first_name, middle_name, last_name, birthday, faculty_code, rank, program_ID, position, department_ID) VALUES ('Admin', '', '111122222', 'a', 'b', 'b', '2015-03-02', NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-25 23:28:42 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(116): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(55): Model_User->add_user(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-25 23:29:02 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'user_ID' at row 1 [ INSERT INTO user_profiletbl (user_type, user_ID, employee_code, first_name, middle_name, last_name, birthday, faculty_code, rank, program_ID, position, department_ID) VALUES ('Admin', '', '111122222', 'q', 'q', 'q', '2015-02-20', NULL, NULL, NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-25 23:29:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(116): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(55): Model_User->add_user(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
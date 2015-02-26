<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-27 00:05:20 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'education_ID' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES ('', 'a', '', 'certificate', '2122', 'a', '', 'a', 'a', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:05:20 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(201): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_education()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:08:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Model/User.php [ 214 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:214
2015-02-27 00:08:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(214): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 214, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(216): Model_User->update_education(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update_education()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:214
2015-02-27 00:13:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Model/User.php [ 214 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:214
2015-02-27 00:13:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(214): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 214, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(216): Model_User->update_education(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update_education()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:214
2015-02-27 00:16:11 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_User::get_education_details(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php on line 87 and defined ~ APPPATH/classes/Model/User.php [ 184 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:184
2015-02-27 00:16:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(184): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 184, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(87): Model_User->get_education_details('6')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_education_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:184
2015-02-27 00:16:17 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_User::get_education_details(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php on line 87 and defined ~ APPPATH/classes/Model/User.php [ 184 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:184
2015-02-27 00:16:17 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(184): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 184, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(87): Model_User->get_education_details('5')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_education_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:184
2015-02-27 00:16:50 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_User::get_education_details(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php on line 87 and defined ~ APPPATH/classes/Model/User.php [ 184 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:184
2015-02-27 00:16:50 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(184): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 184, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(87): Model_User->get_education_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_education_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:184
2015-02-27 00:17:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: update_success ~ APPPATH/classes/Controller/Admin/Profile.php [ 217 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:217
2015-02-27 00:17:06 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(217): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 217, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update_education()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php:217
2015-02-27 00:24:10 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'college_ID' at row 1 [ INSERT INTO univ_collegetbl (college_ID, college, short) VALUES ('', 'hey', 'h') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:24:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO uni...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(109): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(172): Model_Univ->add_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(99): Controller_Admin_University->new_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:24:19 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'college_ID' at row 1 [ INSERT INTO univ_collegetbl (college_ID, college, short) VALUES ('', 'hey', 'h') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:24:19 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO uni...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(109): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(172): Model_Univ->add_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(99): Controller_Admin_University->new_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:27:20 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'college_ID' at row 1 [ INSERT INTO univ_collegetbl (college_ID, college, short) VALUES ('', 'hey', 'h') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:27:20 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO uni...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(109): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(172): Model_Univ->add_college(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(99): Controller_Admin_University->new_college()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:28:22 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'program_ID' at row 1 [ INSERT INTO univ_programtbl (program_ID, college_ID, department_ID, program_short, program, short, date_instituted, type, vision, goals) VALUES ('', '7', '12', 'a', 'b', 'c', '2015-02-23', 'Undergraduate', 'a', 'a') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:28:22 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO uni...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Univ.php(298): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(242): Model_Univ->add_program(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/University.php(107): Controller_Admin_University->new_program()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_University->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_University))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-27 00:53:44 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Controller/User.php [ 286 ] in file:line
2015-02-27 00:53:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-27 01:01:54 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Ajax.php [ 506 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:506
2015-02-27 01:01:54 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(506): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 506, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_test()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:506
2015-02-27 01:02:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: table ~ APPPATH/classes/Controller/Ajax.php [ 507 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:507
2015-02-27 01:02:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(507): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 507, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_test()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:507
2015-02-27 01:03:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: exclude ~ APPPATH/classes/Controller/Ajax.php [ 507 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:507
2015-02-27 01:03:43 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(507): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 507, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_test()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:507
2015-02-27 01:05:14 --- EMERGENCY: ErrorException [ 2 ]: in_array() expects parameter 2 to be array, null given ~ APPPATH/classes/Model/Oams.php [ 14 ] in file:line
2015-02-27 01:05:14 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'in_array() expe...', '/Users/jenny/Si...', 14, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Oams.php(14): in_array('college_ID', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(518): Model_Oams::unique_record(Array, 'univ_programtbl', NULL)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_test()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-02-27 01:05:58 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Ajax.php [ 70 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:70
2015-02-27 01:05:58 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(70): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 70, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_unique()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:70
2015-02-27 01:06:01 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Ajax.php [ 70 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:70
2015-02-27 01:06:01 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(70): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 70, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_unique()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php:70
2015-02-27 01:20:59 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Controller/Ajax.php [ 220 ] in file:line
2015-02-27 01:20:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-27 03:09:01 --- EMERGENCY: Database_Exception [ 2002 ]: SQLSTATE[HY000] [2002] No such file or directory ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
2015-02-27 03:09:01 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
#1 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database.php(478): Kohana_Database_PDO->escape('page_title')
#2 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query/Builder.php(116): Kohana_Database->quote('page_title')
#3 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query/Builder/Select.php(372): Kohana_Database_Query_Builder->_compile_conditions(Object(Database_PDO), Array)
#4 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query_Builder_Select->compile(Object(Database_PDO))
#5 /Users/jenny/Sites/up-oams/application/classes/Model/Oams.php(57): Kohana_Database_Query->execute()
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Site.php(13): Model_Oams->get_page_title()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(69): Controller_Site->before()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
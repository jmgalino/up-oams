<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-24 08:34:42 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'education_ID' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES ('', 'Communication', '', 'certficate', '2010', 'UP Open University', '', 'Los Baños', 'Philippines', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:34:42 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(202): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:36:34 --- EMERGENCY: Database_Exception [ 01000 ]: SQLSTATE[01000]: Warning: 1265 Data truncated for column 'qualification' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, 'Char', '', 'certficate', '2010', 'Chorvs', '', 'General Santos City', 'Philippines', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:36:34 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(203): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:39:50 --- EMERGENCY: Database_Exception [ 01000 ]: SQLSTATE[01000]: Warning: 1265 Data truncated for column 'qualification' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, 'Char', '', 'certficate', '2010', 'Chorvs', '', 'General Santos City', 'Philippines', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:39:50 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(203): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:40:09 --- EMERGENCY: Database_Exception [ 01000 ]: SQLSTATE[01000]: Warning: 1265 Data truncated for column 'qualification' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, 'a', '', 'certficate', '2010', 'b', '', 'c', 'd', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:40:09 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(203): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:42:44 --- EMERGENCY: Database_Exception [ 01000 ]: SQLSTATE[01000]: Warning: 1265 Data truncated for column 'qualification' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, 'a', NULL, 'certficate', '2010', 'b', NULL, 'c', 'd', NULL, '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:42:44 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(206): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:43:45 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'education_ID' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES ('', 'a', '', 'certficate', '2010', 'b', '', 'c', 'd', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:43:45 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(203): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:45:31 --- EMERGENCY: Database_Exception [ 01000 ]: SQLSTATE[01000]: Warning: 1265 Data truncated for column 'qualification' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, 'a', '', 'certficate', '2010', 'b', '', 'c', 'd', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 08:45:31 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(203): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_educ()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 11:10:10 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/views/admin/profile/form/education.php [ 88 ] in file:line
2015-02-24 11:10:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-24 11:15:28 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'year' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, '', '', 'certificate', '', '', '', '', '', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 11:15:28 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(202): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_education()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 11:30:23 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'year' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, '', '', 'certificate', '', '', '', '', '', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 11:30:23 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(202): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_education()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 11:34:10 --- EMERGENCY: Database_Exception [ HY000 ]: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'year' at row 1 [ INSERT INTO user_educationtbl (education_ID, major, minor, qualification, year, institution, thesis, city, country, notes, user_ID) VALUES (NULL, '', '', 'certificate', '', '', '', '', '', '', '4') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-24 11:34:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO use...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(205): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(202): Model_User->add_education(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_new_education()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
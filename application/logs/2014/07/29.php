<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-29 13:44:42 --- EMERGENCY: ErrorException [ 2 ]: date_format() expects parameter 1 to be DateTimeInterface, string given ~ APPPATH/classes/Model/Accom.php [ 34 ] in file:line
2014-07-29 13:44:42 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_format() e...', '/Applications/X...', 34, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(34): date_format('yearmonth', '%Y %m')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-07-29 13:50:32 --- EMERGENCY: ErrorException [ 2 ]: date_format() expects parameter 1 to be DateTimeInterface, string given ~ APPPATH/classes/Model/Accom.php [ 34 ] in file:line
2014-07-29 13:50:32 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_format() e...', '/Applications/X...', 34, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(34): date_format('2014-07-29', '%Y %m')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-07-29 13:51:17 --- EMERGENCY: ErrorException [ 2 ]: date_format() expects parameter 1 to be DateTimeInterface, string given ~ APPPATH/classes/Model/Accom.php [ 34 ] in file:line
2014-07-29 13:51:17 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date_format() e...', '/Applications/X...', 34, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(34): date_format('2014-07-29', '%Y %m')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-07-29 13:55:28 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/classes/Model/Accom.php [ 45 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:45
2014-07-29 13:55:28 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(45): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 45, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:45
2014-07-29 13:56:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/classes/Model/Accom.php [ 47 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:47
2014-07-29 13:56:42 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(47): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 47, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:47
2014-07-29 13:58:23 --- EMERGENCY: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'oamsystemdb.users' doesn't exist [ SELECT * FROM users WHERE user_ID = '17' AND DATE_FORMAT(yearmonth, '%Y %m') = DATE_FORMAT('2014-07-29', '%Y %m') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-07-29 13:58:23 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM u...', false, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(34): Kohana_Database_Query->execute()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-07-29 13:58:41 --- EMERGENCY: ErrorException [ 4096 ]: Object of class Database_Result_Cached could not be converted to string ~ APPPATH/classes/Model/Accom.php [ 35 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:35
2014-07-29 13:58:41 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(35): Kohana_Core::error_handler(4096, 'Object of class...', '/Applications/X...', 35, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:35
2014-07-29 13:58:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/classes/Model/Accom.php [ 39 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:39
2014-07-29 13:58:58 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 39, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(51): Model_Accom->initialize(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:39
2014-07-29 14:00:19 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH/classes/Model/Accom.php [ 40 ] in file:line
2014-07-29 14:00:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-29 14:01:08 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on a non-object ~ APPPATH/classes/Controller/Faculty/Accom.php [ 50 ] in file:line
2014-07-29 14:01:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-07-29 14:07:11 --- EMERGENCY: ErrorException [ 2 ]: Illegal string offset 'accom_ID' ~ APPPATH/classes/Model/Accom.php [ 92 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:92
2014-07-29 14:07:11 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(92): Kohana_Core::error_handler(2, 'Illegal string ...', '/Applications/X...', 92, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(100): Model_Accom->delete('1')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:92
2014-07-29 14:08:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: accom_details ~ APPPATH/classes/Model/Accom.php [ 92 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:92
2014-07-29 14:08:02 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php(92): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 92, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(100): Model_Accom->delete('1')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Accom.php:92
2014-07-29 15:20:55 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: session ~ APPPATH/views/faculty/accom/form/modals/publication_fragment.php [ 4 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/modals/publication_fragment.php:4
2014-07-29 15:20:55 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/modals/publication_fragment.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 4, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/modals/publication.php(24): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/modals/accom_type.php(54): Kohana_View->__toString()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/template.php(57): Kohana_View->__toString()
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(21): Kohana_View->__toString()
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#17 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#18 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(138): Kohana_View->render()
#19 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Accom.php(89): Controller_Faculty_Accom->action_preview(NULL)
#20 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_edit()
#21 [internal function]: Kohana_Controller->execute()
#22 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#23 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#24 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#25 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#26 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/accom/form/modals/publication_fragment.php:4
<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-01-29 17:07:05 --- EMERGENCY: Database_Exception [ 2002 ]: SQLSTATE[HY000] [2002] No such file or directory ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
2015-01-29 17:07:05 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
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
2015-01-29 18:28:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: form_up ~ APPPATH/classes/Controller/Faculty/Accomspec.php [ 187 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accomspec.php:187
2015-01-29 18:28:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accomspec.php(187): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 187, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accomspec.php(40): Controller_Faculty_AccomSpec->check_rch(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_AccomSpec->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_AccomSpec))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accomspec.php:187
2015-01-29 18:28:53 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Controller/Faculty/Accomspec.php [ 188 ] in file:line
2015-01-29 18:28:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-29 18:29:57 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Controller/Faculty/Accomspec.php [ 188 ] in file:line
2015-01-29 18:29:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-29 18:32:31 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Controller/Faculty/Accomspec.php [ 188 ] in file:line
2015-01-29 18:32:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-29 18:33:06 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Controller/Faculty/Accomspec.php [ 188 ] in file:line
2015-01-29 18:33:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-01-29 23:19:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:19:56 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:20:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:20:49 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:22:45 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:22:45 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:22:52 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:22:52 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:34:20 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:34:20 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:42:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-01-29 23:42:49 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-01 13:30:11 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 336 ] in file:line
2015-04-01 13:30:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-01 09:54:45 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AND type = 'pub'' at line 1 [ SELECT * FROM connect_accomtbl WHERE accom_ID IN () AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-04-01 09:54:45 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM c...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(352): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(264): Model_Accom->get_accoms(Array, 'pub')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(114): Controller_Faculty_Accom->consolidate_accoms()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-04-01 09:56:32 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AND type = 'pub'' at line 1 [ SELECT * FROM connect_accomtbl WHERE accom_ID IN () AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-04-01 09:56:32 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM c...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(352): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(264): Model_Accom->get_accoms(Array, 'pub')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(114): Controller_Faculty_Accom->consolidate_accoms()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-04-01 10:04:52 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH/classes/Model/Accom.php [ 21 ] in file:line
2015-04-01 10:04:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-04-01 20:17:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr ~ APPPATH/views/faculty/opcr/view/faculty.php [ 17 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:17
2015-04-01 20:17:42 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 17, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(341): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(112): Controller_Faculty_Opcr->show_pdf(Array)
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/view/faculty.php:17
2015-04-01 22:25:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr_college ~ APPPATH/views/faculty/opcr/list/college.php [ 34 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:34
2015-04-01 22:25:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(34): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 34, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(169): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, Array, 'faculty/opcr_co...')
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:34
2015-04-01 22:28:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr_college ~ APPPATH/views/faculty/opcr/list/college.php [ 34 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:34
2015-04-01 22:28:53 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(34): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 34, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(168): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, 'faculty/opcr_co...')
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:34
2015-04-01 22:29:24 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/faculty/opcr/list/college.php [ 43 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:43
2015-04-01 22:29:24 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(43): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/jenny/Si...', 43, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(168): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, 'faculty/opcr_co...')
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:43
2015-04-01 22:35:19 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/faculty/opcr/list/college.php [ 52 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:52
2015-04-01 22:35:19 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(52): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/jenny/Si...', 52, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(165): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, 'faculty/opcr_co...')
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:52
2015-04-01 22:46:00 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: college ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 30 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:30
2015-04-01 22:46:00 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(30): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 30, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_coll()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:30
2015-04-01 22:46:20 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: department ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 14 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:14
2015-04-01 22:46:20 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 14, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_dept()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:14
2015-04-01 22:46:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: department ~ APPPATH/classes/Controller/Faculty/Ipcrgroup.php [ 14 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:14
2015-04-01 22:46:40 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 14, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_dept()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php:14
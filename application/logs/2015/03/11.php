<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-11 17:20:25 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: college ~ APPPATH/classes/Controller/Faculty/Opcrgroup.php [ 18 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php:18
2015-03-11 17:20:25 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 18, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php:18
2015-03-11 20:51:19 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/opcr/list/group could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-11 20:51:19 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/opcr/li...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/opcr/li...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(160): Kohana_View::factory('faculty/opcr/li...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, Array, 'faculty/opcr_co...')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-11 13:24:42 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AND type = 'pub'' at line 1 [ SELECT * FROM connect_accomtbl WHERE accom_ID IN () AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-11 13:24:42 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM c...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(352): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(114): Model_Accom->get_accoms(Array, 'pub')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf(Array, 'accom', 'consolidate')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-11 21:26:46 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/opcr/list/group could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-11 21:26:46 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/opcr/li...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/opcr/li...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(160): Kohana_View::factory('faculty/opcr/li...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, Array, 'faculty/opcr_co...')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-11 21:27:25 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/views/faculty/opcr/list/college.php [ 72 ] in file:line
2015-03-11 21:27:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 21:29:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: college ~ APPPATH/views/faculty/opcr/list/college.php [ 7 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:7
2015-03-11 21:29:06 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(7): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 7, Array)
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
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:7
2015-03-11 21:36:01 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/opcr/form/modals/consolidate could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-11 21:36:01 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/opcr/fo...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/opcr/fo...', NULL)
#2 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(18): Kohana_View::factory('faculty/opcr/fo...')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#9 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(169): Kohana_View->render()
#10 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcrgroup.php(18): Controller_Faculty_OpcrGroup->view_group('College of Scie...', Array, Array, 'faculty/opcr_co...')
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_OpcrGroup->action_coll()
#12 [internal function]: Kohana_Controller->execute()
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_OpcrGroup))
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#17 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-11 13:39:10 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AND type = 'pub'' at line 1 [ SELECT * FROM connect_accomtbl WHERE accom_ID IN () AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-11 13:39:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM c...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(352): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(114): Model_Accom->get_accoms(Array, 'pub')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf(Array, 'accom', 'consolidate')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-11 14:21:49 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on string ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 290 ] in file:line
2015-03-11 14:21:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 14:21:53 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on string ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 290 ] in file:line
2015-03-11 14:21:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 14:22:10 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function format() on string ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 290 ] in file:line
2015-03-11 14:22:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 22:57:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: accom ~ APPPATH/views/faculty/opcr/list/faculty.php [ 80 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php:80
2015-03-11 22:57:40 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php(80): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 80, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(25): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/faculty.php:80
2015-03-11 16:15:32 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/views/mpdf/accom/fragments/material.php [ 3 ] in file:line
2015-03-11 16:15:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 17:02:25 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 4 for Controller_Faculty_Mpdf::pdf_download(), called in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php on line 311 and defined ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 57 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php:57
2015-03-11 17:02:25 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(57): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/jenny/Si...', 57, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(311): Controller_Faculty_Mpdf->pdf_download('<h1 class="text...', '123400001011504...', 55)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(24): Controller_Faculty_Mpdf->opcr_pdf('1', 'opcr', 'download')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php:57
2015-03-11 17:10:56 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get_university() on null ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 12 ] in file:line
2015-03-11 17:10:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 17:12:35 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function reuser() ~ APPPATH/views/mpdf/accom/fragments/material.php [ 15 ] in file:line
2015-03-11 17:12:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 17:48:21 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/views/mpdf/opcr/template.php [ 5 ] in file:line
2015-03-11 17:48:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 17:51:41 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method View::bin() ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 293 ] in file:line
2015-03-11 17:51:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-11 17:52:17 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 292 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php:292
2015-03-11 17:52:17 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(292): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/jenny/Si...', 292, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('1', 'opcr', 'download', Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php:292
<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-14 03:25:57 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1 [ SELECT * FROM ipcr_targettbl WHERE output_ID IN () ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 03:25:57 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM i...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(188): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(286): Model_Ipcr->get_output_targets(Array)
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 03:33:58 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/Ipcr.php [ 181 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:181
2015-03-14 03:33:58 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(181): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Users/jenny/Si...', 181, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(286): Model_Ipcr->get_output_targets(NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'preview', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:181
2015-03-14 03:40:04 --- EMERGENCY: View_Exception [ 0 ]: The requested view /mpdf/opcr/basic.php could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:04 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('/mpdf/opcr/basi...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('/mpdf/opcr/basi...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(301): Kohana_View::factory('/mpdf/opcr/basi...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:15 --- EMERGENCY: View_Exception [ 0 ]: The requested view mpdf/opcr/basic.php could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:15 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('mpdf/opcr/basic...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('mpdf/opcr/basic...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(301): Kohana_View::factory('mpdf/opcr/basic...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:16 --- EMERGENCY: View_Exception [ 0 ]: The requested view mpdf/opcr/basic.php could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:16 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('mpdf/opcr/basic...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('mpdf/opcr/basic...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(301): Kohana_View::factory('mpdf/opcr/basic...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:20 --- EMERGENCY: View_Exception [ 0 ]: The requested view mpdf/opcr/basic.php could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 03:40:20 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('mpdf/opcr/basic...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('mpdf/opcr/basic...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(301): Kohana_View::factory('mpdf/opcr/basic...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 05:25:05 --- EMERGENCY: ErrorException [ 2 ]: fopen(): Filename cannot be empty ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-14 05:25:05 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(): Filena...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(106): mPDF->Output(NULL, 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(338): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', NULL, 25, NULL)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'submit', Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-14 05:25:11 --- EMERGENCY: ErrorException [ 2 ]: fopen(): Filename cannot be empty ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-14 05:25:11 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(): Filena...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(106): mPDF->Output(NULL, 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(338): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', NULL, 25, NULL)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'submit', Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-14 05:28:39 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/docmument_opcr/12340000801150415.pdf): failed to open stream: No such file or directory ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-14 05:28:39 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(106): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(341): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...', 25, NULL)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(30): Controller_Faculty_Mpdf->opcr_pdf('2', 'opcr', 'submit', Array)
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-14 15:19:32 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_category_outputs() ~ APPPATH/classes/Controller/Ajax.php [ 414 ] in file:line
2015-03-14 15:19:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-14 15:23:02 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 351 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:351
2015-03-14 15:23:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(351): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/jenny/Si...', 351, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(111): Controller_Faculty_Ipcr->show_draft()
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:351
2015-03-14 16:34:35 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'strtotime' (T_STRING) ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 326 ] in file:line
2015-03-14 16:34:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-14 18:01:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:01:32 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:41:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr_details ~ APPPATH/views/faculty/ipcr/view/faculty.php [ 20 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/faculty.php:20
2015-03-14 18:41:59 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/faculty.php(20): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 20, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(302): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(80): Controller_Faculty_Ipcr->show_pdf(Array, Array)
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/faculty.php:20
2015-03-14 10:43:54 --- EMERGENCY: View_Exception [ 0 ]: The requested view mpdf/ipcr/header.php could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 10:43:54 --- DEBUG: #0 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(137): Kohana_View->set_filename('mpdf/ipcr/heade...')
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(30): Kohana_View->__construct('mpdf/ipcr/heade...', NULL)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(218): Kohana_View::factory('mpdf/ipcr/heade...')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(26): Controller_Faculty_Mpdf->ipcr_pdf('1', 'ipcr', 'preview', Array)
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php:137
2015-03-14 10:44:12 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 219 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php:219
2015-03-14 10:44:12 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(219): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/jenny/Si...', 219, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(26): Controller_Faculty_Mpdf->ipcr_pdf('1', 'ipcr', 'preview', Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php:219
2015-03-14 18:44:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:44:35 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:46:37 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:46:37 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:55:28 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:55:28 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 18:56:01 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: draft ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 79 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:79
2015-03-14 18:56:01 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(79): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 79, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:79
2015-03-14 19:04:32 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:04:32 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:10:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:10:24 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:10:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:10:43 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:16:15 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:16:15 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:29:33 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:29:33 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:29:51 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:29:51 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:30:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:30:22 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:36:45 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:36:45 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:12 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:12 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:14 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:15 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:15 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:17 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:17 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:25 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Ipcr.php [ 59 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 19:39:25 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(59): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 59, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(69): Model_Ipcr->get_details(NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php:59
2015-03-14 21:20:51 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`oamsdb`.`ipcr_targettbl`, CONSTRAINT `ipcr_targettbl_ibfk_2` FOREIGN KEY (`ipcr_ID`) REFERENCES `ipcrtbl` (`ipcr_ID`)) [ DELETE FROM ipcrtbl WHERE ipcr_ID = '1' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 21:20:51 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(4, 'DELETE FROM ipc...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(138): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(129): Model_Ipcr->delete('1')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 21:25:32 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/views/faculty/ipcr/form/modals/output.php [ 15 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/output.php:15
2015-03-14 21:25:32 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/output.php(15): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 15, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/initial/template.php(35): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(351): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(45): Controller_Faculty_Ipcr->show_draft(Array)
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/output.php:15
2015-03-14 21:26:47 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/views/faculty/ipcr/form/modals/output.php [ 15 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/output.php:15
2015-03-14 21:26:47 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/output.php(15): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 15, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/initial/template.php(37): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(351): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(51): Controller_Faculty_Ipcr->show_draft(Array)
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/output.php:15
2015-03-14 21:27:55 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'opcr_ID' cannot be null [ INSERT INTO ipcrtbl (opcr_ID, user_ID) VALUES (NULL, '12') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 21:27:55 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO ipc...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(92): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(40): Model_Ipcr->initialize(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 21:28:17 --- EMERGENCY: Database_Exception [ 23000 ]: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'opcr_ID' cannot be null [ INSERT INTO ipcrtbl (opcr_ID, user_ID) VALUES (NULL, '12') ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 21:28:17 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(2, 'INSERT INTO ipc...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Ipcr.php(92): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(40): Model_Ipcr->initialize(Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-03-14 13:29:48 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::submit() ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 277 ] in file:line
2015-03-14 13:29:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-14 13:32:35 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::submit() ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 277 ] in file:line
2015-03-14 13:32:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-14 13:32:40 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::submit() ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 277 ] in file:line
2015-03-14 13:32:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-14 13:32:45 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::submit() ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 277 ] in file:line
2015-03-14 13:32:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
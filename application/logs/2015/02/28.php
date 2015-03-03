<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-28 10:35:53 --- EMERGENCY: Database_Exception [ 2002 ]: SQLSTATE[HY000] [2002] No such file or directory ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
2015-02-28 10:35:53 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
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
2015-02-28 02:59:46 --- EMERGENCY: ErrorException [ 2 ]: imagecreatefromstring(): No PNG support in this PHP build ~ APPPATH/assets/lib/mpdf/mpdf.php [ 9874 ] in file:line
2015-02-28 02:59:46 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'imagecreatefrom...', '/Users/jenny/Si...', 9874, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(9874): imagecreatefromstring('\x89PNG\r\n\x1A\n\x00\x00\x00\rIHD...')
#2 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(16777): mPDF->_getImage('http://jmgalino...', true, true, '/up-oams/applic...')
#3 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(13347): mPDF->OpenTag('IMG', Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(84): mPDF->WriteHTML('<p class="text-...')
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(146): Controller_Faculty_Mpdf->pdf_save('<p class="text-...', '/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('10', 'accom', 'preview')
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2015-02-28 03:02:22 --- EMERGENCY: ErrorException [ 2 ]: imagecreatefromstring(): No PNG support in this PHP build ~ APPPATH/assets/lib/mpdf/mpdf.php [ 9874 ] in file:line
2015-02-28 03:02:22 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'imagecreatefrom...', '/Users/jenny/Si...', 9874, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(9874): imagecreatefromstring('\x89PNG\r\n\x1A\n\x00\x00\x00\rIHD...')
#2 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(16777): mPDF->_getImage('http://jmgalino...', true, true, '/up-oams/applic...')
#3 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(13347): mPDF->OpenTag('IMG', Array)
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(84): mPDF->WriteHTML('<p class="text-...')
#5 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(146): Controller_Faculty_Mpdf->pdf_save('<p class="text-...', '/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('10', 'accom', 'preview')
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2015-02-28 03:02:48 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/tmp/1234000300215.pdf): failed to open stream: No such file or directory ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-02-28 03:02:48 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(85): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(146): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('10', 'accom', 'preview')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-02-28 03:03:01 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/tmp/1234000300215.pdf): failed to open stream: No such file or directory ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-02-28 03:03:01 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(85): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(146): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('10', 'accom', 'preview')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-02-28 03:04:36 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/tmp/1234000300215.pdf): failed to open stream: Permission denied ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-02-28 03:04:36 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(85): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(146): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('10', 'accom', 'preview')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-02-28 20:22:37 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$college_details' (T_VARIABLE) ~ APPPATH/classes/Controller/Faculty/Accom.php [ 238 ] in file:line
2015-02-28 20:22:37 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-28 12:34:03 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function execute() on array ~ APPPATH/classes/Controller/Faculty/Accom.php [ 241 ] in file:line
2015-02-28 12:34:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
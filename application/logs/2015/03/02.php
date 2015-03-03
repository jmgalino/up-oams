<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-02 09:51:59 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/document_accom/1234000010415.pdf): failed to open stream: Permission denied ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-02 09:51:59 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(91): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(170): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('8', 'accom', 'submit')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-02 09:53:28 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/document_accom/1234000010415.pdf): failed to open stream: Permission denied ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-02 09:53:28 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(91): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(170): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('8', 'accom', 'submit')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-02 09:54:06 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/document_accom/1234000010415.pdf): failed to open stream: Permission denied ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-02 09:54:06 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(91): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(170): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('8', 'accom', 'submit')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-02 09:54:16 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/document_accom/1234000010415.pdf): failed to open stream: Permission denied ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-02 09:54:16 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(91): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(170): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('8', 'accom', 'submit')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-02 12:03:20 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on null ~ APPPATH/views/mpdf/defaults/header.php [ 8 ] in file:line
2015-03-02 12:03:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-02 12:04:13 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on null ~ APPPATH/views/mpdf/defaults/header.php [ 8 ] in file:line
2015-03-02 12:04:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-02 12:04:58 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on null ~ APPPATH/views/mpdf/defaults/header.php [ 8 ] in file:line
2015-03-02 12:04:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
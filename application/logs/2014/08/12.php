<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-12 00:29:49 --- EMERGENCY: View_Exception [ 0 ]: The requested view faculty/opcr/form/intial/fragment could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-12 00:29:49 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(137): Kohana_View->set_filename('faculty/opcr/fo...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(30): Kohana_View->__construct('faculty/opcr/fo...', NULL)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/faculty/opcr/form/initial/template.php(43): Kohana_View::factory('faculty/opcr/fo...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(22): Kohana_View->__toString()
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Opcr.php(157): Kohana_View->render()
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Opcr.php(68): Controller_Faculty_Opcr->action_draft()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_update()
#12 [internal function]: Kohana_Controller->execute()
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#17 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php:137
2014-08-12 09:03:07 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/views/mpdf/opcr/basic.php [ 36 ] in file:line
2014-08-12 09:03:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-12 09:22:57 --- EMERGENCY: ErrorException [ 1 ]: Call to private method Controller_User::action_delete_session() from context 'Controller_Faculty_Accom' ~ APPPATH/classes/Controller/Faculty/Accom.php [ 13 ] in file:line
2014-08-12 09:22:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-12 10:47:32 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/views/mpdf/opcr/template.php [ 6 ] in file:line
2014-08-12 10:47:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-12 10:59:04 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH/classes/Model/Opcr.php [ 128 ] in file:line
2014-08-12 10:59:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-12 10:59:15 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: accom_details ~ APPPATH/classes/Controller/Faculty/Opcr.php [ 64 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Opcr.php:64
2014-08-12 10:59:15 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Opcr.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 64, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_preview()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Opcr.php:64
2014-08-12 11:29:46 --- EMERGENCY: ErrorException [ 2 ]: include_once(/Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/mpdf/accom/template.php): failed to open stream: No such file or directory ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 168 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php:168
2014-08-12 11:29:46 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php(168): Kohana_Core::error_handler(2, 'include_once(/A...', '/Applications/X...', 168, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php(168): Controller_Faculty_Mpdf::action_opcr()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php(24): Controller_Faculty_Mpdf->action_opcr('1', 'opcr', 'submit')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php:168
2014-08-12 14:26:17 --- EMERGENCY: ErrorException [ 4096 ]: Object of class mPDF could not be converted to string ~ APPPATH/assets/lib/mpdf/mpdf.php [ 12847 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/assets/lib/mpdf/mpdf.php:12847
2014-08-12 14:26:17 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/assets/lib/mpdf/mpdf.php(12847): Kohana_Core::error_handler(4096, 'Object of class...', '/Applications/X...', 12847, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php(57): mPDF->WriteHTML(Object(mPDF), 1)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php(162): Controller_Faculty_Mpdf->action_submit('<h1 class="text...', '/Applications/X...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Faculty/Mpdf.php(24): Controller_Faculty_Mpdf->action_opcr('1', 'opcr', 'submit')
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#10 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/assets/lib/mpdf/mpdf.php:12847
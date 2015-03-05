<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-05 11:02:47 --- EMERGENCY: Database_Exception [ 2002 ]: SQLSTATE[HY000] [2002] No such file or directory ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php:242
2015-03-05 11:02:47 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
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
2015-03-05 08:24:24 --- EMERGENCY: ErrorException [ 2 ]: fopen(/Users/jenny/Sites/up-oams/files/document_accom/1234000000114.pdf): failed to open stream: Permission denied ~ APPPATH/assets/lib/mpdf/mpdf.php [ 7501 ] in file:line
2015-03-05 08:24:24 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'fopen(/Users/je...', '/Users/jenny/Si...', 7501, Array)
#1 /Users/jenny/Sites/up-oams/application/assets/lib/mpdf/mpdf.php(7501): fopen('/Users/jenny/Si...', 'wb')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(103): mPDF->Output('/Users/jenny/Si...', 'F')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(182): Controller_Faculty_Mpdf->pdf_save('<h1 class="text...', '/Users/jenny/Si...')
#4 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf('1', 'accom', 'submit')
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2015-03-05 16:36:22 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 333 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:333
2015-03-05 16:36:22 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(333): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 333, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(336): Model_Accom->get_accom_details('14', '2', 'mat')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:333
2015-03-05 16:38:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 333 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:333
2015-03-05 16:38:49 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(333): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 333, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(336): Model_Accom->get_accom_details('14', '2', 'mat')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:333
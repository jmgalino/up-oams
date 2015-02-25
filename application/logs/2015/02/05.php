<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-05 00:45:28 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-02-05 00:45:28 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-02-05 00:46:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/Accom.php [ 272 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-02-05 00:46:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(272): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 272, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(325): Model_Accom->get_accom_details(NULL, NULL, 'rch')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_accom_details()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:272
2015-02-05 08:04:53 --- EMERGENCY: ErrorException [ 4 ]: parse error, expecting `'('' ~ APPPATH/classes/Model/Accom.php [ 458 ] in file:line
2015-02-05 08:04:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-05 08:08:04 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/classes/Model/Accom.php [ 465 ] in file:line
2015-02-05 08:08:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-05 10:39:24 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/upload_photos/hkwb0ddz9rwrux5ujaioGastone.jpg): No such file or directory ~ APPPATH/classes/Controller/Admin/Profile.php [ 172 ] in file:line
2015-02-05 10:39:24 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 172, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(172): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_upload()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2015-02-05 10:53:06 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Faculty/Opcr.php [ 64 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:64
2015-02-05 10:53:06 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php(64): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 64, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Opcr->action_new()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Opcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Opcr.php:64
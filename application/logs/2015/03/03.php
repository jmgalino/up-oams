<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-03 01:19:43 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH/classes/Controller/Faculty/Accom.php [ 74 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php:74
2015-03-03 01:19:43 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(74): Kohana_Core::error_handler(2048, 'Only variables ...', '/Users/jenny/Si...', 74, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_all()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php:74
2015-03-03 01:25:29 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:25:29 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:25:53 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:25:53 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:25:54 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:25:54 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:26:07 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:26:07 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:26:37 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:26:37 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:28:16 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:28:16 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:29:02 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:29:02 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:29:03 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:29:03 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:29:04 --- EMERGENCY: ErrorException [ 2 ]: unlink(/Users/jenny/Sites/up-oams/files/document_accom/): Operation not permitted ~ APPPATH/classes/Model/Accom.php [ 258 ] in file:line
2015-03-03 01:29:04 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(/Users/j...', '/Users/jenny/Si...', 258, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(258): unlink('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accom.php(196): Model_Accom->delete('10')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Accom->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Accom))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2015-03-03 01:47:08 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get_university() on null ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 206 ] in file:line
2015-03-03 01:47:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
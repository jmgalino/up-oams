<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-31 05:54:26 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$this' (T_VARIABLE) ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 343 ] in file:line
2015-03-31 05:54:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-31 05:56:11 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '$this' (T_VARIABLE) ~ APPPATH/classes/Controller/Faculty/Mpdf.php [ 343 ] in file:line
2015-03-31 05:56:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-31 10:02:08 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: draft ~ APPPATH/views/faculty/ipcr/view/faculty.php [ 10 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/faculty.php:10
2015-03-31 10:02:08 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/faculty.php(10): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 10, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(281): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(88): Controller_Faculty_Ipcr->show_pdf(Array, Array)
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_preview()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/view/faculty.php:10
2015-03-31 21:55:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: opcr_college ~ APPPATH/views/faculty/opcr/list/college.php [ 34 ] in /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php:34
2015-03-31 21:55:42 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/opcr/list/college.php(34): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 34, Array)
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
<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-24 12:04:24 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: result ~ APPPATH/classes/Model/Accom.php [ 579 ] in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:579
2015-03-24 12:04:24 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(579): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 579, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(491): Model_Accom->check_accom_exist('material_ID', 'mat', Array)
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Accomspec.php(125): Model_Accom->update_accom('11', '26', Array, 'mat', 'material_ID')
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_AccomSpec->action_edit()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_AccomSpec))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php:579
2015-03-24 14:36:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: period_from ~ APPPATH/views/faculty/ipcr/form/modals/consolidate.php [ 19 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/consolidate.php:19
2015-03-24 14:36:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/consolidate.php(19): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 19, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/list/group.php(23): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(186): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(34): Controller_Faculty_IpcrGroup->view_group('College of Scie...', Array, 'faculty/ipcr_co...')
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_coll()
#14 [internal function]: Kohana_Controller->execute()
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#18 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#19 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/form/modals/consolidate.php:19
2015-03-24 14:36:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: period_from ~ APPPATH/views/faculty/ipcr/list/group.php [ 48 ] in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/list/group.php:48
2015-03-24 14:36:11 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/list/group.php(48): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 48, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(186): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcrgroup.php(34): Controller_Faculty_IpcrGroup->view_group('College of Scie...', Array, 'faculty/ipcr_co...')
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_IpcrGroup->action_coll()
#10 [internal function]: Kohana_Controller->execute()
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_IpcrGroup))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#15 {main} in /Users/jenny/Sites/up-oams/application/views/faculty/ipcr/list/group.php:48
2015-03-24 14:44:08 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 14:44:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-24 15:14:21 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 15:14:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-24 15:14:25 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 15:14:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-24 15:24:24 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 247 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:247
2015-03-24 15:24:24 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(247): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 247, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:247
2015-03-24 15:24:46 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 15:24:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-24 15:24:54 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 247 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:247
2015-03-24 15:24:54 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(247): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 247, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:247
2015-03-24 15:25:02 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 15:25:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-24 15:30:15 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 15:30:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-03-24 15:30:37 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 247 ] in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:247
2015-03-24 15:30:37 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php(247): Kohana_Core::error_handler(8, 'Array to string...', '/Users/jenny/Si...', 247, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Ipcr->action_edit()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Ipcr))
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Ipcr.php:247
2015-03-24 15:30:59 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Ipcr::get_target_details() ~ APPPATH/classes/Controller/Faculty/Ipcr.php [ 251 ] in file:line
2015-03-24 15:30:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
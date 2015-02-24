<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-23 15:44:11 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/views/admin/profile/education.php [ 27 ] in file:line
2015-02-23 15:44:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-23 15:45:01 --- EMERGENCY: ErrorException [ 4 ]: parse error ~ APPPATH/views/admin/profile/education.php [ 27 ] in file:line
2015-02-23 15:45:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-23 15:46:12 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: education_ID ~ APPPATH/views/admin/profile/education.php [ 27 ] in /Users/jenny/Sites/up-oams/application/views/admin/profile/education.php:27
2015-02-23 15:46:12 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/admin/profile/education.php(27): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 27, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/admin/profile/fragment.php(67): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/admin/profile/template.php(71): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#13 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#15 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(146): Kohana_View->render()
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_view()
#17 [internal function]: Kohana_Controller->execute()
#18 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#19 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#20 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#21 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#22 {main} in /Users/jenny/Sites/up-oams/application/views/admin/profile/education.php:27
2015-02-23 16:11:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/User.php [ 190 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:190
2015-02-23 16:11:09 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(190): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 190, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Ajax.php(84): Model_User->get_education(NULL, NULL)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_educ()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:190
2015-02-23 16:22:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: user_ID ~ APPPATH/classes/Model/User.php [ 214 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:214
2015-02-23 16:22:50 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(214): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/jenny/Si...', 214, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(218): Model_User->update_education(Array)
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_update_educ()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:214
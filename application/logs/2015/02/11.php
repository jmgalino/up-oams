<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-11 11:02:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: name ~ APPPATH/views/profile/myprofile/accomplishments.php [ 261 ] in /Users/jenny/Sites/up-oams/application/views/profile/myprofile/accomplishments.php:261
2015-02-11 11:02:41 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/profile/myprofile/accomplishments.php(261): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 261, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/profile/myprofile/template.php(103): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#9 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#11 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(171): Kohana_View->render()
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_User->action_myprofile()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty))
#15 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#17 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#18 {main} in /Users/jenny/Sites/up-oams/application/views/profile/myprofile/accomplishments.php:261
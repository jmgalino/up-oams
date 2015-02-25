<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-10 17:04:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: identifier ~ APPPATH/views/profile/index.php [ 17 ] in /Users/jenny/Sites/up-oams/application/views/profile/index.php:17
2015-02-10 17:04:02 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/views/profile/index.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/jenny/Si...', 17, Array)
#1 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/jenny/Sites/up-oams/application/views/templates/template.php(26): Kohana_View->__toString()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(61): include('/Users/jenny/Si...')
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/jenny/Si...', Array)
#7 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(84): Kohana_View->render()
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_User->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#11 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/jenny/Sites/up-oams/application/views/profile/index.php:17
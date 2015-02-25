<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-25 10:05:27 --- EMERGENCY: ErrorException [ 2 ]: date() expects at least 1 parameter, 0 given ~ APPPATH/classes/Controller/User.php [ 262 ] in file:line
2015-02-25 10:05:27 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date() expects ...', '/Users/jenny/Si...', 262, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(262): date()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/User.php(79): Controller_User->check_announcements()
#3 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_User->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
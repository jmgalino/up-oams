<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-26 08:49:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH/classes/Model/User.php [ 46 ] in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:46
2015-02-26 08:49:46 --- DEBUG: #0 /Users/jenny/Sites/up-oams/application/classes/Model/User.php(46): Kohana_Core::error_handler(8, 'Undefined offse...', '/Users/jenny/Si...', 46, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Controller/Admin/Profile.php(76): Model_User->get_details(NULL, '51')
#2 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Admin_Profile->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Profile))
#5 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/jenny/Sites/up-oams/application/classes/Model/User.php:46
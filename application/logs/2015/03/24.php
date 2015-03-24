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
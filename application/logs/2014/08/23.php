<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-23 01:19:33 --- EMERGENCY: ErrorException [ 2 ]: unlink(cd4hwhskhpnbbcyttnkd.jpg): No such file or directory ~ APPPATH/classes/Controller/Uploader.php [ 35 ] in file:line
2014-08-23 01:19:33 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'unlink(cd4hwhsk...', '/Applications/X...', 35, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Uploader.php(35): unlink('cd4hwhskhpnbbcy...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Uploader->action_photo()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Uploader))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in file:line
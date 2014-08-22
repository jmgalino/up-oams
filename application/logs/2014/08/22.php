<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-22 13:48:41 --- EMERGENCY: Kohana_Exception [ 0 ]: Directory DOCROOT/uploads/ must be writable ~ SYSPATH/classes/Kohana/Upload.php [ 80 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:48
2014-08-22 13:48:41 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(48): Kohana_Upload::save(Array, NULL, '/Applications/X...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(21): Controller_Avatar->_save_image(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Avatar->action_upload()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Avatar))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:48
2014-08-22 13:49:47 --- EMERGENCY: Kohana_Exception [ 0 ]: Directory APPPATH/files/photos/ must be writable ~ SYSPATH/classes/Kohana/Upload.php [ 80 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:48
2014-08-22 13:49:47 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(48): Kohana_Upload::save(Array, NULL, '/Applications/X...')
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(21): Controller_Avatar->_save_image(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Avatar->action_upload()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Avatar))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:48
2014-08-22 14:04:49 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH/views/avatar/upload.php [ 11 ] in file:line
2014-08-22 14:04:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-22 14:52:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: img ~ APPPATH/classes/Controller/Avatar.php [ 52 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:52
2014-08-22 14:52:40 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(52): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 52, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(21): Controller_Avatar->_save_image(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Avatar->action_upload()
#3 [internal function]: Kohana_Controller->execute()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Avatar))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#8 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:52
2014-08-22 14:53:04 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH/views/avatar/upload.php [ 19 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/avatar/upload.php:19
2014-08-22 14:53:04 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/avatar/upload.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', '/Applications/X...', 19, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Response.php(160): Kohana_View->__toString()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(33): Kohana_Response->body(Object(View))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Avatar->action_upload()
#7 [internal function]: Kohana_Controller->execute()
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Avatar))
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#12 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/avatar/upload.php:19
2014-08-22 17:05:19 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ',' ~ APPPATH/views/admin/profile/fragment.php [ 3 ] in file:line
2014-08-22 17:05:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-08-22 18:33:57 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: avatar ~ APPPATH/classes/Controller/Avatar.php [ 21 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:21
2014-08-22 18:33:57 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php(21): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 21, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Avatar->action_upload()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Avatar))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Avatar.php:21
2014-08-22 23:38:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: pic ~ APPPATH/classes/Controller/Uploader.php [ 21 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Uploader.php:21
2014-08-22 23:38:26 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Uploader.php(21): Kohana_Core::error_handler(8, 'Undefined index...', '/Applications/X...', 21, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Uploader->action_photo()
#2 [internal function]: Kohana_Controller->execute()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Uploader))
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#7 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Uploader.php:21
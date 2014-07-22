<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-07-21 14:11:25 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Kohana_Form::submit(), called in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/user.php on line 106 and defined ~ SYSPATH/classes/Kohana/Form.php [ 354 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
2014-07-21 14:11:25 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php(354): Kohana_Core::error_handler(2, 'Missing argumen...', '/Applications/X...', 354, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/admin/user.php(106): Kohana_Form::submit(Array)
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#4 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(228): Kohana_View->render()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/views/templates/template.php(19): Kohana_View->__toString()
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(61): include('/Applications/X...')
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/View.php(348): Kohana_View::capture('/Applications/X...', Array)
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin.php(72): Kohana_View->render()
#9 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin->action_user()
#10 [internal function]: Kohana_Controller->execute()
#11 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#12 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#15 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Form.php:354
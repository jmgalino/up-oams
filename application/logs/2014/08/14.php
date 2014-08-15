<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-08-14 11:11:38 --- EMERGENCY: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'oamsystemdb.output_categorytbl' doesn't exist [ SELECT * FROM output_categorytbl ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
2014-08-14 11:11:38 --- DEBUG: #0 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM o...', false, Array)
#1 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Model/Oams.php(44): Kohana_Database_Query->execute()
#2 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/application/classes/Controller/Admin/Oams.php(14): Model_Oams->get_categories()
#3 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Controller.php(84): Controller_Admin_Oams->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Oams))
#6 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Applications/XAMPP/xamppfiles/htdocs/oamsystem/index.php(118): Kohana_Request->execute()
#9 {main} in /Applications/XAMPP/xamppfiles/htdocs/oamsystem/modules/database/classes/Kohana/Database/Query.php:251
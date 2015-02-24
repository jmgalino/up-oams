<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-04 23:35:10 --- EMERGENCY: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') AND type = 'pub'' at line 1 [ SELECT * FROM connect_accomtbl WHERE accom_ID IN () AND type = 'pub' ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
2015-02-04 23:35:10 --- DEBUG: #0 /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT * FROM c...', false, Array)
#1 /Users/jenny/Sites/up-oams/application/classes/Model/Accom.php(291): Kohana_Database_Query->execute()
#2 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(95): Model_Accom->get_accoms(Array, 'pub')
#3 /Users/jenny/Sites/up-oams/application/classes/Controller/Faculty/Mpdf.php(17): Controller_Faculty_Mpdf->accom_pdf(Array, 'accom', 'consolidate')
#4 /Users/jenny/Sites/up-oams/system/classes/Kohana/Controller.php(84): Controller_Faculty_Mpdf->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Faculty_Mpdf))
#7 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/jenny/Sites/up-oams/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/jenny/Sites/up-oams/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/jenny/Sites/up-oams/modules/database/classes/Kohana/Database/Query.php:251
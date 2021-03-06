<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('Asia/Manila');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

/**
 * Set the mb_substitute_character to "none"
 *
 * @link http://www.php.net/manual/function.mb-substitute-character.php
 */
mb_substitute_character('none');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

if (isset($_SERVER['SERVER_PROTOCOL']))
{
	// Replace the default protocol.
	HTTP::$protocol = $_SERVER['SERVER_PROTOCOL'];
}

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
	'base_url'   => '/up-oams/',
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database',   // Database access
	'image'      => MODPATH.'image',      // Image manipulation
	// 'minion'     => MODPATH.'minion',     // CLI Tasks
	// 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	));

/**
 * Cookie Salt
 * @see  http://kohanaframework.org/3.3/guide/kohana/cookies
 * 
 * If you have not defined a cookie salt in your Cookie class then
 * uncomment the line below and define a preferrably long salt.
 */
Cookie::$salt = 'university of the philippines mindanao college of science and mathematics department of mathematics physics and computer science';

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
/**
 * Routes for login/logout functions
 */
Route::set('session', '<action>',
	array(
		'action'	=> '(login|logout)'
	))
	->defaults(array(
		'controller'=> 'site'
	));

/**
 * Routes for common functions for all registered users
 */
Route::set('user-functions', '<controller>/<action>',
	array(
		'controller'=> '(admin|faculty)',
		'action'	=> '(index|error|announcements|myprofile|password|about|manual|)'
	))
	->defaults(array(
		'action'	=> 'index'
	));

/**
 * Routes for Faculty Users
 */
Route::set('faculty-functions', '<controller>/<action>(/<id>)',
	array(
		'controller'=> 'faculty',
		'action'	=> '(myprofile|update_myprofile|contact|check)'
	))
	->defaults(array(
		'action'	=> 'index'
	));
Route::set('special-faculty-functions', '<controller>/<action>/latest',
	array(
		'controller'=> 'faculty',
		'action'	=> 'opcr'
	));
Route::set('chair-functions', 'faculty/dept/<action>(/<type>)(/<id>)',
	array(
		'type'		=>	'(all|view|evaluate|consolidate|new|update|archived|archive|restore|delete)'
	))
	->defaults(array(
		'controller'=> 'chair'
	));
Route::set('dean-functions', 'faculty/coll/<action>(/<type>)(/<id>)',
	array(
		'type'		=>	'(all|view|evaluate|consolidate|new|update|archived|archive|restore|delete)'
	))
	->defaults(array(
		'controller'=> 'dean'
	));

// accom_spec
Route::set('accom_spec-functions', '<directory>/accom/<action>/<key>(/<id>)',
	array(
		'directory' => 'faculty',
		'action'	=> '(add|set|edit|remove)',
		'key'		=> '(pub|awd|rch|ppr|ctv|par|mat|oth)'
	))
	->defaults(array(
		'controller'=> 'accomspec'
	));

// accom
Route::set('accom-functions', '<directory>/<controller>(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		'controller'=> 'accom',
		'action'	=> '(all|new|preview|update|delete|submit)'
	))
	->defaults(array(
	    'action'     => 'index'
	));

// ipcr
Route::set('ipcr-functions', '<directory>/<controller>(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		'controller'=> 'ipcr',
		// 'action'	=> '(index|new|preview|update|delete|submit|rate|save|add|edit|remove)'
	))
	->defaults(array(
	    'action'     => 'index'
	));

// ipcr_dept
Route::set('icpr_dept-functions', '<directory>/ipcr_dept(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		'action'	=> '(dept|view|evaluate|consolidate)'
	))
	->defaults(array(
		'controller'=> 'ipcrgroup',
		'action'	=> 'dept'
	));

// ipcr_coll
Route::set('icpr_coll-functions', '<directory>/ipcr_coll(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		'action'	=> '(coll|view|evaluate|consolidate)'
	))
	->defaults(array(
		'controller'=> 'ipcrgroup',
		'action'	=> 'coll'
	));

// opcr
Route::set('opcr-functions', '<directory>/<controller>(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		'controller'=> 'opcr',
		'action'	=> '(new|preview|update|delete|publish|submit|download|consolidate|add|edit|remove)'
	))
	->defaults(array(
	    'action'     => 'index'
	));

// opcr_dept
Route::set('ocpr_dept-functions', '<directory>/opcr_dept',
	array(
		'directory' => 'faculty',
	))
	->defaults(array(
		'controller'=> 'opcrgroup',
		'action'	=> 'dept'
	));

// opcr_coll
Route::set('ocpr_coll-functions', '<directory>/opcr_coll(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		// 'action'	=> '(coll|view|evaluate|consolidate)'
	))
	->defaults(array(
		'controller'=> 'opcrgroup',
		'action'	=> 'coll'
	));

// mpdf
Route::set('mpdf', '<directory>/<controller>(/<purpose>)/<type>(/<id>)',
	array(
		'directory' => 'extras',
		'controller'=> 'mpdf',
		'purpose'	=> '(preview|download|consolidate|submit)'
		// 'action'	=> '(new|preview|update|delete|submit|download|consolidate|pdf|draft|check)'
	))
	->defaults(array(
		'action'	=> 'index'
	));

// cuma
Route::set('cuma-functions', '<directory>/<controller>(/<action>(/<id>))',
	array(
		'directory' => 'faculty',
		'action'	=> '(new|preview|update|delete|submit|draft|view)'
	))
	->defaults(array(
		'controller'=> 'cuma',
		'action'	=> 'index'
	));

/**
 * Routes for Admin Users
 */
Route::set('admin-functions', '<directory>/<controller>(/<action>(/<type>)(/<id>))',
	array(
		'directory' => 'admin',
		'controller'=> '(profile|university|app)',
		// 'action'	=> '(new|view|update|reset|delete)'
	))
	->defaults(array(
		'action'	=> 'index'
	));

Route::set('default', '(<directory>/)(<controller>(/<action>(/<id>)))',
	array(
		'directory' => '(extras|faculty)',
	))
	->defaults(array(
		'controller'=> 'site',
		'action'	=> 'index'
	));

<?php

/*
 | --------------------------------------------------------------------
 | Custom Constants
 | --------------------------------------------------------------------
 */

defined('APP_TITLE') || define('APP_TITLE', 'Price Monitor');

$environment = 'development';

if (isset($_SERVER['APP_ENV']) && !empty($_SERVER['APP_ENV'])) {
    $environment = $_SERVER['APP_ENV'];
}

if ($environment !== 'development') {
    /*
    | --------------------------------------------------------------------
    | PRODUCTION ENVIRONMENT
    | --------------------------------------------------------------------
    */

    defined('APP_URL') || define('APP_URL', $_SERVER['APP_URL']);

    // Database Credentials
    defined('DB_HOST') || define('DB_HOST', $_SERVER['DB_HOST']);
    defined('DB_USER') || define('DB_USER', $_SERVER['DB_USER']);
    defined('DB_PASS') || define('DB_PASS', $_SERVER['DB_PASS']);
    defined('DB_NAME') || define('DB_NAME', $_SERVER['DB_NAME']);

    // Disable error reporting
    error_reporting(0);
    ini_set('display_errors', '0');
} else {
    /*
    | --------------------------------------------------------------------
    | DEVELOPMENT ENVIRONMENT
    | --------------------------------------------------------------------
    */

    defined('APP_URL') || define('APP_URL', 'http://localhost:8080');

    // Database Credentials
    defined('DB_HOST') || define('DB_HOST', 'localhost');
    defined('DB_USER') || define('DB_USER', 'root');
    defined('DB_PASS') || define('DB_PASS', '');
    defined('DB_NAME') || define('DB_NAME', 'price_monitor');

    // Mercado Livre API Credentials
    defined('MERCADO_LIVRE_CLIENT_ID') || define('MERCADO_LIVRE_CLIENT_ID', '2526947363735751');
    defined('MERCADO_LIVRE_CLIENT_SECRET') || define('MERCADO_LIVRE_CLIENT_SECRET', 'EPy5WlzyQndCOIl1jlmjt5W1lHJLi4Ju');
    defined('MERCADO_LIVRE_REDIRECT_URI') || define('MERCADO_LIVRE_REDIRECT_URI', 'https://price-monitor.panteaodigital.com.br/show_code_callback.php');

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2_592_000);
defined('YEAR')   || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0);        // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1);          // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3);         // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4);   // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5);  // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7);     // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8);       // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9);      // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125);    // highest automatically-assigned error code

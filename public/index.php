<?PHP

use vendor\core\Router;
use app\Routes\Routs;

error_reporting(-1);

$query = trim($_SERVER['REQUEST_URI'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('VIEWS', dirname(__DIR__) . '/app/views/');

require '../vendor/libs/functions.php';
session_start();

spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?<action>[a-z-]+)?$');

Router::addRoutes(Routs::getRouts());

Router::dispatch($query);


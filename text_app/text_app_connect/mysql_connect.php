  <?php
class Config
{
    static $confArray;

    public static function read($name)
    {
        return self::$confArray[$name];
    }

    public static function write($name, $value)
    {
        self::$confArray[$name] = $value;
    }
}
	// setting up db. This is outside of the Config Class. Check to make sure this is ok
	Config::write('db.host', '127.0.0.1');
	Config::write('db.basename', 'text');
	Config::write('db.user', 'webuser');
	Config::write('db.password', 'password');


class Core
{
    public $dbh; // handle of the db connexion
    private static $instance;

    private function __construct()
    {
        // building data source name from config
        $dsn = 'mysql:dbname='. Config::read('db.basename') .
        	   ';host=' . Config::read('db.host');
        // getting DB user from config                
        $user = Config::read('db.user');
        // getting DB password from config                
        $password = Config::read('db.password');

        $this->dbh = new PDO($dsn, $user, $password);
    }

    public static function render($filename, $params = []) //used to render my php files pay attention params in index.php
    {
        extract($params);
        require_once($filename);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}
?>
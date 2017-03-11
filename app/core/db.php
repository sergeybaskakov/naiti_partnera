<?
class DB
{
    //Connection Db
    static function database(){
        try{
            $db = new PDO('mysql:host=localhost; dbname=atmosphere', 'atmosphere', 'admin2017_');
            $db->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $db;
    }
}

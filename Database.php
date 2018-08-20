<?php

namespace Library;

class Database
{
  /**
   * PDO Object
   *
   * @var PDO
   */
  private $_PDO = null;

  /**
   * Database instance
   */
  private static $_instance;

  const SQL_USER = 'root';
  const SQL_SERVER = 'localhost';
  const SQL_PASSWORD = '';

  const DATABASE = '';

  /**
   * Construct
   *
   * @param void
   * @return void
   * @see PDO::__construct()
   * @access private
   */
  private function __construct()
  {
    try{
      $this->$_PDO = new \PDO('mysql:dbname='.self::DATABASE.';host='.self::SQL_SERVER,self::SQL_USER ,self::SQL_PASSWORD);
    }
    catch(\PDOException $e){
      echo 'Une erreur est survenue :'.$e->getMessage();
      die();
    }
  }

   /**
    * Create and give back Database Instance
    *
    * @access public
    * @static
    * @param void
    * @return PDO $_PDO
    */
  public static function getInstance()
  {
    if(is_null(self::$instance))
    {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  /**
   * Query - execute PDO query() method
   * @return PDOStatement
   */
  public function query($sql){
    return $this->_PDO->query($sql);
  }
}

<?php
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          self::$instance = new PDO('pgsql:host=ec2-107-21-216-112.compute-1.amazonaws.com;port=5432;dbname=d396l04psi4ibi', 'kbvppscldudvyk', '6b64aa00495e1869a781f324a4737159780da354a3cf8e8da84f9d84d44822a3');
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}
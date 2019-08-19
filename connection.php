<?php
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          self::$instance = new PDO('pgsql:host=ec2-23-21-91-183.compute-1.amazonaws.com;port=5432;dbname=d2v77k5qgq18kr', 'uunpzfggvhxbiu', '37cb35d0943314f0209129239277b2899225c0cc31f7f00f7f27f4e361426c05');
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}
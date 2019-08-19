<?php
class Product
{
  public $id;
  public $name;
  public $img;
  public $quantity;
  public $cost;

  function __construct($id, $name, $img, $quantity, $cost)
  {
    $this->id = $id;
    $this->name = $name;
    $this->img = $img;
    $this->quantity = $quantity;
    $this->cost = $cost;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM ts_products ORDER BY \"ProductID\" ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Product($item['ProductID'], $item['ProductName'], $item['ProductImage'], $item['ProductQuantity'], $item['ProductCost']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM ts_products WHERE \"ProductID\" = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['ProductID'])) {
      return new Product($item['ProductID'], $item['ProductName'], $item['ProductImage'], $item['ProductQuantity'], $item['ProductCost']);
    }
    return new Product(NULL,NULL,NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM ts_products WHERE \"ProductID\" = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $img, $quantity, $cost)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO ts_products(\"ProductName\", \"ProductImage\", \"ProductQuantity\", \"ProductCost\")  VALUES (:name, :img, :quantity, :cost);");
    $req->bindValue(':name',$name);
    $req->bindValue(':img',$img);
    $req->bindValue(':quantity',$quantity);
    $req->bindValue(':cost',$cost);
    $req->execute();
  }
  static function update($id,$name, $img, $quantity, $cost)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE ts_products SET
                        \"ProductName\" = :name,
                        \"ProductImage\" = :img,
                        \"ProductQuantity\" = :quantity,
                        \"ProductCost\" = :cost
                        WHERE \"ProductID\" = :id;");
    $req->bindValue(':name',$name);
    $req->bindValue(':img',$img);
    $req->bindValue(':quantity',$quantity);
    $req->bindValue(':cost',$cost);
    $req->bindValue(':id',$id);
    $req->execute();
  }
}
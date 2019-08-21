<?php
class Supplier
{
  public $id;
  public $name;
  public $description;
  public $numberProduct;

  function __construct($id, $name, $description, $numberProduct = NULL)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->numberProduct = $numberProduct;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT ts_suppliers.*, COUNT(ts_products.\"ProductID\") AS number_of_product
                      FROM ts_suppliers LEFT JOIN ts_products
                      ON ts_suppliers.\"SupplierID\" = ts_products.\"SupplierID\"
                      GROUP BY ts_suppliers.\"SupplierID\"
                      ORDER BY ts_suppliers.\"SupplierID\" ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Supplier($item['SupplierID'], $item['SupplierName'], $item['Description'], $item['number_of_product']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM ts_suppliers WHERE \"SupplierID\" = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['SupplierID'])) {
      return new Supplier($item['SupplierID'], $item['SupplierName'], $item['Description']);
    }
    return new Supplier(NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM ts_suppliers WHERE \"SupplierID\" = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO ts_suppliers(\"SupplierName\", \"Description\")  VALUES (:name, :description);");
    $req->bindValue(':name',$name);
    $req->bindValue(':description',$description);
    $req->execute();
  }
  static function update($id,$name, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE ts_suppliers SET
                        \"SupplierName\" = :name,
                        \"Description\" = :description
                        WHERE \"SupplierID\" = :id;");
    $req->bindValue(':name',$name);
    $req->bindValue(':description',$description);
    $req->bindValue(':id',$id);
    $req->execute();
  }
}
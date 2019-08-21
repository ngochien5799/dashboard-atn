<?php
class Category
{
  public $id;
  public $name;
  public $description;

  function __construct($id, $name, $description)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query("SELECT * FROM ts_categories ORDER BY \"CategoryID\" ASC;");

    foreach ($req->fetchAll() as $item) {
      $list[] = new Category($item['CategoryID'], $item['CategoryName'], $item['description']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("SELECT * FROM ts_categories WHERE \"CategoryID\" = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
    $item = $req->fetch();
    if (isset($item['CategoryID'])) {
      return new Category($item['CategoryID'], $item['CategoryName'], $item['description']);
    }
    return new Category(NULL,NULL,NULL);
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare("DELETE FROM ts_categories WHERE \"CategoryID\" = :id;");
    $req->bindValue(':id',$id);
    $req->execute();
  }
  static function add($name, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare("INSERT INTO ts_categories(\"CategoryName\", \"description\")  VALUES (:name, :description);");
    $req->bindValue(':name',$name);
    $req->bindValue(':description',$description);
    $req->execute();
  }
  static function update($id,$name, $description)
  {
    $db = DB::getInstance();
    $req = $db->prepare("UPDATE ts_categories SET
                        \"CategoryName\" = :name,
                        \"description\" = :description
                        WHERE \"CategoryID\" = :id;");
    $req->bindValue(':name',$name);
    $req->bindValue(':description',$description);
    $req->bindValue(':id',$id);
    $req->execute();
  }
}
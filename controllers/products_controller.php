<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');
require_once('models/category.php');
require_once('models/supplier.php');

class ProductsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'products';
  }

  public function index()
  {
    $products = Product::all();
    $categories = Category::all();
    $suppliers = Supplier::all();
    $data = array('products' => $products, 'categories' => $categories, 'suppliers' => $suppliers);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $product = Product::find($_GET['id']);
    else $product = Product::find(-1);
    $categories = Category::all();
    $suppliers = Supplier::all();
    $data = array('product' => $product, 'categories' => $categories, 'suppliers' => $suppliers);
    $this->render('show', $data);
  }
  public function add()
  {
    Product::add($_POST['name'],$_POST['img'],$_POST['quantity'],$_POST['cost'],$_POST['categoryID'],$_POST['supplierID']);
    header("Location: index.php?controller=products");
  }
  public function update()
  {
    $id = intval($_POST['id']);
    Product::update($id,$_POST['name'],$_POST['img'],$_POST['quantity'],$_POST['cost'],$_POST['categoryID'],$_POST['supplierID']);
    header("Location: index.php?controller=products");
  }
  public function delete()
  {
    Product::delete($_GET['id']);
    header("Location: index.php?controller=products");
  }
}
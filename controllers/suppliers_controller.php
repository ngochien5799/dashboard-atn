<?php
require_once('controllers/base_controller.php');
require_once('models/supplier.php');

class SuppliersController extends BaseController
{
  function __construct()
  {
    $this->folder = 'suppliers';
  }

  public function index()
  {
    $suppliers = Supplier::all();
    $data = array('suppliers' => $suppliers);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $supplier = Supplier::find($_GET['id']);
    else $supplier = Supplier::find(-1);
    $data = array('supplier' => $supplier);
    $this->render('show', $data);
  }
  public function add()
  {
    Supplier::add($_POST['name'],$_POST['description']);
    header("Location: index.php?controller=suppliers");
  }
  public function update()
  {
    $id = intval($_POST['id']);
    Supplier::update($id,$_POST['name'],$_POST['description']);
    header("Location: index.php?controller=suppliers");
  }
  public function delete()
  {
    Supplier::delete($_GET['id']);
    header("Location: index.php?controller=suppliers");
  }
}
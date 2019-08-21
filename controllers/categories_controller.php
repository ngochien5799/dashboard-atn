<?php
require_once('controllers/base_controller.php');
require_once('models/category.php');

class CategoriesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'categories';
  }

  public function index()
  {
    $categories = Category::all();
    $data = array('categories' => $categories);
    $this->render('index', $data);
  }
  public function show()
  {
    if(isset($_GET['id'])) $category = Category::find($_GET['id']);
    else $category = Category::find(-1);
    $data = array('category' => $category);
    $this->render('show', $data);
  }
  public function add()
  {
    Category::add($_POST['name'],$_POST['description']);
    header("Location: index.php?controller=categories");
  }
  public function update()
  {
    $id = intval($_POST['id']);
    Category::update($id,$_POST['name'],$_POST['description']);
    header("Location: index.php?controller=categories");
  }
  public function delete()
  {
    Category::delete($_GET['id']);
    header("Location: index.php?controller=categories");
  }
}
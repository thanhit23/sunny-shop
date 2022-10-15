<?php
require "../../../global.php";
require "../../../PDO/type.php";
extract($_REQUEST);
echo $VIEW_NAME. '$VIEW_NAME';
if(exist_param("btn_insert")) {
  try {
    typeInsert($name);
    unset($name, $id);
    $MESSAGE = "Thêm mới thành công!"; }
  catch (Exception $exc) {
    $MESSAGE = "Thêm mới thất bại!";
  }
  $VIEW_NAME = "product/new.php";
} else if (exist_param("btn_update")) {
  try {
    typeUpdate($name, $id);
    $MESSAGE = "Cập nhật thành công!"; }
  catch (Exception $exc) {
    $MESSAGE = "Cập nhật thất bại!";
  }
  $VIEW_NAME = "product/edit.php";
} else if (exist_param("btn_delete")) {
  try {
    typeDelete($id);
    $items = typeSelectAll();
    $MESSAGE = "Xóa thành công!"; }
  catch (Exception $exc) {
    $MESSAGE = "Xóa thất bại!";
  }
  $VIEW_NAME = "product/list.php";
} else if (exist_param("btn_edit")){
  $item = typeSelectById($id);
  extract($item);
  $VIEW_NAME = "product/edit.php";
} else if (exist_param("btn_list")){
  $items = typeSelectAll();
  $VIEW_NAME = "product/list.php";
} else {
  $VIEW_NAME = "product/new.php";
}
require "../layout.php";

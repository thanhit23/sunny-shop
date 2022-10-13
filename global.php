<?php

// Lưu file upload vào thư mục
// @param string $fieldname là tên trường file * @param string $target_dir thư mục lưu file * @return tên file upload
function save_file($fieldName, $target_dir){
  $file_uploaded = $_FILES[$fieldName];
  $file_name = basename($file_uploaded["name"]);
  $target_path = $target_dir . $file_name;
  move_uploaded_file($file_uploaded["tmp_name"], $target_path);
  return $file_name;
}
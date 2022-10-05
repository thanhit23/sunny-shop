<?php
/**
 * Created by PhpStorm.
 * User: tannguyen
 * Date: 10/3/22
 * Time: 8:26 PM
 */
require_once ('pdo.php');

function clientChangePassword() {}

function clientInsert($password, $name, $email) {
  $img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNL_ZnOTpXSvhf1UaK7beHey2BX42U6solRA&usqp=CAU";
  $sql = "INSERT INTO `client`(`id`, `password`, `full_name`, `active`, `image`, `email`, `role`) VALUES ('SN3',?,?,1,$img,?,1)";
  execute($sql, $password, $name, $email);
}

function clientUpdate($name, $id) {
  $sql = "UPDATE `client` SET `name`=? WHERE `id`=?";
  execute($sql, $name, $id);
}

function clientDelete($id) {
  $sql = "DELETE FROM `client` WHERE `id`=?";
  if(is_array($id)){
    foreach ($id as $idItem) {
      execute($sql, $idItem);
    }
  } else{
    execute($sql, $id);
  }
}

/**
 * @param int $where
 * @param $cols
 * @return array
 */

function clientSelectAll($cols, $where = 1) {
  $col = $cols ? $cols : '*';
  $sql = "SELECT $col FROM `client` WHERE $where";
  return query($sql);
}

function clientSelectById($id) {
  $sql = "SELECT * FROM `client` WHERE `id`=?";
  return queryOne($sql, $id);
}

function clientExist($id) {
  $sql = "SELECT count(*) FROM `client` WHERE `id`=?";
  return queryValue($sql, $id) > 0;
}

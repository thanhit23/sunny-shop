<?php
/**
 * Created by PhpStorm.
 * User: thanhNguyen
 * Date: 10/3/22
 * Time: 8:26 PM
 */
require_once ('pdo.php');

function Insert($name) {
  $sql = "INSERT INTO `commodity`(`name`) VALUES (?)";
  execute($sql, $name);
}

function commodityUpdate($name, $id) {
  $sql = "UPDATE `type` SET `commodity`=? WHERE `id`=?";
  execute($sql, $name, $id);
}

function commodityDelete($id) {
  $sql = "DELETE FROM `commodity` WHERE `id`=?";
  if(is_array($id)){
    foreach ($id as $idItem) {
      execute($sql, $idItem);
    }
  } else{
    execute($sql, $id);
  }
}

function commodityPagination($limit) {
  $sql = "SELECT * FROM `commodity` ORDER BY id DESC LIMIT $limit";
  return query($sql);
}

/**
 * @param $special
 * @return array
 */

function commoditySelectAll($special = 1) {
  $sql = "SELECT * FROM `commodity` WHERE $special";
  return query($sql);
}

function commoditySelectById($id) {
  $sql = "SELECT * FROM `commodity` WHERE `id`=?";
  return queryOne($sql, $id);
}

function commodityExist($id) {
  $sql = "SELECT count(*) FROM `commodity` WHERE `id`=?";
  return queryValue($sql, $id) > 0;
}

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/product.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/pdo.php');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title>Sunny Shop</title>
  <?php
  require('../templates/includes/helmet.php')
  ?>
  <link rel="stylesheet" href="/resources/css/header.css">
  <link rel="stylesheet" href="/resources/css/slide.css">
</head>
<body>
<?php
require('../templates/includes/header.php');
?>
<section class="product-section">
  <div class="container-fluid-lg">
    <div class="row g-sm-4 g-3">
      <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
        <div class="p-sticky">
          <div class="category-menu">
            <h3>Danh mục</h3>
            <ul>
              <li>
                <div class="category-list">
                  <h5>
                    <a href="<?php echo '/categories?search=Iphone' ?>">Iphone</a>
                  </h5>
                </div>
              </li>
              <li>
                <div class="category-list">
                  <h5>
                    <a href="<?php echo '/categories?search=Xiaomi' ?>">Xiaomi Redmi</a>
                  </h5>
                </div>
              </li>
              <li class="pb-3">
                <div class="category-list">
                  <h5>
                    <a href="<?php echo '/categories?search=Samsung' ?>">Samsung</a>
                  </h5>
                </div>
              </li>
            </ul>
          </div>
          <div class="category-menu">
            <h3>Treanding Products</h3>
            <ul class="product-list border-0 p-0 d-block">
              <?php
              $result = commoditySelectAll('`special` = 1');
              if ($result) {
                foreach ($result as $value) {
                  $unit_price = number_format($value['unit_price'], 0);
                  $db = $value['image'];
                  $img = json_decode($db);
                  ?>
                  <li>
                    <div class="offer-product">
                      <a href="/product.html?name=<?php echo $value['name'] ?>&id=<?php echo $value['id'] ?>" class="offer-image">
                        <img src="<?php echo $img[0] ?>"
                             class="blur-up lazyload" alt="">
                      </a>
                      <div class="offer-detail">
                        <div>
                          <a href="product-left.html" class="text-title">
                            <h6 class="name"><?php echo $value['name'] ?></h6>
                          </a>
                          <h6 class="price theme-color"><?php echo $unit_price ?> đ</h6>
                        </div>
                      </div>
                    </div>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xxl-9 col-xl-8">
        <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://cdn.tgdd.vn/2022/09/banner/380x200-380x200-20.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://cdn.tgdd.vn/2022/09/banner/Desktop-380x200-Realme-C35-4-64GB-380x200.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://cdn.tgdd.vn/2022/09/banner/380-x-200-380x200-4.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="blog-box">
              <div class="blog-box-image">
                <a href="#" class="blog-image" style="height: 200px;">
                  <img src="https://cdn.tgdd.vn/2022/09/banner/Desktop-380x200-Realme-C25Y-4-64GB-380x200.png"
                       class="bg-img blur-up lazyload" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="products" class="title title-flex mt-3">
          <div>
            <h2>Sản phẩm HOT nhất hôm nay</h2>
            <span class="title-leaf" style="width:370px;margin:0;"></span>
          </div>
        </div>
        <div class="section-b-space">
          <div class="product-border border-row overflow-hidden">
            <div class="product-box-slider no-arrow">
              <?php
              $result = commoditySelectAll();
              if ($result) {
                foreach ($result as $value) {
                  $name = $value['name'];
                  $unit_price = $value['unit_price'];
                  $price = number_format($unit_price, 0, '', ',');
                  $discount = $value['discount'];
                  $priceNew = (int)$unit_price;
                  $discountNew = (int)$discount === 0 ? 1 : $discount;
                  $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
                  $db = $value['image'];
                  $img = json_decode($db);
                  ?>
                  <div class="row m-0">
                    <div class="col-12">
                      <div class="product-box">
                        <div class="product-image">
                          <a href="/product.html?name=<?php echo $name ?>&id=<?php echo $value['id'] ?>">
                            <img src="<?php echo $img[0] ?>"
                                 class="img-fluid blur-up lazyload" alt="">
                          </a>
                          <ul class="product-option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                title="View">
                              <a href="javascript:void(0)" data-bs-toggle="modal"
                                 data-bs-target="#view">
                                <i data-feather="eye"></i>
                              </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Compare">
                              <a href="compare.html">
                                <i data-feather="refresh-cw"></i>
                              </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Wishlist">
                              <a href="wishlist.html" class="notifi-wishlist">
                                <i data-feather="heart"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="product-detail">
                          <a href="/product.html?<?php echo $name ?>&<?php echo $value['id'] ?>">
                            <h6 class="name"><?php echo $name ?></h6>
                          </a>
                          <h5 class="sold text-content">
                            <span class="theme-color price"><?php echo $price. 'đ' ?></span>
                            <del><?php echo $priceOff ?></del>
                          </h5>
                          <div class="product-rating mt-2">
                            <ul class="rating">
                              <li>
                                <i data-feather="star" class="fill"></i>
                              </li>
                              <li>
                                <i data-feather="star" class="fill"></i>
                              </li>
                              <li>
                                <i data-feather="star" class="fill"></i>
                              </li>
                              <li>
                                <i data-feather="star" class="fill"></i>
                              </li>
                              <li>
                                <i data-feather="star"></i>
                              </li>
                            </ul>

                            <h6 class="theme-color">In Stock</h6>
                          </div>
                          <div class="add-to-cart-box">
                            <button class="btn btn-add-cart addcart-button">
                              Add
                              <i class="fa-solid fa-plus"></i>
                            </button>
                            <div class="cart_qty qty-box">
                              <div class="input-group">
                                <button type="button" class="qty-left-minus"
                                        data-type="minus" data-field="">
                                  <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input class="form-control input-number qty-input"
                                       type="text" name="quantity" value="0" >
                                <button type="button" class="qty-right-plus"
                                        data-type="plus" data-field="">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
        <div class="title d-block">
          <h2>Tìm Kiếm nhiều nhất</h2>
          <span class="title-leaf"></span>
        </div>
        <div class="product-border overflow-hidden wow fadeInUp">
          <div class="product-box-slider no-arrow">
            <?php
              $result = commoditySelectAll("name LIKE '%iphone 13%'");
              if ($result) {
                foreach ($result as $value) {
                  $price = number_format($value['unit_price'], 0, '', ',');
                  $name = $value['name'];
                  $discount = $value['discount'];
                  $priceNew = (int)$unit_price;
                  $discountNew = (int)$discount === 0 ? 1 : $discount;
                  $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
                  $db = $value['image'];
                  $img = json_decode($db);
                  ?>
                  <div>
                    <div class="row m-0">
                      <div class="col-12 px-0">
                        <div class="product-box">
                          <div class="product-image">
                            <a href="/product.html?name=<?php echo $name ?>&id=<?php echo $value['id'] ?>">
                              <img src="<?php echo $img[0] ?>" class="img-fluid blur-up lazyload" alt="">
                            </a>
                            <ul class="product-option">
                              <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                   data-bs-target="#view">
                                  <i data-feather="eye"></i>
                                </a>
                              </li>
                              <li data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Compare">
                                <a href="javascript:void(0)">
                                  <i data-feather="refresh-cw"></i>
                                </a>
                              </li>
                              <li data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Wishlist">
                                <a href="javascript:void(0)" class="notifi-wishlist">
                                  <i data-feather="heart"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="product-detail">
                            <a href="/product.html?name=<?php echo $name ?>&id=<?php echo $value['id'] ?>">
                              <h6 class="name h-100"><?php echo $name ?></h6>
                            </a>
                            <h5 class="sold text-content">
                              <span class="theme-color price"><?php echo $priceNew. ' đ' ?></span>
                              <del><?php echo $priceOff ?></del>
                            </h5>
                            <div class="product-rating mt-2">
                              <ul class="rating">
                                <li>
                                  <i data-feather="star" class="fill"></i>
                                </li>
                                <li>
                                  <i data-feather="star" class="fill"></i>
                                </li>
                                <li>
                                  <i data-feather="star" class="fill"></i>
                                </li>
                                <li>
                                  <i data-feather="star" class="fill"></i>
                                </li>
                                <li>
                                  <i data-feather="star"></i>
                                </li>
                              </ul>

                              <h6 class="theme-color">In Stock</h6>
                            </div>

                            <div class="add-to-cart-box">
                              <button class="btn btn-add-cart addcart-button">Add
                                <i class="fa-solid fa-plus"></i></button>
                              <div class="cart_qty qty-box">
                                <div class="input-group">
                                  <button type="button" class="qty-left-minus"
                                          data-type="minus" data-field="">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                  </button>
                                  <input class="form-control input-number qty-input"
                                         type="text" name="quantity" value="0">
                                  <button type="button" class="qty-right-plus"
                                          data-type="plus" data-field="">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
            ?>
            <div>
              <div class="row m-0">
                <div class="col-12 px-0">
                  <div class="product-box">
                    <div class="product-image">
                      <a href="product-left.html">
                        <img src="https://themes.pixelstrap.com/fastkart/assets/images/vegetable/product/2.png"
                             class="img-fluid blur-up lazyload" alt="">
                      </a>
                      <ul class="product-option">

                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                          <a href="javascript:void(0)" data-bs-toggle="modal"
                             data-bs-target="#view">
                            <i data-feather="eye"></i>
                          </a>
                        </li>

                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Compare">
                          <a href="compare.html">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </li>

                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Wishlist">
                          <a href="wishlist.html" class="notifi-wishlist">
                            <i data-feather="heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="product-detail">
                      <a href="product-left.html">
                        <h6 class="name h-100">Sandwich Cookies</h6>
                      </a>

                      <h5 class="sold text-content">
                        <span class="theme-color price">$26.69</span>
                        <del>28.56</del>
                      </h5>

                      <div class="product-rating mt-2">
                        <ul class="rating">
                          <li>
                            <i data-feather="star" class="fill"></i>
                          </li>
                          <li>
                            <i data-feather="star" class="fill"></i>
                          </li>
                          <li>
                            <i data-feather="star" class="fill"></i>
                          </li>
                          <li>
                            <i data-feather="star" class="fill"></i>
                          </li>
                          <li>
                            <i data-feather="star"></i>
                          </li>
                        </ul>

                        <h6 class="theme-color">In Stock</h6>
                      </div>

                      <div class="add-to-cart-box">
                        <button class="btn btn-add-cart addcart-button">Add
                          <i class="fa-solid fa-plus"></i></button>
                        <div class="cart_qty qty-box">
                          <div class="input-group">
                            <button type="button" class="qty-left-minus"
                                    data-type="minus" data-field="">
                              <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>
                            <input class="form-control input-number qty-input"
                                   type="text" name="quantity" value="0">
                            <button type="button" class="qty-right-plus"
                                    data-type="plus" data-field="">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require('../templates/includes/footer.php')
?>
<script src="../../resources/js/main.js"></script>
</body>
</html>

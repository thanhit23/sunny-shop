<?php
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/product.php');
require($_SERVER['DOCUMENT_ROOT'] . '/PDO/pdo.php');

$id = $_GET['id'];
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title>Sunny Shop</title>
  <?php
  require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/helmet.php')
  ?>
  <link rel="stylesheet" href="/resources/css/header.css">
  <link rel="stylesheet" href="/resources/css/slide.css">
</head>
<body>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/header.php')
?>
<section class="breadscrumb-section pt-0">
  <div class="container-fluid-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadscrumb-contain">
          <h2><?php echo $_GET['name'] ?></h2>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="/home">
                  <i class="fa-solid fa-house"></i>
                </a>
              </li>
              <li class="breadcrumb-item active"><?php echo $_GET['name'] ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$result = commoditySelectAll("`id` = $id");
if ($result) {
  foreach ($result as $value) {
    $unit_price = $value['unit_price'];
    $price = number_format($unit_price, 0, '', ',');
    $discount = $value['discount'];
    $priceNew = (int)$unit_price;
    $discountNew = (int)$discount === 0 ? 1 : $discount;
    $priceOff = number_format($priceNew / ((100 - $discountNew) / 100), 0);
    $db = $value['image'];
    $img = json_decode($db);
    ?>
    <section class="product-section">
      <div class="container-fluid-lg">
        <div class="row">
          <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
            <div class="row g-4">
              <div class="col-xl-6 wow fadeInUp">
                <div class="product-left-box">
                  <div class="row g-sm-4 g-2">
                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                      <div class="product-main no-arrow">
                        <?php
                        foreach ($img as $valueImg) {
                          ?>
                          <div>
                            <div class="slider-image">
                              <img src="<?php echo $valueImg ?>" class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                            </div>
                          </div>
                          <?php
                        }
                        ?>

                      </div>
                    </div>
                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                      <div class="left-slider-image left-slider no-arrow slick-top">
                        <?php
                          foreach ($img as $valueImg) {
                            ?>
                            <div>
                                <div class="sidebar-image">
                                  <img src="<?php echo $valueImg ?>"
                                       class="img-fluid blur-up lazyload" alt="">
                                </div>
                              </div>
                            <?php
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 wow fadeInUp">
                <div class="right-box-contain">
                  <h2 class="name"><?php echo $value['name'] ?></h2>
                  <div class="price-rating">
                    <h3 class="theme-color price">
                      <?php echo $price. ' đ' ?>
                      <del class="text-content"><?php echo $priceOff. ' đ' ?></del>
                      <span
                              class="offer theme-color">(<?php echo (int)$discount ?>% off)</span></h3>
                    <div class="product-rating custom-rate">
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
                      <span class="review"><?php echo $value['view'] ?> Customer Review</span>
                    </div>
                  </div>
                  <div class="note-box product-packge">
                    <div class="cart_qty qty-box product-qty">
                      <div class="input-group">
                        <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <input class="form-control input-number qty-input" type="text"
                               name="quantity" value="0">
                        <button type="button" class="qty-left-minus" data-type="minus"
                                data-field="">
                          <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>

                    <button onclick="location.href = 'cart.html';"
                            class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart
                    </button>
                  </div>
                  <div class="paymnet-option">
                    <div class="product-title">
                      <h4>Guaranteed Safe Checkout</h4>
                    </div>
                    <ul>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">
                          <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                               class="blur-up lazyload" alt="">
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
            <div class="right-sidebar-box">
              <div class="vendor-box">
                <div class="verndor-contain">
                  <div class="vendor-image">
                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/vendor.png"
                         class="blur-up lazyload" alt="">
                  </div>
                  <div class="vendor-name">
                    <h5 class="fw-500">Noodles Co.</h5>
                    <div class="product-rating mt-1">
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
                      <span>(36 Reviews)</span>
                    </div>
                  </div>
                </div>
                <div class="vendor-list">
                  <ul>
                    <li>
                      <div class="address-contact">
                        <i data-feather="map-pin"></i>
                        <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>
                      </div>
                    </li>
                    <li>
                      <div class="address-contact">
                        <i data-feather="headphones"></i>
                        <h5>Contact Seller: <span class="text-content">(+1)-123-456-789</span></h5>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="pt-25">
                <div class="hot-line-number">
                  <h5>Hotline Order:</h5>
                  <h6>Mon - Fri: 07:00 am - 08:30PM</h6>
                  <h3>(+1) 123 456 789</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container-fluid-lg">
        <div class="row">
          <div class="col-12">
            <div class="product-section-box m-0">
              <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                          data-bs-target="#description" type="button" role="tab" aria-controls="description"
                          aria-selected="true">Description
                  </button>
                </li>
              </ul>
              <div class="tab-content custom-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                     aria-labelledby="description-tab">
                  <div class="product-description">
                    <div class="nav-desh">
                      <p><?php echo $value['description'] ?></p>
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
  }
}
?>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pages/templates/includes/footer.php')
?>
</body>
</html>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('shopCart/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('shopCart/css/style.css')}}" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
                <div class="cart-table">
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th class="p-name">Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(\Illuminate\Support\Facades\Session::has('Cart') != null)
                            @foreach(\Illuminate\Support\Facades\Session::get('Cart')->product as $items)
                        <tr>
                            <td class="cart-pic first-row"><img src="{{asset('storage/'.$items['productInfo']->image)}}" alt=""></td>
                            <td class="cart-title first-row">
                                <h5>{{$items['productInfo']->name}}</h5>
                            </td>
                            <td class="p-price first-row">{{number_format($items['productInfo']->price)}}</td>
                            <td class="qua-col first-row">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="{{$items['qty']}}">
                                    </div>
                                </div>
                            </td>
                            <td class="total-price first-row">{{number_format($items['price'])}}</td>
                            <td class="close-td first-row"><i class="ti-close"  onclick="deleteCartDetail({{$items['productInfo']->id}})"></i></td>
                            <td class="close-td first-row"><i class="ti-save"></i></td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Total Qty <span>{{\Illuminate\Support\Facades\Session::get('Cart')->totalQty}}</span></li>
                                <li class="cart-total">Total <span>{{number_format(\Illuminate\Support\Facades\Session::get('Cart')->totalPrice)}} VND</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="{{asset('shopCart/img/payment-method.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('shopCart/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('shopCart/js/bootstrap.min.js')}}"></script>
<script src="{{asset('shopCart/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('shopCart/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('shopCart/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('shopCart/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('shopCart/js/jquery.dd.min.js')}}"></script>
<script src="{{asset('shopCart/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('shopCart/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('shopCart/js/main.js')}}"></script>
<script>
  function deleteCartDetail(id) {
      console.log(id);
      $.ajax({
          url: 'delete-detail-cart/'+ id,
          type: 'GET',
          success: function (data) {
              $('#list-cart').empty();
              $('#list-cart').html(data);
              alertify.success('Delete Your Item!');
          }
      });
  }
</script>
</body>

</html>

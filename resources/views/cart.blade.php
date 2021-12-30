@extends('layouts.user')
<link href="{{asset('./css/cart.css')}}" rel="stylesheet">

@section('title','Cart')

@section('content')


    <div id="site-header">
        <div class="container">
            <h1>Shopping cart <span>[</span> <em><a href="/products" target="_blank">Tiếp tục mua hàng</a></em> <span class="last-span is-open">]</span></h1>
        </div>
    </div>

    <div class="container">

        <section id="cart">
            @php
                $total = 0;
            @endphp
            @foreach ($c as $c)

            <article class="product">
                <header>
                    <a class="remove remove{{$c->c_id}}">
                        <img src="/storage/product/{{$c->p_img}}" alt="">

                        <h3 style="text-align: center">Xóa</h3>
                    </a>
                </header>

                <div class="content">

                    <h1>{{$c->p_name}}</h1>

                    {{$c->p_desc}}
                </div>

                <footer class="content">

                    <span class="qt-minus qt-minus{{$c->c_id}}">-</span>
                    <span class="qt qt{{$c->c_id}}">
                        {{$c->c_quantity}}
                        <input type="hidden" class="id" value="{{$c->c_quantity}}">
                        <input type="hidden" class="fullprice" value="{{$c->p_price * $c->c_quantity}}">


                    </span>
                    <span class="qt-plus qt-plus{{$c->c_id}}">+</span>

                    <h2 class="full-price full-price{{$c->c_id}}">
                        {{ number_format($c->p_price * $c->c_quantity,0,',','.') }}<span>đ</span>
                        <input type="hidden" value="{{$c->p_price * $c->c_quantity}}">
                    </h2>

                    <h2 class="price price{{$c->c_id}}">
                        {{ number_format($c->p_price,0,',','.') }}<span>đ</span>
                        <input type="hidden" value="{{$c->p_price}}">

                    </h2>
                </footer>
            </article>

            @php
            $total += $c->c_price
            @endphp

            <script>
                function formatNumber(nStr, decSeperate, groupSeperate) {
                    nStr += '';
                    x = nStr.split(decSeperate);
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
                    }
                    return x1 + x2;
                }
                $(document).ready(function(){

                    $(".qt-plus{{$c->c_id}}").on('click',function(){

                        var id=$('.qt{{$c->c_id}}>.id').val();
                        var price=$('.qt{{$c->c_id}}>.fullprice').val();

                        $.ajax({

                            url: '{{ url('/cart/add_qt/'.$c->c_id) }}',
                            type: 'POST',

                            data: {id:id, price:price ,_token: '{{csrf_token()}}',},
                            success:function(data) {
                                $('.qt{{$c->c_id}}').html(data);
                            }
                        });

                    });

                    $(".qt-minus{{$c->c_id}}").on('click',function(){

                        var id=$('.qt{{$c->c_id}}>.id').val();
                        var price=$('.qt{{$c->c_id}}>.fullprice').val();

                        $.ajax({

                            url: '{{ url('/cart/minus_qt/'.$c->c_id) }}',
                            type: 'POST',

                            data: {id:id, price:price ,_token: '{{csrf_token()}}',},
                            success:function(data) {
                                $('.qt{{$c->c_id}}').html(data);
                            }
                        });

                    });

                    $(".qt{{$c->c_id}}").bind('DOMSubtreeModified',function(){
                        var id=$('.qt{{$c->c_id}}>input').val();
                        var price=$('.price{{$c->c_id}}>input').val();
                        $('.full-price{{$c->c_id}}').html(formatNumber(id * price, '.', '.')+'đ');

                    });


                    // $(".qt{{$c->c_id}}").bind('DOMSubtreeModified',function(){
                    //     $.ajax({

                    //         url: '{{ url('/cart/change') }}',
                    //         type: 'get',

                    //         data: {id: '{{Auth::user()->id}}'},
                    //         success:function(data) {
                    //             $('.sub').html(formatNumber(data, '.', '.'));
                    //         }
                    //     });

                    // });
                    // $(".qt{{$c->c_id}}").bind('DOMSubtreeModified',function(){
                    //     $.ajax({

                    //         url: '{{ url('/cart/tax') }}',
                    //         type: 'get',

                    //         data: {id: '{{Auth::user()->id}}'},
                    //         success:function(data) {
                    //             $('.tax-span').console.log(formatNumber(data, '.', '.'));
                    //         }
                    //     });

                    // });
                    $(".qt{{$c->c_id}}").bind('DOMSubtreeModified',function(){
                        $.ajax({

                            url: '{{ url('/cart/total') }}',
                            type: 'get',

                            data: {id: '{{Auth::user()->id}}'},
                            success:function(data) {
                                window.location.reload(true)
                            }
                        });

                    });
                })
            </script>

            <script>
                $(".remove{{$c->c_id}}").click(function(){
                    var el = $(this);
                    el.parent().parent().addClass("removed");
                    window.setTimeout(
                        function(){
                            el.parent().parent().slideUp('fast', function() {
                            el.parent().parent().remove();

                        });
                    }, 200);

                    $.ajax({

                        url: '{{ url('/cart/remove') }}',
                        type: 'POST',

                        data: {id:'{{$c->c_id}}' ,_token: '{{csrf_token()}}',},
                        success:function(data) {
                            window.location.reload(true)
                        }
                    });
                });
            </script>

            @endforeach


        </section>

    </div>


    <div id="site-footer">
        <div class="container clearfix">

            <div class="left">
                {{-- <h2 class="subtotal">Tạm tính:
                <span class="sub">{{ number_format($total,0,',','.') }}</span>đ</p>

                </h2> --}}
            </div>

            <div class="right">
                <h1 class="total">Total: <span class="total-price">{{ number_format($total,0,',','.') }}</span>đ</p></h1>
                <button class="btn btn-primary" @if (App\Models\Cart::where('id',Auth::user()->id)->count()==0) echo style="display:none"

                @endif data-toggle="modal"  data-target="#exampleModalCenter">Checkout</button>
            </div>

        </div>
    </div>
@php
     $vnd_to_usd=round($total/23000,2);

@endphp
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Xuất hóa đơn</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="mx-4" action="/cart/checkout" method="post" name="form">
                @csrf
                <p><b>Thông tin cá nhân</b></p>

                <div class="form-row">
                    <input type="text" class="form-cart col-md-6 mx-auto" placeholder="Họ Tên" required autofocus name="name" id="name"/>
                    <input type="text" class="form-cart col-md-5 mx-auto" placeholder="Đơn vị (Nếu có)" name="company" id="company"/>
                </div>
                <div class="form-row">
                    <input type="email" class="form-cart col-md-6 mx-auto" value="{{Auth::user()->email}}" required disabled name="email"/>
                    <input type="text" class="form-cart col-md-5 mx-auto" placeholder="Số điện thoại" required name="phone" id="phone"/>
                </div>
                <br>
                <p><b>Địa chỉ</b></p>
                <div class="form-row">

                    <select class="form-cart province choose col-md-4 mx-auto" id="province" style="width: 100%" name="province"  >

                        <option>--Tỉnh/Thành--</option>
                        @foreach ($prov as $prov )
                        <option value="{{ $prov->matp }}">{{ $prov->name }}</option>
                        @endforeach
                    </select>
                    <p></p>
                    <select class="form-cart district choose col-md-4 mx-auto" id="district" style="width: 100%" name="district">
                        <option>--Quận/Huyện--</option>
                    </select>
                    <p></p>
                    <select class="form-cart ward col-md-4 mx-auto" id="ward" style="width: 100%" name="ward">
                        <option>--Xã/Phường--</option>
                    </select>
                </div>
                <div class="form-row">
                    <input type="text" class="form-cart col-md-12 mx-auto" placeholder="Địa chỉ nhận hàng" required name="address" id="address"/>
                </div>
                <br>
                <p><b>Hình thức thanh toán</b></p>
                <div class="form-row px-4 align-items-center">
                    <div class="form-check col-md-5  mx-auto">
                        <button type="submit" class="btn btn-primary" id="checkout">Ship COD</button>

                    </div>
                    <div class="form-check col-md-5 mx-auto">

                        <div class="online-pay">
                            <div id="paypal-button"  class="my-2"></div>
                        </div>
                    </div>

                </div>



            </form>
            <script>
                $("#checkout").click(function(){

                    $("form").submit(function(e){
                        e.preventDefault();
                        Swal.fire({
                            title: 'Xác nhận đặt hàng',
                            text: "Vui lòng kiểm tra thông tin trước khi đặt hàng",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Xác nhận'
                        })
                        .then((submit) => {

                            if (submit.isConfirmed) {

                                form.submit();

                            }

                        });
                    });

                });


            </script>
            @include('sweetalert::alert')

        </div>
      </div>
    </div>


</div>
{{-- Paypal --}}

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ASxOwyQKFOHJ9Iof7i6Nkc1zVoMwtRVjyabGZaSotniXTn8_OjedJs9OquucWZpqRpXUYZ7HERHUQTuW',
      production: 'EMraDKQlH-XCPSCWmAWVpkcH80qbrsZ90OlKaM_auz3NWWidW9idTuYRJx2nVyzLp7zGHmZ4cQQs8Z1z'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'medium',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    validate: function(actions) {
        actions.disable(); // Allow for validation in onClick()
        paypalActions = actions; // Save for later enable()/disable() calls
    },

    onClick: function(e) {


        name = $("#name").val();
        phone = $("#phone").val();
        province = $("#province").val();
        district = $("#district").val();
        ward = $("#ward").val();
        address = $("#address").val();
        company = $("#company").val();
                // Issue: fix to continue if valid, suppress popup if invalid
        if (name && phone && province != '--Tỉnh/Thành--' && district != '--Quận/Huyện--' && ward != '--Xã/Phường--' && address) {
            paypalActions.enable();

        }
        else{
            Swal.fire(
                'Vui lòng nhập đầy đủ thông tin',
                '',
                'warning'
            )
            paypalActions.disable();
        }


    },

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({

        redirect_urls:{
          return_url:'http://localhost:8000/execute-paypal'
        },
        transactions: [{
            amount: {
                total: '{{$vnd_to_usd}}',
                currency: 'USD'
            }


        }],
        application_context: {
            shipping_preference: 'NO_SHIPPING'
        }
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {

        return actions.payment.execute().then(function(details) {

            var name = $("#name").val();
            var phone = $("#phone").val();
            var province = $("#province").val();
            var district = $("#district").val();
            var ward = $("#ward").val();
            var address = $("#address").val();
            var company = $("#company").val();

            $.ajax({
                method: "POST",
                url: "/cart/paypal",
                data:{
                    name:name,
                    phone:phone,
                    province:province,
                    district:district,
                    ward:ward,
                    address:address,
                    company:company,
                    total:'{{$vnd_to_usd}}',
                    methodID:details.id,
                    _token: '{{csrf_token()}}',
                },
                success:function(response){
                    $('#'+result).html(response);
                }

            })
            window.location.reload(true)


        });


    }
  }, '#paypal-button');

</script>





    <script>
        $(document).ready(function(){
        $(".choose").on('change',function(){
            var action=$(this).attr('id');
            var id=$(this).val();
            var result='';


            if(action=='province'){
            result='district';
            }else {
            result='ward';
            }
            $.ajax({
            url: '{{ url('/get_address') }}',
            type:'post',
            data:{ action:action , id:id , _token: '{{csrf_token()}}',},
            success:function(data){
                $('#'+result).html(data);
            }
            });
        });

        })
    </script>




@endsection

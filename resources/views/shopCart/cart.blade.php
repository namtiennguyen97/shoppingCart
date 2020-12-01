@if(\Illuminate\Support\Facades\Session::has('Cart') != null)

<div class="select-items">
    <table>
        <tbody>
        @foreach(\Illuminate\Support\Facades\Session::get('Cart')->product as $item)
        <tr>
            <td class="si-pic"><img src="{{asset('storage/'.$item['productInfo']->image)}}" style="width: 90px" alt=""></td>
            <td class="si-text">
                <div class="product-selected">
                    <p>{{number_format($item['productInfo']->price)}} x {{$item['qty']}}</p>
                    <h6>{{$item['productInfo']->name}}</h6>
                </div>
            </td>
            <td class="si-close">
                <i class="ti-close" data-id="{{$item['productInfo']->id}}"></i>
            </td>
            <input id="qtyCart-cart" hidden type="number" value="{{\Illuminate\Support\Facades\Session::get('Cart')->totalQty}}">
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{\Illuminate\Support\Facades\Session::get('Cart')->totalPrice}}₫</h5>
</div>
@endif

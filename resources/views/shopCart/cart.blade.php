@if($newCart != null)

<div class="select-items">
    <table>
        <tbody>
        @foreach($newCart->product as $item)
        <tr>
            <td class="si-pic"><img src="{{asset('storage/'.$item['productInfo']->image)}}" alt=""></td>
            <td class="si-text">
                <div class="product-selected">
                    <p>{{number_format($item['productInfo']->price)}} x {{$item['qty']}}</p>
                    <h6>{{$item['productInfo']->name}}</h6>
                </div>
            </td>
            <td class="si-close">
                <i class="ti-close"></i>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{$newCart->totalPrice}}₫</h5>
</div>
@endif

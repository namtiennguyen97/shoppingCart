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

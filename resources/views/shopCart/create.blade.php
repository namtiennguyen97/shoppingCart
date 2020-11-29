<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    Name:
    <input type="text" name="name">
    Price:
    <input type="number" name="price">
    Image:
    <input type="file" name="image">
    <button type="submit">Add</button>
</form>

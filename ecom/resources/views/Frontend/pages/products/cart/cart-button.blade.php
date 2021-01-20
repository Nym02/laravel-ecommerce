<form action="{{ route('cart.store') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i>
        ADD TO CART</button>

</form>
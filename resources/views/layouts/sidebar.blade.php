    <div class="sidebar d-flex flex-column p-3 position-fixed" id="sidebar">
        <h4 class="text-white">Mobile Zone</h4>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="{{route('dashboard',['active' => 'dashboard'])}}" class="nav-link {{$active == 'dashboard' ? 'active' : ''}}">Dashboard</a></li>
            <li><a href="{{route('brand.index')}}" class="nav-link {{$active == 'brand' ? 'active' : ''}}">Brand</a></li>
            <li><a href="{{route('product.index')}}" class="nav-link {{$active == 'product' ? 'active' : ''}}">Product</a></li>
            <li><a href="{{route('order.index')}}" class="nav-link {{$active == 'order' ? 'active' : ''}}" >Order</a></li>
            <li><a href="{{route('user.index')}}" class="nav-link {{$active == 'user' ? 'active' : ''}}">Customer</a></li>
        </ul>
    </div>
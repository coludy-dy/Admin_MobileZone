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
        {{-- <hr>
        <h6 class="text-uppercase text-white-50">Apps</h6>
        <ul class="nav flex-column">
            <li><a href="#" class="nav-link">Calendar</a></li>
            <li><a href="#" class="nav-link">Chat</a></li>
            <li><a href="#" class="nav-link">Email</a></li>
        </ul> --}}
    </div>
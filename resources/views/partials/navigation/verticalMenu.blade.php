<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('products.index') }}">
                    <i class="nav-icon i-Cart-Quantity"></i>
                    <span class="nav-text">Productos</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('orders.owner') }}">
                    <i class="nav-icon i-Checkout-Basket"></i>
                    <span class="nav-text">Mis Ordenes</span>
                </a>
                <div class="triangle"></div>
            </li>

            @auth
                <li class="nav-item">
                    <a class="nav-item-hold" href="{{ route('orders.index') }}">
                        <i class="nav-icon i-Checkout-Basket"></i>
                        <span class="nav-text">Ordenes</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endauth
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>


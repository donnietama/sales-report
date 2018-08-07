<nav class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0">
    <ul class="text-capitalize list-unstyled sidebar">
        <li class="pl-4 py-2">
            <a href="{{ route('home') }}" class="text-dark">Home</a>
        </li>
        @if (Auth::user()->role === 0)
            <li class="pl-4 py-2">
                <a href="#" class="text-dark" id="btn-report" data-toggle="collapse" data-target="#submenu-report" aria-expanded="false">make report</a>
                <ul class="collapse list-unstyled" id="submenu-report" role="menu" aria-labelledby="#btn-report">
                    <li class="pl-4 py-2">
                        <a href="{{ route('report-summary') }}" class="text-dark">summary</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('report-batch') }}" class="text-dark">batch</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('report-waste') }}" class="text-dark">waste</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('product-sold') }}" class="text-dark">product sold</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('additional-report') }}" class="text-dark">additional</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->role === 1)
        <li class="pl-4 py-2">
                <a href="#" class="text-dark" id="btn-view-report" data-toggle="collapse" data-target="#submenu-view-report" aria-expanded="false">view report</a>
                <ul class="collapse list-unstyled" id="submenu-view-report" role="menu" aria-labelledby="#btn-view-report">
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-summaries') }}" class="text-dark">summary</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-batches') }}" class="text-dark">batch</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-wastes') }}" class="text-dark">waste</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-solds') }}" class="text-dark">product sold</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-additionals') }}" class="text-dark">additional</a>
                    </li>
                </ul>
            </li>
            <li class="pl-4 py-2">
                <a href="#" class="text-dark" id="btn-counter" data-toggle="collapse" data-target="#submenu-counter" aria-expanded="false">counter</a>
                <ul class="collapse list-unstyled" id="submenu-counter" role="menu" aria-labelledby="#btn-counter">
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-counted-batches') }}" class="text-dark">batches</a>
                    </li>
                </ul>
            </li>
            <li class="pl-4 py-2">
                <a href="#" class="text-dark" id="btn-product" data-toggle="collapse" data-target="#submenu-product" aria-expanded="false">product</a>
                <ul class="collapse list-unstyled" id="submenu-product" role="menu" aria-labelledby="#btn-product">
                    <li class="pl-4 py-2">
                        <a href="{{ route('view-product') }}" class="text-dark">view product</a>
                    </li>
                    <li class="pl-4 py-2">
                        <a href="{{ route('add-product') }}" class="text-dark">add product</a>
                    </li>
                </ul>
            </li>
            <li class="pl-4 py-2">
                <a href="#" class="text-dark" id="btn-ingredient" data-toggle="collapse" data-target="#submenu-ingredient" aria-expanded="false">ingredient</a>
                <ul class="collapse list-unstyled" id="submenu-ingredient" role="menu" aria-labelledby="#btn-ingredient">
                    <li class="pl-4 py-2">
                        <a href="{{ route('add-ingredient') }}" class="text-dark">add ingredient</a>
                    </li>
                </ul>
            </li>
            <li class="pl-4 py-2">
                <a href="#" class="text-dark" id="btn-topping" data-toggle="collapse" data-target="#submenu-topping" aria-expanded="false">Topping</a>
                <ul class="collapse list-unstyled" id="submenu-topping" role="menu" aria-labelledby="#btn-topping">
                    <li class="pl-4 py-2">
                        <a href="{{ route('add-topping') }}" class="text-dark">add topping</a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
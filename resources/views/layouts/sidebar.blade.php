<nav class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0">
    <ul class="text-capitalize list-unstyled sidebar">
        <li>
            <a href="{{ route('home') }}" class="text-white pl-4 py-2">Home</a>
        </li>
        @if (Auth::user()->role === 0)
            <li>
                <a href="#" class="text-white pl-4 py-2" id="btn-report" data-toggle="collapse" data-target="#submenu-report" aria-expanded="false">make report</a>
                <ul class="collapse" id="submenu-report" role="menu" aria-labelledby="#btn-report"><li><a href="{{ route('report-summary') }}" class="text-white py-2 pl-4">summary</a></li><li><a href="{{ route('report-batch') }}" class="text-white py-2 pl-4">batch</a></li><li><a href="{{ route('report-waste') }}" class="text-white py-2 pl-4">waste</a></li><li><a href="{{ route('product-sold') }}" class="text-white py-2 pl-4">product sold</a></li><li><a href="{{ route('additional-report') }}" class="text-white py-2 pl-4">additional</a></li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->role === 1)
        <li>
            <a href="#" class="text-white pl-4 py-2" id="btn-view-report" data-toggle="collapse" data-target="#submenu-view-report" aria-expanded="false">view report</a>
            <ul class="collapse" id="submenu-view-report" role="menu" aria-labelledby="#btn-view-report">
                <li><a href="{{ route('view-summaries') }}" class="text-white py-2 pl-4">summary</a></li>
                <li><a href="{{ route('view-batches') }}" class="text-white py-2 pl-4">batch</a></li>
                <li><a href="{{ route('view-wastes') }}" class="text-white py-2 pl-4">waste</a></li>
                <li><a href="{{ route('view-solds') }}" class="text-white py-2 pl-4">product sold</a></li>
                <li><a href="{{ route('view-additionals') }}" class="text-white py-2 pl-4">additional</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="text-white pl-4 py-2" id="btn-counter" data-toggle="collapse" data-target="#submenu-counter" aria-expanded="false">counter</a>
            <ul class="collapse" id="submenu-counter" role="menu" aria-labelledby="#btn-counter">
                <li><a href="{{ route('view-counted-batches') }}" class="text-white py-2 pl-4">batches</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="text-white pl-4 py-2" id="btn-product" data-toggle="collapse" data-target="#submenu-product" aria-expanded="false">product</a>
            <ul class="collapse" id="submenu-product" role="menu" aria-labelledby="#btn-product">
                <li><a href="{{ route('view-product') }}" class="text-white py-2 pl-4">view product</a></li>
                <li><a href="{{ route('add-product') }}" class="text-white py-2 pl-4">add product</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="text-white pl-4 py-2" id="btn-ingredient" data-toggle="collapse" data-target="#submenu-ingredient" aria-expanded="false">ingredient</a>
            <ul class="collapse" id="submenu-ingredient" role="menu" aria-labelledby="#btn-ingredient">
                <li><a href="{{ route('add-ingredient') }}" class="text-white py-2 pl-4">add ingredient</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="text-white pl-4 py-2" id="btn-topping" data-toggle="collapse" data-target="#submenu-topping" aria-expanded="false">Topping</a>
            <ul class="collapse" id="submenu-topping" role="menu" aria-labelledby="#btn-topping">
                <li><a href="{{ route('add-topping') }}" class="text-white py-2 pl-4">add topping</a></li>
            </ul>
        </li>
        @endif
    </ul>
</nav>
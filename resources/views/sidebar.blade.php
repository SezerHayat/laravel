<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>
                <li class="submenu">
                    <a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                        <span> Genel Görünüm </span>
                    </a>
                    <a class="" href="{{ route('mesais') }}">
                        <i class="fas fa-clock"></i>
                        <span> Mesai </span>
                    </a>
                    <a class="" href="{{ route('overtime') }}">
                        <i class="fas fa-clock"></i>
                        <span> Fazla Mesai </span>
                    </a>
                    <a class="{{ (request()->is('personel')) ? 'active' : '' }}" href="{{ route('personel') }}">
                        <i class="fas fa-user-tie"></i>
                        <span> Personeller </span>
                    </a>
                    <a class="{{ (request()->is('stok')) ? 'active' : '' }}" href="{{ route('stok') }}">
                        <i class="fas fa-building"></i>
                        <span> Stok (Yakında) </span>
                    </a>
                    <a class="{{ (request()->is('product')) ? 'active' : '' }}" href="{{ route('urunler') }}">
                        <i class="fas fa-building"></i>
                        <span> Ürün Listesi (Yakında) </span>
                    </a>
                </li>



            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>


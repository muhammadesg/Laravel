<ul class="sidebar-menu mysidebar-menu">
    <li class="dropdown">
      <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-light fa-gauge-high fa-bounce"></i><span>@lang('words.Dashboard')</span></a>
    </li>
    <li class="dropdown">
        <a href="{{route('orders.index')}}" class="nav-link"><i class="fas fa-duotone fa-money-bill-1-wave fa-bounce" style="--fa-primary-opacity: 1;"></i><span>@lang('words.Orders')</span></a>
    </li>
    <li class="dropdown">
       <a href="{{route('categories.index')}}" class="nav-link"><i class="fas fa-light fa-utensils fa-bounce"></i><span>@lang('words.Categories')</span></a>
    </li>
    <li class="dropdown">
        <a href="{{route('accordions.index')}}" class="nav-link"><i class="fas fa-sharp fa-light fa-location-dot fa-bounce"></i><span>@lang('words.Locations')</span></a>
    </li>
    <li class="dropdown">
        <a href="{{route('cards.index')}}" class="nav-link"><i class="fas fa-light fa-burger fa-bounce"></i><span>@lang('words.Cards')</span></a>
    </li>
    <li class="dropdown">
        <a href="{{route('banners.index')}}" class="nav-link"><i class="fas fa-thin fa-image fa-flip"></i><span>@lang('words.Banners')</span></a>
    </li>
    <li class="dropdown">
        <a href="{{route('completedOrders.index')}}" class="nav-link"><i class="fas fa-solid fa-check fa-shake"></i><span>@lang('words.CompletedOrders')</span></a>
    </li>
    <li class="dropdown">
        <a href="{{route('chats.index')}}" class="nav-link"><i class="fas fa-light fa-comment-dots fa-beat"></i><span>Chat</span></a>
    </li>
</ul>

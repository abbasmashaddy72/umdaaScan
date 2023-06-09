<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        {{-- <x-logo class="mr-auto" /> --}}
        <x-logo class="mr-auto">
            <span class="ml-3 text-lg text-white">
                {{ config('app.name', 'Laravel') }}
            </span>
        </x-logo>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <ul class="border-t border-white/[0.08] py-5 hidden">
        @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="my-6 menu__devider"></li>
            @else
                <li>
                    @can($menu['can'])
                        <a href="{{ isset($menu['route_name']) ? route($menu['route_name']) : 'javascript:;' }}"
                            class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}">
                            <div class="menu__icon">
                                <i data-feather="{{ $menu['icon'] }}"></i>
                            </div>
                            <div class="menu__title">
                                {{ $menu['title'] }}
                                @if (isset($menu['sub_menu']))
                                    <i data-feather="chevron-down"
                                        class="menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}"></i>
                                @endif
                            </div>
                        </a>
                    @endcan
                    @if (isset($menu['sub_menu']))
                        <ul class="{{ $first_level_active_index == $menuKey ? 'menu__sub-open' : '' }}">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li>
                                    @can($menu['can'])
                                        <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name']) : 'javascript:;' }}"
                                            class="{{ $second_level_active_index == $subMenuKey ? 'menu menu--active' : 'menu' }}">
                                            <div class="menu__icon">
                                                <i data-feather="activity"></i>
                                            </div>
                                            <div class="menu__title">
                                                {{ $subMenu['title'] }}
                                                @if (isset($subMenu['sub_menu']))
                                                    <i data-feather="chevron-down"
                                                        class="menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}"></i>
                                                @endif
                                            </div>
                                        </a>
                                    @endcan
                                    @if (isset($subMenu['sub_menu']))
                                        <ul
                                            class="{{ $second_level_active_index == $subMenuKey ? 'menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    @can($menu['can'])
                                                        <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name']) : 'javascript:;' }}"
                                                            class="{{ $third_level_active_index == $lastSubMenuKey ? 'menu menu--active' : 'menu' }}">
                                                            <div class="menu__icon">
                                                                <i data-feather="zap"></i>
                                                            </div>
                                                            <div class="menu__title">{{ $lastSubMenu['title'] }}</div>
                                                        </a>
                                                    @endcan
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</div>

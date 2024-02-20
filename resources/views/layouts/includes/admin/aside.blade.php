@php
    $links = [
        [
            'name' => 'Dashboard',
            'url' => route('post.posts.index'),
            'active' => request()->routeIs('post.posts'),
            'icon' => 'fa-solid fa-gauge-high',
            // 'can' => ['Acceso al dashboard']
        ],
        // [
        //     'name' => 'Categorías',
        //     'url' => route('post.categories.index'),
        //     'active' => request()->routeIs('admin.categories.*'),
        //     'icon' => 'fa-solid fa-inbox',
        //     'can' => ['Gestion de categorias']
        // ],
        // [
        //     'name' => 'Artículos',
        //     'url' => route('post.posts.index'),
        //     'active' => request()->routeIs('admin.posts.*'),
        //     'icon' => 'fa-solid fa-blog',
        //     'can' => ['Gestion de articulos']
        // ],
        // [
        //     'name' => 'Roles',
        //     'url' => route('post.roles.index'),
        //     'active' => request()->routeIs('admin.roles.*'),
        //     'icon' => 'fa-solid fa-user-tag',
        //     'can' => ['Gestion de roles']
        // ],
        // [
        //     'name' => 'Permisos',
        //     'url' => route('post.permissions.index'),
        //     'active' => request()->routeIs('admin.permissions.*'),
        //     'icon' => 'fa-solid fa-key',
        //     'can' => ['Gestion de permisos']
        // ],
        // [
        //     'name' => 'Usuarios',
        //     'url' => route('post.users.index'),
        //     'active' => request()->routeIs('admin.users.*'),
        //     'icon' => 'fa-solid fa-users',
        //     'can' => ['Gestion de usuarios']
        // ]
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        '-translate-x-full': !open,
        'transform-none': open,
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
            
                @canany($link['can'] ?? [null])
                    <li>

                        <a href="{{ $link['url'] }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">

                            <i class="{{$link['icon']}} text-gray-500"></i>

                            <span class="ml-3">
                                {{ $link['name'] }}
                            </span>
                        </a>
                    </li>
                @endcanany

            @endforeach
        </ul>
    </div>
</aside>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
    <script src="https://cdn.tiny.cloud/1/09p8d9e28h6zjk2jhpnl1y2vfk1s84vjydyb1f0naz1f4f3z/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen font-sans antialiased bg-base-200">
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            <x-app-brand class="px-5 pt-4" />
            <x-menu activate-by-route>
                @if($user = auth()->user())
                    <x-menu-separator />
                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>
                    <x-menu-separator />
                @endif

                <x-menu-item title="Home" icon="o-sparkles" link="/" />
                @if($user && $user->hasRole('admin'))
                    <x-menu-item title="Users" icon="o-users" link="/users" />
                @endif
                @if($user &&  $user->hasRole('senior_writer'))
                    <x-menu-item title="Posts" icon="o-adjustments-horizontal" link="/posts" />
                @endif
                @if($user && ($user->hasRole('admin') || $user->hasRole('writer') || $user->hasRole('senior_writer')))
                    <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                        <x-menu-item title="Archives" icon="o-archive-box" link="####" />
                    </x-menu-sub>
                @endif
            </x-menu>
        </x-slot:sidebar>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    <x-toast />
</body>
</html>
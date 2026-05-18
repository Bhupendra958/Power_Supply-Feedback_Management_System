<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Feedback of Power Supply Position' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <div class="mx-auto min-h-screen max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <nav class="app-navbar">
            <a href="{{ route('home') }}" class="app-brand">
                <span class="app-brand-mark">PS</span>
                <span>
                    <span class="block text-sm font-extrabold leading-tight text-white">Power Supply</span>
                    <span class="block text-xs font-semibold text-cyan-100/70">Feedback Portal</span>
                </span>
            </a>
            <div class="app-nav-links">
                @guest
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active nav-link-glow' : '' }}">Home</a>
                @endguest
                @guest
                    <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'nav-link-active nav-link-glow' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'nav-link-active nav-link-glow' : '' }}">Registration</a>
                @endguest
                @auth
                    @php
                        $readAt = session('notifications_read_at');
                        $unreadNotifications = \App\Models\Feedback::query()
                            ->where('user_id', auth()->id())
                            ->where('feedback_type', 'complaint')
                            ->where('overall_satisfaction', '<=', 3)
                            ->when($readAt, fn ($query) => $query->where('created_at', '>', $readAt))
                            ->count();
                        $unreadNotifications += $readAt ? 0 : 3;
                        if (auth()->user()->isAdmin()) {
                            $unreadNotifications += $readAt
                                ? \App\Models\AdminNotification::where('category', 'admin')->where('created_at', '>', $readAt)->count()
                                : \App\Models\AdminNotification::where('category', 'admin')->count();
                        } else {
                            $unreadNotifications += $readAt
                                ? \App\Models\AdminNotification::where('category', 'tracking_completed')->where('recipient_user_id', auth()->id())->where('created_at', '>', $readAt)->count()
                                : \App\Models\AdminNotification::where('category', 'tracking_completed')->where('recipient_user_id', auth()->id())->count();
                        }
                    @endphp
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active nav-link-glow' : '' }}">Home</a>
                        <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'nav-link-active nav-link-glow' : '' }}">Admin</a>
                        <a href="{{ route('admin.technicians') }}" class="nav-link {{ request()->routeIs('admin.technicians') ? 'nav-link-active nav-link-glow' : '' }}">Technicians</a>
                    @else
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active nav-link-glow' : '' }}">Home</a>
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'nav-link-active nav-link-glow' : '' }}">Dashboard</a>
                        <a href="{{ route('feedback.create') }}" class="nav-link {{ request()->routeIs('feedback.create') ? 'nav-link-active nav-link-glow' : '' }}">Feedback</a>
                        <a href="{{ route('feedback.index') }}" class="nav-link {{ request()->routeIs('feedback.index') ? 'nav-link-active nav-link-glow' : '' }}">Responses</a>
                        <a href="{{ route('complaints.tracking') }}" class="nav-link {{ request()->routeIs('complaints.tracking') ? 'nav-link-active nav-link-glow' : '' }}">Tracking</a>
                        <a href="{{ route('emergency') }}" class="nav-link {{ request()->routeIs('emergency') ? 'nav-link-active nav-link-glow' : '' }}">Emergency</a>
                    @endif
                    <a href="{{ route('assistant') }}" class="nav-link {{ request()->routeIs('assistant') ? 'nav-link-active nav-link-glow' : '' }}">AI Assistant</a>
                    <a href="{{ route('notifications') }}" class="nav-link {{ request()->routeIs('notifications') ? 'nav-link-active nav-link-glow' : '' }}">
                        Notifications
                        @if ($unreadNotifications > 0)
                            <span class="ml-1 rounded-full bg-rose-300 px-2 py-0.5 text-xs font-extrabold text-slate-950">{{ $unreadNotifications }}</span>
                        @endif
                    </a>
                    <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'nav-link-active nav-link-glow' : '' }}">Profile</a>
                    <form action="{{ route('logout') }}" method="POST" class="contents">
                        @csrf
                        <button type="submit" class="nav-link nav-link-logout">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>

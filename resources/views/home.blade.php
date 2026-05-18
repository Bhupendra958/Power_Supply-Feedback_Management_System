@extends('layouts.app')

@section('content')
    <section class="page-stage page-bg page-bg-home grid gap-8 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
        <div class="flow-ribbon flow-ribbon-one"></div>
        <div class="flow-ribbon flow-ribbon-two"></div>
        <div class="page-orb-amber animate-orbit -top-10 left-[8%] h-40 w-40"></div>
        <div class="page-orb-sky animate-drift right-[12%] top-24 h-52 w-52"></div>
        <div class="page-orb-slate animate-pulse-soft bottom-8 left-[36%] h-44 w-44"></div>

        <div class="hero-card animate-rise-in animate-card-float relative overflow-hidden">
            <div class="animate-drift absolute -right-10 top-6 h-36 w-36 rounded-full bg-amber-300/20 blur-3xl"></div>
            <div class="animate-pulse-soft absolute -left-10 bottom-0 h-28 w-28 rounded-full bg-sky-200/10 blur-3xl"></div>
            <p class="animate-rise-in text-sm uppercase tracking-[0.3em] text-amber-300 delay-150">Home Page</p>
            <h1 class="animate-rise-in mt-4 max-w-3xl text-4xl font-extrabold leading-tight sm:text-5xl delay-300">
                Welcome to the Power Supply Position Feedback Portal
            </h1>
            <p class="animate-rise-in mt-5 max-w-2xl text-base text-slate-200 delay-450">
                This project helps teams collect clear, organized feedback about the power supply position. Users can
                register, log in, submit feedback, and review responses in one place.
            </p>
            <div class="animate-rise-in mt-8 flex flex-wrap gap-4 delay-600">
                @guest
                    <a href="{{ route('login') }}" class="accent-button">Login</a>
                    <a href="{{ route('register') }}" class="primary-button border border-white/20">Registration</a>
                @else
                    <a href="{{ route('feedback.create') }}" class="accent-button">Submit Feedback</a>
                    <a href="{{ route('feedback.index') }}" class="primary-button border border-white/20">View Responses</a>
                @endguest
            </div>
        </div>

        <div class="grid gap-5">
            <div class="panel-card animate-rise-in p-6 delay-300">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-amber-600">Purpose</p>
                <h2 class="mt-3 text-2xl font-bold text-slate-900">A simple system for better workplace insight</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Capture employee views on safety, equipment, workstation quality, and overall satisfaction for the
                    power supply role.
                </p>
            </div>
            <div class="panel-card grid gap-4 p-6 sm:grid-cols-3">
                <div class="feature-tile animate-rise-in delay-300">
                    <p class="text-3xl font-extrabold text-ink-900">01</p>
                    <p class="mt-2 text-sm font-semibold">Register</p>
                    <p class="mt-1 text-sm text-slate-600">Create a personal account to access the system.</p>
                </div>
                <div class="feature-tile animate-rise-in delay-450">
                    <p class="text-3xl font-extrabold text-ink-900">02</p>
                    <p class="mt-2 text-sm font-semibold">Login</p>
                    <p class="mt-1 text-sm text-slate-600">Enter securely and continue to the feedback form.</p>
                </div>
                <div class="feature-tile animate-rise-in delay-600">
                    <p class="text-3xl font-extrabold text-ink-900">03</p>
                    <p class="mt-2 text-sm font-semibold">Respond</p>
                    <p class="mt-1 text-sm text-slate-600">Share insights that help improve the position.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

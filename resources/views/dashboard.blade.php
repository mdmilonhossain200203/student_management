
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title">Welcome to Dashboard</h3>
                <p class="card-text">
                    You are successfully logged in!
                </p>

                <a href="#" class="btn btn-primary">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

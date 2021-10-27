@extends('home')
@section('main')
    <div class="row row-x-center s-styles">
        <div class="column large-6 tab-12">
            <!-- Session Status -->
            <x-auth.session-status :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth.validation-errors :errors="$errors" />
            <h3 class="h-add-bottom">@lang('Profile')</h3>
            <form class="h-add-bottom" method="POST" action="{{ route('profile') }}">
            @csrf
            @method('PUT')

            <!-- Name -->
                <div>
                    <label for="name">@lang('Name')</label>
                    <input
                        id="name"
                        class="h-full-width"
                        type="text"
                        name="name"
                        placeholder="@lang('Your name')"
                        value="{{ old('name', auth()->user()->name) }}"
                        required
                        autofocus>
                </div>
                <!-- Email Address -->
                <div>
                    <label for="email">@lang('Email')</label>
                    <input
                        id="email"
                        class="h-full-width"
                        type="email"
                        name="email"
                        placeholder="@lang('Your email')"
                        value="{{ old('email', auth()->user()->email) }}"
                        required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password">@lang('Password') (@lang('optional'))</label>
                    <input
                        id="password"
                        class="h-full-width"
                        type="password"
                        name="password"
                        placeholder="@lang('Your Password if you want to change it')">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation">@lang('Confirm Password')</label>
                    <input
                        id="password_confirmation"
                        class="h-full-width"
                        type="password"
                        name="password_confirmation"
                        placeholder="@lang('Confirm your Password')">
                </div>
                <x-auth.submit title="Save" />

            </form>
        </div>
    </div>
@endsection

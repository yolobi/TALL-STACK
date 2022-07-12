<div class="min-h-screen w-full flex justify-center items-center">
    <div x-data="{ tab: @entangle('tab')}" class="bg-white shadow p-4 rounded-lg">
        @if (session()->has('success'))
            <h1>{{ session('success') }}</h1>
        @elseif(session()->has('wrong password'))
            <h1>{{ session('wrong password') }}</h1>
        @endif
        <div>
            <button
                @class(['rounded-t p-2 text-xs text-gray-600', 
                'bg-gray-300' => $tab !== 'login',
                'bg-gray-100' => $tab === 'login']) 
                @click="tab = 'login'"
                >
                Login
            </button>

            <button
                @class(['rounded-t p-2 text-xs text-gray-600', 
                'bg-gray-300' => $tab !== 'register',
                'bg-gray-100' => $tab === 'register'])  
                @click="tab = 'register'"
                >
                Register
            </button>
        </div>
        <div class="bg-gray-100 p-1">
            <div x-show="tab == 'login'">
                @livewire('login')
            </div>
            <div x-show="tab == 'register'">
                @livewire('register')
            </div>
        </div>
    </div>
</div>

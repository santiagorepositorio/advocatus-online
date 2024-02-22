{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<!-- component -->
<x-app-layout>
    <!-- component -->
    <div class="py-6">
        <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                style="background-image:url({{ asset('assets/imgs/themis.png') }})">
            </div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-2xl font-semibold text-gray-700 text-center">Registra tus datos</h2>


                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                        <input id="name"
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="text" name="name">
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input id="email"
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="email" name="email">
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">No de Celular</label>
                        {{-- <input id="phone"
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="phone" name="phone"> --}}                      
                           

                            <input id="phone"
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="tel" 
                            name="phone" 
                            placeholder="Escriba su numero +591-XXXXXXXX"
                            oninput="this.value = '591' + this.value.replace(/[^0-9]/g, '').slice(3, 11)">
                    </div>

                    <div class="flex flex-col my-4">
                        <div class="flex justify-between">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        </div>
                        <div x-data="{ show: false }" class="relative flex items-center mt-2">
                            <input :type="show ? 'text' : 'password'" id="password"
                                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password" name="password">
                            <button @click="show = !show" type="button"
                                class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                    </path>
                                </svg>

                                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col my-4">
                        <div class="flex justify-between">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Confima el Password</label>
                        </div>
                        <div x-data="{ show: false }" class="relative flex items-center mt-2">
                            <input :type="show ? 'text' : 'password'" name="password_confirmation"
                                id="password_confirmation"
                                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password">
                            <button @click="show = !show" type="button"
                                class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                    </path>
                                </svg>

                                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mt-4">
                        {{-- <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Login</button> --}}
                        <x-jet-button
                            class="bg-blue-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">
                            {{ __('Registrate') }}
                        </x-jet-button>
                    </div>

                </form>

                <div class="mt-2 flex items-center justify-between">
                    <span class="border-b w-1/4 lg:w-1/4"></span>
                    <a href="#" class="text-xs text-center text-gray-500 uppercase">O Registrate con Redes
                        Sociales</a>
                    <span class="border-b w-1/4 lg:w-1/4"></span>
                </div>
                <div class="mt-2 flex items-center justify-between gap-3">
                    <a href="{{ route('auth.google-redirect') }}"
                        class="btn btn-block flex items-center justify-center space-x-2 text-gray-600 my-2 py-2 bg-gray-100 hover:bg-gray-200 rounded">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 326667 333333"
                            shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                            image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M326667 170370c0-13704-1112-23704-3518-34074H166667v61851h91851c-1851 15371-11851 38519-34074 54074l-311 2071 49476 38329 3428 342c31481-29074 49630-71852 49630-122593m0 0z"
                                fill="#4285f4"></path>
                            <path
                                d="M166667 333333c44999 0 82776-14815 110370-40370l-52593-40742c-14074 9815-32963 16667-57777 16667-44074 0-81481-29073-94816-69258l-1954 166-51447 39815-673 1870c27407 54444 83704 91852 148890 91852z"
                                fill="#34a853"></path>
                            <path
                                d="M71851 199630c-3518-10370-5555-21482-5555-32963 0-11482 2036-22593 5370-32963l-93-2209-52091-40455-1704 811C6482 114444 1 139814 1 166666s6482 52221 17777 74814l54074-41851m0 0z"
                                fill="#fbbc04"></path>
                            <path
                                d="M166667 64444c31296 0 52406 13519 64444 24816l47037-45926C249260 16482 211666 1 166667 1 101481 1 45185 37408 17777 91852l53889 41853c13520-40185 50927-69260 95001-69260m0 0z"
                                fill="#ea4335"></path>
                        </svg>
                        <span>Google</span>
                    </a>
                    <a href="{{ route('auth.redirect') }}"
                        class="btn btn-block flex items-center justify-center space-x-2 text-gray-600 my-2 py-2 bg-gray-100 hover:bg-gray-200 rounded">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 124.8 123.36">
                            <defs>
                                <style>
                                    .cls-1,
                                    .cls-2 {
                                        fill: none;
                                    }

                                    .cls-1 {
                                        clip-rule: evenodd;
                                    }

                                    .cls-3 {
                                        clip-path: url(#clip-path);
                                    }

                                    .cls-4 {
                                        clip-path: url(#clip-path-2);
                                    }

                                    .cls-5 {
                                        fill: #fff;
                                    }
                                </style>
                                <clipPath id="clip-path" transform="translate(0.69 0.51)">
                                    <path class="cls-1"
                                        d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z">
                                    </path>
                                </clipPath>
                                <clipPath id="clip-path-2" transform="translate(0.69 0.51)">
                                    <rect class="cls-2" width="122.88" height="122.31"></rect>
                                </clipPath>
                            </defs>
                            <g class="cls-3">
                                <g class="cls-4">
                                    <image width="260" height="257"
                                        transform="matrix(0.48, 0, 0, -0.48, 0, 123.36)"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQQAAAEBCAYAAACexdu5AAAACXBIWXMAABcRAAAXEQHKJvM/AAAEFUlEQVR4Xu3dwXEdIRBFUb4kZ+HwHJbDcxrSeAG+hctVJgDO2cyG9aumoYfX8zzP68evAdzr+fl9jDHG22EdcJGPMcZ4vV6ndcAFPubn+f8q4Aq2DEBmhWDLAAxbBmCzAkGFAKgQgM3qIRxWAVdwygBkVQhyAdBUBDZKAyCaikBmIDxfh2XADda0o50DUFNRhQBoKgIbgQBEIABx7AhEhQBEIACZW4a398My4AYqBCACAYhZBiCrh6BQAFQIwGZOO55WAVewVwDin4pAVlNRIACaisDG689ANBWBeLkJyOoheP0Z8Bw8sNFUBKJCAKKbCEQgAHHsCGQ99npaBtxAaQDEsSMQ045ANBWBqBCAKA2AeA4eiAoBiEAAIhCA6CEAUSEAWcNNcgEwywBs3FQEYpYBiAoByHr9WYUAqBCAzXqXwSkD4KEWYOPqMhDHjkBsGYCYZQCyjh1VCEAXk3QVAT0EYCMQgDh2BLIqBLMMQBXC+2EZcAPTjkD0EICsm4qnZcANlAZAjD8D0VQEoqkIxNVlIEoDIJqKQOY9hNMq4AoqBCB6CEDWL9RMOwIqBGDjbUcgq6noYhJglgHYaCoCWRXC52EZcIP1xyRNRaAK4bAKuIKry0D8IAWIl5uAqBCA+IUakFUh6CoCph2BzbqHYMsAuIcAbGwZgPhBChAVApA17XhaBtxAhQBEIAARCEAEAhCzDEBMOwKxZQAiEIAYbgJilgGILQOQOctwWgVcQQ8BiC0DkPUcvFwA+smql5sALzcBG8NNQGwZgKx/KtoyAO4hABulARBNRSCaikDcQwCiqQjElgHIqhDeD8uAG6xfqKkQADcVgY2mIhBNRSCaikBWhfB5WAbcwCwDEMcLQNax42kZcAMVAhCBAMTFJCDr5Sb3EAA3FYHNPGVQIQBDUxHYuLoMRFMRiKYiEBUCEBeTgDhlADLvIZxWAVfwgxQgtgxANBWBzED4clMR7vZtjOEeArBxUxGIHgIQ/0MAYvwZGLUTD6uAi8xY0EQAhqYisHEPAYimIjDGmEWB8Wcgxp+BOHYEoqkIRFMRGH82C7YMQAw3AfkYY4zH/xDgcnOzoEIAYpYBiKYiEIEAxJYBiAoBiGlHILYMQPxTEYiXm4Dx103F8aa3CDhlADa2DMCwZQD+oUIAxt/jz/9dCNzCb9iBaB4AEQhAzDIAUSEAEQhAnDIAUSEAcTEJiFMGIAIByBpuOqwCrqBCACIQgNgyAFEhAHExCYhAADJvKtoyAEOFAGwEAhCBAEQgAHEPAYgKAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCA/AafC2PbZ0osjAAAAABJRU5ErkJggg==">
                                    </image>
                                </g>
                            </g>
                            <path class="cls-5"
                                d="M85.36,78.92l2.72-17.76H71V49.63c0-4.86,2.38-9.59,10-9.59H88.8V24.92a94.45,94.45,0,0,0-13.75-1.2c-14,0-23.21,8.5-23.21,23.9V61.16H36.24V78.92h15.6v43.57H71V78.92Z"
                                transform="translate(0.69 0.51)"></path>
                        </svg>
                        <span>Facebook</span>
                    </a>
                </div>
                <div class="mt-2 flex items-center justify-between">
                    <span class="border-b w-1/5 md:w-1/8"></span>
                    <p class="text-center text-sm text-gray-600 mt-2">Si ya tienes una Cuenta? </p>
                    <a href="{{ route('login') }}"
                        class="text-blue-600 text-center hover:text-blue-700 hover:underline" title="Sign In">Inicia
                        Sesión</a>
                    <span class="border-b w-1/5 md:w-1/8"></span>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

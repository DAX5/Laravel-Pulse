<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('metrics.generateJob') }}">
                        <x-primary-button>
                            Dispatch Job
                        </x-primary-button>
                    </a>
                    <a href="{{ route('metrics.generateSlowJob') }}">
                        <x-primary-button>
                            Dispatch Slow Job
                        </x-primary-button>
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('metrics.generateSlowQuery') }}">
                        <x-primary-button>
                            Make Slow Query
                        </x-primary-button>
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('metrics.hitCache') }}">
                        <x-primary-button>
                            Hit Cache
                        </x-primary-button>
                    </a>
                    <a href="{{ route('metrics.forgetCache') }}">
                        <x-primary-button>
                            Forget Cache
                        </x-primary-button>
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('metrics.slowRequest') }}">
                        <x-primary-button>
                            Slow Request
                        </x-primary-button>
                    </a>
                    <a href="{{ route('metrics.slowOutgoingRequest') }}">
                        <x-primary-button>
                            Slow Outgoing Request
                        </x-primary-button>
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('metrics.makeException') }}">
                        <x-primary-button>
                            Make Exception
                        </x-primary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

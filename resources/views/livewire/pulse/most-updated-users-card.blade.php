<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Most Updated Users">
        <x-slot:icon>
            <x-pulse::icons.arrows-left-right />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        @foreach ($updatedRegisters as $updatedRegister)
            <x-pulse::user-card wire:key="{{ $updatedRegister->key }}" :user="$updatedRegister->user">
                <x-slot:stats>
                    {{ $updatedRegister->count }}
                </x-slot:stats>
            </x-pulse::user-card>
        @endforeach
    </x-pulse::scroll>
</x-pulse::card>

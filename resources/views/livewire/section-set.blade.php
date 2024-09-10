<div x-data="{timer: 50}" x-init="setInterval(() => {
    if (timer > 1) { timer--;}
    else{ {{session()->remove('success')}} }
    }, 1000);">


@if(session()->has('success'))
        <div class="bg-green-600 py-3 text-center text-white w-full">
            {{ session()->get('success') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Section
        </h2>
    </x-slot>
    <div class="container flex flex-col items-center justify-center mt-[100px] text-black/70">
        <form wire:submit.prevent="submit" class="w-1/2 mt-10">
            @csrf
            <div>
                <x-input-label class="mb-2 ">Section</x-input-label>
                <x-text-input wire:model="section" class="w-full placeholder:text-sm" placeholder="What section do you want to add"></x-text-input>

                <div class="mt-4">
                    <x-primary-button>Submit</x-primary-button>
                </div>
            </div>
        </form>
    </div>

</div>

@php
    $arr = ['a','b','c','d','e']
@endphp

<div>

    @if(session()->has('success'))
        <div class="bg-green-600 py-3 text-center text-white w-full">
            {{ session()->get('success') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Set Questions
        </h2>
    </x-slot>
    <div class="container flex flex-col items-center justify-center mt-[60px] text-black/70">
        <form wire:submit.prevent="submit" class="w-1/2 mt-10">
            @csrf
            <div>
                <x-input-label class="mb-2">Question</x-input-label>
                <x-text-input wire:model="question" class="w-full placeholder:text-sm" placeholder="Enter a question"></x-text-input>
                @error('question')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-2">

                <x-input-label class="mb-2 ">Section</x-input-label>
                <select wire:model.lazy="section" class="border-gray-300 w-1/4 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sms">
                    <option disabled>Select a section...</option>
                    @foreach($sections as $item)

                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                @error('section')
                <div class="text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-8">
                <div class="">
                    <x-input-label class="mb-2 text-center">Options</x-input-label>
                </div>
                @foreach($options as $index => $option)
                    <x-input-label class="mb-2 text-xs">Option {{ $index + 1 }}</x-input-label>
                    <div class="flex justify-between items-center gap-7">
                        <x-text-input placeholder="Give an answer" class="placeholder:text-sm w-full mb-2" wire:model.defer="options.{{ $index }}"></x-text-input>
                        <button type="button" wire:click="removeOption" class="text-red-500 pb-2 text-sm">Delete</button>
                    </div>
                @endforeach
                @error('options')
                <div class="text-red-500">
                    {{ $message }}
                </div>
                @enderror
                @if($optionsCount < 5)
                    <x-secondary-button class="mt-4" wire:click="addOption">Add Option</x-secondary-button>
                @endif
                <div class="mt-6">
                    @if($optionsCount > 1)
                        <x-input-label class="mb-2">Correct Answer</x-input-label>
                        <select name="" id="" wire:model="correctAnswer" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sms">
                            @for($i = 0; $i < $optionsCount; $i++)
                                <option value="{{ $i }}">{{ $arr[$i] }}</option>
                            @endfor
                        </select>
                        @error('correctAnswer')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mt-4">
                            <x-primary-button>Submit</x-primary-button>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

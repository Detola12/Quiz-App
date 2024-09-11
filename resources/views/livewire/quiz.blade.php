<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Quiz
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="py-6 px-12 text-gray-900">
                    <div class="mb-4">
                        <div class="">
                            <div class="leading-5 text-xs text-gray-700 flex justify-between">
                                <p>Question {{ $count + 1 }}</p>
                                <p>1 Point(s)</p>
                            </div>
                            <h2 class="text-[37px] font-semibold mt-2">{{ $question->description }}</h2>
                        </div>

                        <div class="flex items-center me-4 mt-4 gap-2">
                            <input wire:key="{{ $count }}" wire:model.defer="answers.{{ $question->id }}" value="a" type="radio" id="answers.{{ $count }}" name="answers.{{ $count }}" class="w-4 h-4 text-gray-600 bg-white border-gray-300 focus:ring-gray-500 focus:ring-2">
                            <label class="ms-2 text-sm font-light text-gray-900" for="answers.{{ $count }}">{{ $question->answer_a }}</label>
                        </div>
                        <div class="flex items-center me-4 mt-4 gap-2">
                            <input wire:key="{{ $count }}" wire:model.defer="answers.{{ $question->id }}" value="b" type="radio" id="answers.{{ $count }}" name="answers.{{ $count }}" class="w-4 h-4 text-gray-600 bg-white border-gray-300 focus:ring-gray-500 focus:ring-2">
                            <label class="ms-2 text-sm font-light text-gray-900" for="answers.{{ $count }}">{{ $question->answer_b }}</label>
                        </div>
                        <div class="flex items-center me-4 mt-4 gap-2">
                            <input wire:key="{{ $count }}" wire:model.defer="answers.{{ $question->id }}" value="c" type="radio" id="answers.{{ $count }}" name="answers.{{ $count }}" class="w-4 h-4 text-gray-600 bg-white border-gray-300 focus:ring-gray-500 focus:ring-2">
                            <label class="ms-2 text-sm font-light text-gray-900" for="answers.{{ $count }}">{{ $question->answer_c }}</label>
                        </div>
                        <div class="flex items-center me-4 mt-4 gap-2">
                            <input wire:key="{{ $count }}" wire:model.defer="answers.{{ $question->id }}" value="d" type="radio" id="answers.{{ $count }}" name="answers.{{ $count }}" class="w-4 h-4 text-gray-600 bg-white border-gray-300 focus:ring-gray-500 focus:ring-2">
                            <label class="ms-2 text-sm font-light text-gray-900" for="answers.{{ $count }}">{{ $question->answer_d }}</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-10 flex justify-between">
                    <x-secondary-button class="@if($count > 0)  invisible @endif" wire:click="previous">Previous</x-secondary-button>
                @if($count < $questionCount)
                    <x-secondary-button class="" wire:click="next">Next</x-secondary-button>
                    @else
                    <x-secondary-button wire:click="next">Submit</x-secondary-button>

                @endif
            </div>
        </div>
    </div>
</div>

<div>

    <x-slot name="header">
        <h2 class="text-xl text-black/80 font-semibold">
            Questions
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('question.set') }}"
                           class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700">
                            Create Question
                        </a>
                    </div>

                    <div class="mb-4">
                        <table class="w-full border">
                            <thead>
                            <tr>
                                <th class="bg-gray-50 w-[30px] px-6 py-3 text-left">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">ID</span>
                                </th>
                                <th class="bg-gray-50 px-6 w-[30px] py-3 text-left">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Section</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Text</span>
                                </th>
                                <th class="w-40 bg-gray-50 px-6 py-3 text-left">

                                </th>
                            </tr>
                            </thead>

                            <tbody wire:poll class="bg-white divide-y divide-gray-200 divide-solid">
                            @forelse($questions as $question)
                                <tr wire:key="{{ $question->id }}" class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $question->id }}
                                    </td>
                                    <td class=" px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $question->section->name }}
                                    </td>
                                    <td class="px-6 py-4 leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $question->description }}
                                    </td>
                                    <td>
                                        <a href="{{ route('question.edit', $question->id) }}"
                                           class="inline-flex items-center rounded-md border border-gray-800  px-4 py-2 text-xs font-semibold uppercase tracking-widest text-black hover:border-transparent hover:text-white hover:bg-gray-700">
                                            Edit
                                        </a>
                                        <button x-on:click="$wire.delete({{ $question->id }})" class="rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs uppercase text-white hover:bg-red-300 hover:text-red-700">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"
                                        class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                                        No questions were found.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                        {{ $questions->links() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

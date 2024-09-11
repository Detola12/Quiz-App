<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center">
                    <p>
                        {{ __("You're logged in!") }}
                    </p>
                    <x-primary-button disabled>Take a Quiz</x-primary-button>
                </div>
                <div class="mt-10">
                    <table class="w-full border">
                        <thead>
                        <tr>
                            <th class="bg-gray-50 w-[250px] px-6 py-3 text-left">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">First Name</span>
                            </th>
                            <th class="bg-gray-50 px-6 w-[250px] py-3 text-left">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Last Name</span>
                            </th>
                            <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span
                                            class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Test Score</span>
                            </th>
                            <th class="w-40 bg-gray-50 px-6 py-3 text-left">

                            </th>
                        </tr>
                        </thead>

                        <tbody wire:poll class="bg-white divide-y divide-gray-200 divide-solid">
                            <tr>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                    Emmanuel
                                </td>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                    Adegboye
                                </td>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                    10/20
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>


</x-app-layout>

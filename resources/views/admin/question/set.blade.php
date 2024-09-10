<x-app-layout>
    <div class="container flex flex-col items-center justify-center mt-[80px] text-black/70">
        <h2 class="text-2xl">Set Question</h2>
        <form class="w-1/2 mt-10">
            <div>
                <x-input-label class="mb-2">Question</x-input-label>
                <x-text-input class="w-full"></x-text-input>
            </div>
            <div class="mt-4">
                <x-input-label class="mb-2">Options</x-input-label>
                <x-primary-button>Add Option</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

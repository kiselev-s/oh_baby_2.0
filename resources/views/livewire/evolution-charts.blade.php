<div class="container mx-auto space-y-4 p-4 sm:p-0">

    @if(!$showAdd)
        <div class="flex justify-end">
            <a href="#"
               wire:click.prevent="add()"
               type="button"
               class="inline-flex items-center shadow-sm p-2 rounded border-gray-300 dark:border-gray-600 border text-indigo-300 dark:text-blue-400 ease-in-out duration-150 hover:text-white dark:hover:text-indigo-900 bg-white dark:bg-gray-700 hover:bg-indigo-500 dark:hover:bg-gray-600 focus:outline-none"
            >
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    @else
        @include('livewire.modals.add-evolution')
    @endif

    <div class="shadow rounded p-4 border dark:border-blue-300 bg-white dark:bg-gray-800" style="height: 32rem;">
        <livewire:livewire-line-chart
            key="{{ $ChartModel->reactiveKey() }}"
            :line-chart-model="$ChartModel"
        />
    </div>

    @include('.livewire.modals.view-evolution-data')
</div>

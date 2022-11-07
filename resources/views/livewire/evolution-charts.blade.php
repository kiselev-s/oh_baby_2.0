<div class="container mx-auto space-y-4 p-4 sm:p-0">

    @if(!$showAdd)
        <div class="flex justify-end">
            <a href="#"
               wire:click.prevent="add()"
               type="button"
               class="inline-flex items-center shadow-sm p-2 rounded border-gray-300 border text-indigo-300 ease-in-out duration-150 hover:text-white bg-white hover:bg-indigo-500 focus:outline-none"
            >
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    @else
        @include('livewire.add-evolution')
    @endif

{{--    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="travel" wire:model="types"/>--}}
{{--            <span>Travel</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="shopping" wire:model="types"/>--}}
{{--            <span>Shopping</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="8" wire:model="types"/>--}}
{{--            <span>8</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="entertainment" wire:model="types"/>--}}
{{--            <span>Entertainment</span>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <input type="checkbox" value="other" wire:model="types"/>--}}
{{--            <span>Other</span>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">--}}
{{--        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">--}}
{{--            <livewire:livewire-column-chart--}}
{{--                key="{{ $columnChartModel->reactiveKey() }}"--}}
{{--                :column-chart-model="$columnChartModel"--}}
{{--            />--}}
{{--        </div>--}}
{{--        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">--}}
{{--            <livewire:livewire-pie-chart--}}
{{--                key="{{ $pieChartModel->reactiveKey() }}"--}}
{{--                :pie-chart-model="$pieChartModel"--}}
{{--            />--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">
        <livewire:livewire-line-chart
            key="{{ $ChartModel->reactiveKey() }}"
            :line-chart-model="$ChartModel"
        />
{{--    </div>--}}
{{--    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">--}}
{{--        <livewire:livewire-line-chart--}}
{{--            key="{{ $lineChartModel->reactiveKey() }}"--}}
{{--            :line-chart-model="$lineChartModel"--}}
{{--        />--}}
{{--    </div>--}}
{{--    <div class="shadow rounded p-4 border bg-white" style="height: 32rem;">--}}
{{--        <livewire:livewire-area-chart--}}
{{--            key="{{ $areaChartModel->reactiveKey() }}"--}}
{{--            :area-chart-model="$areaChartModel"--}}
{{--        />--}}
{{--    </div>--}}
</div>

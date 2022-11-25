<div class="container mx-auto space-y-4 p-4 sm:p-0">

    @include('livewire.modals.view-visit-doc-statistics')

    <div id="chartContainer" class="chartContainer flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="shadow rounded p-4 border dark:border-none bg-white dark:bg-gray-800 shadow-lg dark:shadow-blue-900 flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $columnChartModel->reactiveKey() }}"
                :column-chart-model="$columnChartModel"
            />
        </div>
        <div class="shadow rounded p-4 border dark:border-none bg-white dark:bg-gray-800 shadow-lg dark:shadow-blue-900 flex-1" style="height: 32rem;">
            <livewire:livewire-pie-chart
                key="{{ $pieChartModel->reactiveKey() }}"
                :pie-chart-model="$pieChartModel"
            />
        </div>
    </div>
</div>

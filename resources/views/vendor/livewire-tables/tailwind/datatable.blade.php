@if($showImage)
    <div class="flex flex-wrap">
        <div class="w-full sm:w-1/2 p-4">
            @endif
            <div>
                <div
                        class="relative"
                        @if ($refresh)
                            @if ($refreshInSeconds)
                                wire:poll.{{ $refreshInSeconds * 1000 }}ms
                        @else
                            wire:poll
                        @endif
                        @endif
                >
                    <div class="flex-col">
                        @include('livewire-tables::tailwind.includes.sorting-pills')
                        @include('livewire-tables::tailwind.includes.filter-pills')
                        <div class="">
                            @includeWhen($debugEnabled,'livewire-tables::tailwind.includes.debug')
                            @includeWhen($offlineIndicator,'livewire-tables::tailwind.includes.offline')
                            <div class="md:flex md:justify-between mb-6">
                                <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">
                                    @includeWhen($showSearch,'livewire-tables::tailwind.includes.search')
                                    @includeWhen($showFilters, 'livewire-tables::tailwind.includes.filters')
                                </div>

                                <div class="md:flex md:items-center space-y-4 md:space-y-0">
                                    <div>@includeWhen($paginationEnabled && $showPerPage,'livewire-tables::tailwind.includes.per-page')</div>
                                    <div class="flex justify-end">
                                        @if($this->hasNewResource() && !$showImage)
                                            @include('livewire.modals.add-health')
                                        @elseif($this->hasNewResource() && $showImage)
                                            @include('livewire.modals.add-docs')
                                            @include('livewire.modals.edit-docs')
                                            @include('livewire.modals.edit-image')
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @include('livewire-tables::tailwind.includes.table')
                            @includeWhen($showPagination,'livewire-tables::tailwind.includes.pagination')
                        </div>
                    </div>
                </div>
            </div>
            @if($showImage)
        </div>
        @include('livewire.components.sliders.image-view')
    </div>
@endif

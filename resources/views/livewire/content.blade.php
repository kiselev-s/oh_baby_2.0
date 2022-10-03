<div>
    Content
    <div>
        <button type="button"
                class="inline-flex items-center border bg-orange-500 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
            Button
        </button>
    </div>
    <h1>TeamId: {{$teamId}}</h1>
    <h1>Parent: {{$userName}}</h1>
    <h1>Child: {{$childName}}</h1>
    @foreach($children as $child)
        <div>{{$child->first_name}}</div>
    @endforeach
    {{--    @livewire('upload-photo')--}}
    @include('sliders.image-view-2')
</div>

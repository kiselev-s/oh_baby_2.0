<div>
{{--<div class="flex rounded-full overflow-hidden w-12">--}}
{{--    <img--}}
{{--        class="rounded-full object-bottom"--}}
{{--        src="{{URL::asset('storage/'.$imagesChild[0]->path)}}"--}}
{{--        alt="image of {{$imagesChild[0]->title}}"--}}
{{--    >--}}
    <div class="w-12 h-12">
{{--        <img class="w-full h-full object-cover rounded-full" src='{{URL::asset('storage/'.$imagesChild[0]->path)}}'>--}}
        <img class="w-full h-full object-cover rounded-full" src='{{URL::asset('storage/'.$preview[$id])}}'>
    </div>
{{--</div>--}}
</div>


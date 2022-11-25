<ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">

    @foreach($nameCheck as $key => $name)
        <li>
            <input type="checkbox" value="{{$name}}" wire:model.prevent="name"/>
            <span>{{$name}}</span>
        </li>
    @endforeach

</ul>

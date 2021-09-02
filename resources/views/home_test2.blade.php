@extends('layout_test2')

@section('title')
    Home
@endsection

@section('main_content')
    <div class="cntr">
        <h3>Home</h3>
    </div>

{{--        @foreach($child as $el)--}}
{{--            @if($el->getAttribute('user_id')==2)--}}
{{--            <div>--}}
{{--                <h4>{{$el->getAttribute('first_name')}}</h4>--}}
{{--            </div>--}}
{{--            @endif--}}
{{--        @endforeach--}}

    <table class="table table-borderless" style="color: #3abee6">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Birthday</th>
            <th scope="col">Gender</th>
        </tr>
        </thead>
        <tbody>
        @foreach($child as $el)
            @if($el->getAttribute('user_id')==2)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$el->getAttribute('first_name')}}</td>
                    <td>{{$el->getAttribute('last_name')}}</td>
                    <td>{{$el->getAttribute('birthday')}}</td>
                    <td>{{$el->getAttribute('gender')}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

{{--    <div>--}}
{{--        <table class="table table-borderless" style="color: red">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">#</th>--}}
{{--                <th scope="col">First</th>--}}
{{--                <th scope="col">Last</th>--}}
{{--                <th scope="col">Handle</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <th scope="row">1</th>--}}
{{--                <td>Mark</td>--}}
{{--                <td>Otto</td>--}}
{{--                <td>@mdo</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th scope="row">2</th>--}}
{{--                <td>Jacob</td>--}}
{{--                <td>Thornton</td>--}}
{{--                <td>@fat</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th scope="row">3</th>--}}
{{--                <td colspan="2">Larry the Bird</td>--}}
{{--                <td>@twitter</td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores facere ipsum omnis quis. A accusantium amet aut commodi consequatur deserunt est ipsa, magnam quia similique sit tempora. Nulla, officiis quaerat!s</p>
@endsection

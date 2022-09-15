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
{{--    <div class="flex flex-col">--}}
{{--        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
{{--            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">--}}
{{--                <div class="overflow-x-auto">--}}
{{--                    <table class="min-w-full">--}}
{{--                        <thead class="border-b">--}}
{{--                        <tr>--}}
{{--                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">--}}
{{--                                Heading--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">--}}
{{--                                Heading--}}
{{--                            </th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr class="border-b">--}}
{{--                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">--}}
{{--                                Cell1--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b">--}}
{{--                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">--}}
{{--                                Cell--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b">--}}
{{--                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">--}}
{{--                                Cell--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

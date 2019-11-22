@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body app-home">
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control change" placeholder="Post Text" id="search">
            </div>
            <div class="col-sm-4">
                <select name="date" class="form-control change"  id="date">
                    <option value="null">Select</option>
                    @foreach($buffers as $buffer)
                        <option value="{{ $buffer->created_at }}">{{ $buffer->created_at }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <select name="group" class="form-control change" id="group" >
                    <option value="null">Select</option>
                    @foreach($group as $g)
                        <option value="{{ $g->id }}">{{ $g->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody id="t_body">
{{--                    @foreach($buffers as $buffer)--}}
{{--                        <tr>--}}
{{--                            <td> {{ $buffer->group->name }} </td>--}}
{{--                            <td> {{ $buffer->group->type }} </td>--}}
{{--                            <td> {{ $buffer->user->name }} </td>--}}
{{--                            <td> {{ $buffer->post->text }} </td>--}}
{{--                            <td></td>--}}
{{--                            <td>@php echo date('d/M/y', strtotime($buffer->created_at)) @endphp</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                </tbody>
            </table>
{{--        {{ $buffers }}--}}

        <nav id="pagination" aria-label="Page navigation example">
            <ul class="pagination">

            </ul>
        </nav>
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            let url = '{{ url('/get/data') }}/null/null/null';
            getData(url);
        });

        function getData(url) {
            $('#t_body').empty();
            $('.pagination').empty();
            let i = 1;
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    $.each(result.data, function (key, value) {
                        let element = '<tr><td>'+ value.group.name +'</td><td>'+ value.group.type +'</td><td>'+ value.user.name +'</td><td>'+ value.post.text +'</td><td>'+ value.created_at +'</td></tr>';
                        $('#t_body').append(element);
                    });
                    for( let j = 1; j< 10; j++ ){
                        // because there is lot of page, for this, i took 10 as init...
                        let newUrl = url.split('=')[0]+'?page='+j;
                        let paginate = '<li class="page-item"><a class="page-link" data-id = "'+newUrl+'">'+ j +'</a></li>';
                        $('.pagination').append(paginate);
                    }

                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        }

        $(document).on('input', '.change', function () {
            let search = $('#search').val();
            if (search){

            } else {
                search = 'null';
            }
            let date = $('#date').val();
            let group = $('#group').val();
            let url = '{{ url('/get/data') }}/'+search+'/'+date+'/'+group;
            getData(url);
        });

        $(document).on('click', '.page-link', function () {
            let link = $(this).data('id');
            getData(link);
        })

    </script>
@endsection
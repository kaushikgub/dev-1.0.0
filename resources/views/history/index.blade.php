@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body app-home">
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="col-sm-4">
                <select name="group_type" id="" class="form-control">
                    @foreach($buffers as $buffer)
                        <option value="{{ $buffer->created_at }}">@php echo date('d/M/y', strtotime($buffer->created_at)) @endphp</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <select name="group_type" id="" class="form-control">
                    @foreach($group as $g)
                        <option value="{{ $g->name }}">{{ $g->name }}</option>
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
                <tbody>
                    @foreach($buffers as $buffer)
                        <tr>
                            <td> {{ $buffer->group->name }} </td>
                            <td> {{ $buffer->group->type }} </td>
                            <td> {{ $buffer->user->name }} </td>
                            <td> {{ $buffer->post->text }} </td>
                            <td></td>
                            <td>@php echo date('d/M/y', strtotime($buffer->created_at)) @endphp</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{ $buffers }}
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <a href="{{route('task.create')}}" class="btn btn-success"><i class="fa fa-plus "></i>  Create new task</a>
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <tr>
                        <th>Task</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash fa-fw"></i>Delete
                                    </button>
                                </form>
                                <form action="{{ route('task.edit', $task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('GET') }}

                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-pencil fa-fw"></i>Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
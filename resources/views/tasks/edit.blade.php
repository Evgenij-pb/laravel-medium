@extends('layouts.app')

@section('content')
    <div class="panel-body">

    <!-- Отображение ошибок проверки ввода -->
@include('common.errors')

    <form action="{{ route('task.update',$task->id) }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>
            <div class="col-sm-6">

                @if(!old('name'))
                    <input type="text" name="name" id="task" class="form-control" value="{{ $task->name }}">
                @else
                    <input type="text" name="name" id="task" class="form-control" value="{{ old('name') }}">
                @endif

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save
                </button>
            </div>
        </div>
    </form>
    </div>
@endsection




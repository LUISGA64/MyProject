@extends('layouts.blank')


@section('main_container')


<div class="right_col" role="main">
    <div class="">
        {{--  --}}
        <div class="models--actions">
    <a class="btn btn-labeled btn-success" href="{{ route('entrust-gui::permissions.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span> {{ trans('entrust-gui::button.create-permission') }}</a>
  </div>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach($models as $model)
        <tr>
            <td>{{ $model->display_name }}</th>
            <td class="col-xs-3">
                <form action="{{ route('entrust-gui::permissions.destroy', $model->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::permissions.edit', $model->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span> {{ trans('entrust-gui::button.edit') }}</a>
                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i> </span> {{ trans('entrust-gui::button.delete') }}</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {!! $models->render() !!}
</div>
    </div>
</div>

@endsection
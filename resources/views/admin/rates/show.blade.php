@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.id') }}
                        </th>
                        <td>
                            {{ $rate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.interest_per_month') }}
                        </th>
                        <td>
                            {{ $rate->interest_per_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.administrative_fee') }}
                        </th>
                        <td>
                            {{ $rate->administrative_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $rate->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
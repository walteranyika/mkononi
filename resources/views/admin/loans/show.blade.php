@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.id') }}
                        </th>
                        <td>
                            {{ $loan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.artist') }}
                        </th>
                        <td>
                            {{ $loan->artist->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.amount') }}
                        </th>
                        <td>
                            {{ $loan->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.total_amount_to_repay') }}
                        </th>
                        <td>
                            {{ $loan->total_amount_to_repay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.duration') }}
                        </th>
                        <td>
                            {{ $loan->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.interest') }}
                        </th>
                        <td>
                            {{ $loan->interest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.monthly_repayment_amount') }}
                        </th>
                        <td>
                            {{ $loan->monthly_repayment_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.admin_fee') }}
                        </th>
                        <td>
                            {{ $loan->admin_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.code') }}
                        </th>
                        <td>
                            {{ $loan->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.processed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $loan->processed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.repaid') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $loan->repaid ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.monthly_interest') }}
                        </th>
                        <td>
                            {{ $loan->monthly_interest }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loan.fields.admin_fee_percentage') }}
                        </th>
                        <td>
                            {{ $loan->admin_fee_percentage }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.loans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
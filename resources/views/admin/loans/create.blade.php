@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.loan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.loans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="artist_id">{{ trans('cruds.loan.fields.artist') }}</label>
                <select class="form-control select2 {{ $errors->has('artist') ? 'is-invalid' : '' }}" name="artist_id" id="artist_id" required>
                    @foreach($artists as $id => $entry)
                        <option value="{{ $id }}" {{ old('artist_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('artist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('artist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.artist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.loan.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_amount_to_repay">{{ trans('cruds.loan.fields.total_amount_to_repay') }}</label>
                <input class="form-control {{ $errors->has('total_amount_to_repay') ? 'is-invalid' : '' }}" type="number" name="total_amount_to_repay" id="total_amount_to_repay" value="{{ old('total_amount_to_repay', '') }}" step="0.01" required>
                @if($errors->has('total_amount_to_repay'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_amount_to_repay') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.total_amount_to_repay_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration">{{ trans('cruds.loan.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', '') }}" step="1" required>
                @if($errors->has('duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="interest">{{ trans('cruds.loan.fields.interest') }}</label>
                <input class="form-control {{ $errors->has('interest') ? 'is-invalid' : '' }}" type="number" name="interest" id="interest" value="{{ old('interest', '0') }}" step="0.01">
                @if($errors->has('interest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.interest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_repayment_amount">{{ trans('cruds.loan.fields.monthly_repayment_amount') }}</label>
                <input class="form-control {{ $errors->has('monthly_repayment_amount') ? 'is-invalid' : '' }}" type="number" name="monthly_repayment_amount" id="monthly_repayment_amount" value="{{ old('monthly_repayment_amount', '0') }}" step="0.01">
                @if($errors->has('monthly_repayment_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_repayment_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.monthly_repayment_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admin_fee">{{ trans('cruds.loan.fields.admin_fee') }}</label>
                <input class="form-control {{ $errors->has('admin_fee') ? 'is-invalid' : '' }}" type="number" name="admin_fee" id="admin_fee" value="{{ old('admin_fee', '0') }}" step="0.01">
                @if($errors->has('admin_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('admin_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.admin_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.loan.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('processed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="processed" value="0">
                    <input class="form-check-input" type="checkbox" name="processed" id="processed" value="1" {{ old('processed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="processed">{{ trans('cruds.loan.fields.processed') }}</label>
                </div>
                @if($errors->has('processed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('processed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.processed_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('repaid') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="repaid" id="repaid" value="1" required {{ old('repaid', 0) == 1 ? 'checked' : '' }}>
                    <label class="required form-check-label" for="repaid">{{ trans('cruds.loan.fields.repaid') }}</label>
                </div>
                @if($errors->has('repaid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('repaid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.repaid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_interest">{{ trans('cruds.loan.fields.monthly_interest') }}</label>
                <input class="form-control {{ $errors->has('monthly_interest') ? 'is-invalid' : '' }}" type="number" name="monthly_interest" id="monthly_interest" value="{{ old('monthly_interest', '0') }}" step="0.01">
                @if($errors->has('monthly_interest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_interest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.monthly_interest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admin_fee_percentage">{{ trans('cruds.loan.fields.admin_fee_percentage') }}</label>
                <input class="form-control {{ $errors->has('admin_fee_percentage') ? 'is-invalid' : '' }}" type="number" name="admin_fee_percentage" id="admin_fee_percentage" value="{{ old('admin_fee_percentage', '0') }}" step="0.01">
                @if($errors->has('admin_fee_percentage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('admin_fee_percentage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.loan.fields.admin_fee_percentage_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
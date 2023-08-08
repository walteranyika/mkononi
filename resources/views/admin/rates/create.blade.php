@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="interest_per_month">{{ trans('cruds.rate.fields.interest_per_month') }}</label>
                <input class="form-control {{ $errors->has('interest_per_month') ? 'is-invalid' : '' }}" type="number" name="interest_per_month" id="interest_per_month" value="{{ old('interest_per_month', '9') }}" step="0.01" required max="100">
                @if($errors->has('interest_per_month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interest_per_month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.interest_per_month_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="administrative_fee">{{ trans('cruds.rate.fields.administrative_fee') }}</label>
                <input class="form-control {{ $errors->has('administrative_fee') ? 'is-invalid' : '' }}" type="number" name="administrative_fee" id="administrative_fee" value="{{ old('administrative_fee', '5') }}" step="0.01" required max="100">
                @if($errors->has('administrative_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('administrative_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.administrative_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.rate.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.is_active_helper') }}</span>
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
<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
@if(Request::is('tickets'))
    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', __('Status').':') !!}
        {!! Form::select('status', [\App\Enums\TicketStatus::open => 'باز'] ,null, ['class' => 'form-control']) !!}
    </div>
@endif
@if(Request::is('tickets/{id}/edit'))
    <!-- Status Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status', __('Status').':') !!}
        {!! Form::select('status', [\App\Enums\TicketStatus::open => 'باز'] ,null, ['class' => 'form-control']) !!}
    </div>
@endif

<!-- Severity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('severity_id', __('Severity Id').':') !!}
    {!! Form::select('severity_id', \App\Models\Severity::pluck('title','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Organization Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    {!! Form::select('organization_id', \App\Models\Organization::pluck('title','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 sr-only">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
{{--    {!! Form::select('user_id', \App\User::pluck('name','id'),null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tickets.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>

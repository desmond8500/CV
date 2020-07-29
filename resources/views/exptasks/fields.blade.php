<!-- Exp Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exp_id', 'Exp Id:') !!}
    {!! Form::text('exp_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('exptasks.index') }}" class="btn btn-secondary">Cancel</a>
</div>

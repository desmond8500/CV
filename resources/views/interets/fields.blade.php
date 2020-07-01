<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Etat Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_civil_id', 'Etat Civil Id:') !!}
    {!! Form::text('etat_civil_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('interets.index') }}" class="btn btn-secondary">Cancel</a>
</div>

<!-- Etat Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_civil_id', 'Etat Civil Id:') !!}
    {!! Form::text('etat_civil_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::text('start', null, ['class' => 'form-control']) !!}
</div>

<!-- End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end', 'End:') !!}
    {!! Form::text('end', null, ['class' => 'form-control']) !!}
</div>

<!-- Lieu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lieu', 'Lieu:') !!}
    {!! Form::text('lieu', null, ['class' => 'form-control']) !!}
</div>

<!-- Function Field -->
<div class="form-group col-sm-6">
    {!! Form::label('function', 'Function:') !!}
    {!! Form::text('function', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('skills.index') }}" class="btn btn-secondary">Cancel</a>
</div>

<!-- Skill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill_id', 'Skill Id:') !!}
    {!! Form::text('skill_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('taches.index') }}" class="btn btn-secondary">Cancel</a>
</div>

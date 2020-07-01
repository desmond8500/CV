<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $skills->id }}</p>
</div>

<!-- Etat Civil Id Field -->
<div class="form-group">
    {!! Form::label('etat_civil_id', 'Etat Civil Id:') !!}
    <p>{{ $skills->etat_civil_id }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $skills->start }}</p>
</div>

<!-- End Field -->
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    <p>{{ $skills->end }}</p>
</div>

<!-- Lieu Field -->
<div class="form-group">
    {!! Form::label('lieu', 'Lieu:') !!}
    <p>{{ $skills->lieu }}</p>
</div>

<!-- Function Field -->
<div class="form-group">
    {!! Form::label('function', 'Function:') !!}
    <p>{{ $skills->function }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $skills->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $skills->updated_at }}</p>
</div>


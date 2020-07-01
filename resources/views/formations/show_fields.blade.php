<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $formation->id }}</p>
</div>

<!-- Etat Civil Id Field -->
<div class="form-group">
    {!! Form::label('etat_civil_id', 'Etat Civil Id:') !!}
    <p>{{ $formation->etat_civil_id }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $formation->start }}</p>
</div>

<!-- End Field -->
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    <p>{{ $formation->end }}</p>
</div>

<!-- Lieu Field -->
<div class="form-group">
    {!! Form::label('lieu', 'Lieu:') !!}
    <p>{{ $formation->lieu }}</p>
</div>

<!-- Diplome Field -->
<div class="form-group">
    {!! Form::label('diplome', 'Diplome:') !!}
    <p>{{ $formation->diplome }}</p>
</div>

<!-- School Field -->
<div class="form-group">
    {!! Form::label('school', 'School:') !!}
    <p>{{ $formation->school }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $formation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $formation->updated_at }}</p>
</div>


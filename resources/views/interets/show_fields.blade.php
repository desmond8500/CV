<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $interet->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $interet->name }}</p>
</div>

<!-- Etat Civil Id Field -->
<div class="form-group">
    {!! Form::label('etat_civil_id', 'Etat Civil Id:') !!}
    <p>{{ $interet->etat_civil_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $interet->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $interet->updated_at }}</p>
</div>


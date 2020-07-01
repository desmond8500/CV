<div class="table-responsive-sm">
    <table class="table table-striped" id="formations-table">
        <thead>
            <tr>
                <th>Etat Civil Id</th>
        <th>Start</th>
        <th>End</th>
        <th>Lieu</th>
        <th>Diplome</th>
        <th>School</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($formations as $formation)
            <tr>
                <td>{{ $formation->etat_civil_id }}</td>
            <td>{{ $formation->start }}</td>
            <td>{{ $formation->end }}</td>
            <td>{{ $formation->lieu }}</td>
            <td>{{ $formation->diplome }}</td>
            <td>{{ $formation->school }}</td>
                <td>
                    {!! Form::open(['route' => ['formations.destroy', $formation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('formations.show', [$formation->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('formations.edit', [$formation->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="table-responsive-sm">
    <table class="table table-striped" id="skills-table">
        <thead>
            <tr>
                <th>Etat Civil Id</th>
        <th>Start</th>
        <th>End</th>
        <th>Lieu</th>
        <th>Function</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($skills as $skills)
            <tr>
                <td>{{ $skills->etat_civil_id }}</td>
            <td>{{ $skills->start }}</td>
            <td>{{ $skills->end }}</td>
            <td>{{ $skills->lieu }}</td>
            <td>{{ $skills->function }}</td>
                <td>
                    {!! Form::open(['route' => ['skills.destroy', $skills->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('skills.show', [$skills->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('skills.edit', [$skills->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
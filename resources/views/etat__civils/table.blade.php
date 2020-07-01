<div class="table-responsive-sm">
    <table class="table table-striped" id="etatCivils-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Function</th>
        <th>Address</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Linkedin</th>
        <th>Description</th>
        <th>Birthday</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($etatCivils as $etatCivil)
            <tr>
                <td>{{ $etatCivil->user_id }}</td>
            <td>{{ $etatCivil->firstname }}</td>
            <td>{{ $etatCivil->lastname }}</td>
            <td>{{ $etatCivil->function }}</td>
            <td>{{ $etatCivil->address }}</td>
            <td>{{ $etatCivil->email }}</td>
            <td>{{ $etatCivil->tel }}</td>
            <td>{{ $etatCivil->linkedin }}</td>
            <td>{{ $etatCivil->description }}</td>
            <td>{{ $etatCivil->birthday }}</td>
                <td>
                    {!! Form::open(['route' => ['etatCivils.destroy', $etatCivil->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('etatCivils.show', [$etatCivil->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('etatCivils.edit', [$etatCivil->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="button">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Create a new Project</a>
                </div>
                <div class="card admin">
                    <div class="card-header">Amministratore</div>

                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Technology</th>
                                    <th scope="col">Start_Date</th>
                                    <th scope="col">End_Date</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->type->name }}</td>
                                        <td>{{ $project->status->name }}</td>
                                        @if (count($project->technologies) > 0)
                                            <td>
                                                <ul class="d-flex list-unstyled gap-1 m-0">
                                                    @foreach ($project->technologies as $tech)
                                                        <li>{{ $tech->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        @else
                                            <td>Null</td>
                                        @endif
                                        <td>{{ $project->start_date }}</td>
                                        <td>{{ $project->end_date }}</td>
                                        <td class="d-flex justify-content-between">
                                            <a href="{{ route('admin.show', $project) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                            <a href="{{ route('admin.edit', $project) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <form action="{{ route('admin.destroy', $project) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $projects->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form class="col-8 m-auto text-white" action="{{ route('admin.update', $project) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label for="shoreName">Title</label>
                <input type="text" class="form-control" id="shoreName" placeholder="Enter the title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreLocation">Type</label>
                <select name="type_id" id="shoreLocation" class="form-select">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type->id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-2">
                <label for="shoreLocation">Status</label>
                <select name="status_id" id="shoreLocation" class="form-select">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}"
                            {{ old('type_id', $project->status->id) == $status->id ? 'selected' : '' }}>{{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="technology_id" class="ms-2 mb-4">Technology</label>
            <div class="d-flex flex-wrap  justify-content-center gap-2">
                @foreach ($technologies as $index => $technology)
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" name="technology_id[]" id="technology_id" value="{{ $technology->id }} "
                                @if ($project->technologies->contains($technology->id)) checked @endif class="checkbox-input" />
                            <span class="checkbox-tile">
                                <span class="checkbox-icon">
                                    <img src="{{ $technology->image }}" alt="">
                                </span>
                                <span class="checkbox-label">{{ $technology->name }}</span>
                            </span>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group m-2">
                <label for="shoreBeds">Image</label>
                <input type="file" class="form-control" id="shoreBeds" name="image"
                    placeholder="Enter the numbre of your beach beds" value="{{ old('image', $project->image) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreOpening">Start Date</label>
                <input type="text" class="form-control" id="shoreOpening" name="start_date"
                    placeholder="Enter the opening date" value="{{ old('start_date', $project->start_date) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreClosing">End Date</label>
                <input type="text" class="form-control" id="shoreClosing" name="end_date"
                    placeholder="Enter the closing date" value="{{ old('end_date', $project->end_date) }}">
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning ms-3">Clear</button>
            </div>
        </form>
    </div>
@endsection

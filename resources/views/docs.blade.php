@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-b-md">
                <div class="card-header">Documents</div>

                <div class="card-body">
                    <div class="list-group">
                    @foreach ($docs as $doc)
                        <a href="#" class="list-group-item list-group-item-action active">{{ $doc->name }}</a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

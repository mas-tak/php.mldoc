@extends('layouts.app')

@section('content')
<div class="container">
    <docs-list></docs-list>
    <!--
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-b-md">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            Documents
                        </div>
                        <div class="col-md-8">
                            <div class="float-right">
                                <a class="nav-link" href="{{ route('docs.new') }}">New</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="list-group">
                    @foreach ($docs as $doc)
                        <a href="{{ route('docs.show', ['id' => $doc->id]) }}" class="list-group-item list-group-item-action">{{ $doc->type }}&nbsp;:&nbsp;{{ $doc->name }}</a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-b-md">
                <div class="card-header">
                    <label>Document</label>
                </div>

                <div class="card-body">
                    <form class="container" action="{{ route('docs.new') }}" method="POST">
                        @csrf
                        <div class="row">
                            <label class="col-2">name : </label>
                            <input class="col-2" type="text" name="name" />
                        </div>
                        <div class="row">
                            <label class="col-2">path : </label>
                            <input class="col-2" type="text" name="path" />
                        </div>
                        <div class="row">
                            <label class="col-2">type : </label>
                            <input class="col-2" type="text" name="type" />
                            <select>
                                <option value="md">Markdown</option>
                                <option value="rst">reStructuredText</option>
                            </select>
                        </div>
                        <div class="row">
                            <input type="submit" value="Regist" /> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.index')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit">logout</button>
                </form>
            </div>
        </div>
    </div>

@endsection()
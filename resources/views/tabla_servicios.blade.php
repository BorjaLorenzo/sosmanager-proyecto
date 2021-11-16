@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1"><a href="{{url('/')}}" role="button" class="btn btn-info">Volver</a></div>
            <p></p>
            <p></p>
            <table id="tabla" class="display">
                <thead>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(function () {
            $('table').DataTable();
        });
    </script>
@endsection
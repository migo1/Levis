@extends('layouts.master')


@section('content')
    



<div class="container">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-warning">
                <div class="custom-title">CALENDAR</div>
            </div>
        </div>
        <div class="card-body">
           <div>
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
           </div>
        </div>
    </div>
</div>
@endsection
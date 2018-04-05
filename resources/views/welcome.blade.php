@extends('layouts.app')
@section('content')
<h2 class="text-center">The Magic Bill Splitter</h2>
{!! Form::open(['url' => 'calc-data', 'method' => 'POST', "name"=>'bill-splitter', "id"=>'bill-splitter', "class"=>"billform"] ) !!}
<div class="row form-group">
    <div class="col-sm-5 text-right">
        <label>Split how many ways? <span>* Required</span></label>
    </div>
    <div class="col-sm-5">
        {{ Form::input('text', 'split_way', null, ['class' => 'form-control', 'id' => 'split_way']) }}
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-5 text-right">
        <label>How much was the tab? <span>* Required</span></label>
    </div>
    <div class="col-sm-5">
        {{ Form::input('text', 'tab', null, ['class' => 'form-control', 'id' => 'tab']) }}
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-5 text-right">
        <label>How was the service?</label>
    </div>
    <div class="col-sm-5">
        {{ Form::select('service-tip', ['18'=>'Good (18% tip)', '15'=>'OK (15% tip)', '10'=>'Poor (10% tip)'], null, ["id"=>'service-tip', "class"=>"form-control"]) }}
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-5 text-right">
        <label>Round up?</label>
    </div>
    <div class="col-sm-5">
        {{ Form::checkbox('round-up', 'yes', null, ['id'=>'round-up']) }} Yes
    </div>
</div>
<br>
<div class="clearfix text-center">
    <input type='submit' name='calculate' class='btn btn-primary' value='calculate' id='calculate'>
</div>
<br>

@if ($errors->any())
    <div class='alert alert-danger'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{  $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('splitterVal'))
    <div class="alert alert-success text-center">
        Everyone owes ${{session()->get('splitterVal')}}
    </div>
@endif

{!! Form::close() !!}
@endsection
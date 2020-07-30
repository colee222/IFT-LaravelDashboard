@extends('layouts.GNAT')

@section('content')

<style>

.wrap-element{
	position: relative;
	overflow: hidden;
	padding-top: 50%;
}
.wrapped-iframe{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border: 1;
}

.icontainer {
	position: relative;
	overflow: hidden;
	padding-top: 56.25%;
	width: 100%;
}

.icontainer-iframe {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 100%;
	border: 1;
}

</style>

<div class="icontainer">
<iframe class="icontainer-iframe" src="TFAnimationGlobal"></iframe>
</div> 

@endsection
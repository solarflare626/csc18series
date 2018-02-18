@extends('shared.master')

@section('title')
	Assignment 1
@endsection

@section('header')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<style type="text/css">
	
	.add-on .input-group-btn > .btn {
  border-left-width:0;left:-2px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
/* stop the glowing blue shadow */
.add-on .form-control:focus {
 box-shadow:none;
 -webkit-box-shadow:none; 
 border-color:#cccccc; 
}
.form-control{width:20%}
</style>

@endsection


@section('content')
<div class="col-md-3">

    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="srch-term" id="srch-pokemon" type="number">
      <div class="input-group-btn">
        <button class="btn btn-default" onclick="btnClick()"><i class="glyphicon glyphicon-search"></i></button>
      </div>	
    </div>
<!--hello --> 

    <div id="info">
    	
    </div>
 
</div>


<script type="text/javascript">

	function btnClick(){

	var pokeid =document.getElementById("srch-pokemon").value;
	console.log(pokeid);
	var hold = "";
	$.ajax({
              url:"https://www.pokeapi.co/api/v2/pokemon/"+pokeid,
                method:"GET",
                success:function(data)
                {
                  hold += "<img src='"+data.sprites.front_default+"' alt='"+data.name+"'>";
                  $("#info").html(hold);
                }
           });

	

}
</script>
@endsection
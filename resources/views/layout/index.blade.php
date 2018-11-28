<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/prolayout.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	
</head>
<body>
    @include('layout.header')
    <div class="row">
       	@yield('content')
    </div>
       
</body>
<script>
				/* When the user clicks on the button, 
				toggle between hiding and showing the dropdown content */
	// function myFunctionLogout() {
	// 	document.getElementById("myItemNavL1").classList.toggle("show");
	// }			
	function myFunction() {
		document.getElementById("myItemNavL1").classList.toggle("show");
	}
	
	window.onclick = function(event) {
		if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("itemNavL1");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	}
</script>
</html>
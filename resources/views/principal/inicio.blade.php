<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style>
	@keyframes fadein {
	    from {
	        opacity:0;
	    }
	    to {
	        opacity:1;
	    }
	}
	@-moz-keyframes fadein { /* Firefox */
	    from {
	        opacity:0;
	    }
	    to {
	        opacity:1;
	    }
	}
	@-webkit-keyframes fadein { /* Safari and Chrome */
	    from {
	        opacity:0;
	    }
	    to {
	        opacity:1;
	    }
	}
	@-o-keyframes fadein { /* Opera */
	    from {
	        opacity:0;
	    }
	    to {
	        opacity: 1;
	    }
	}
	body {
	    animation: fadein 2s;
	    -moz-animation: fadein 2s; /* Firefox */
	    -webkit-animation: fadein 2s; /* Safari and Chrome */
	    -o-animation: fadein 2s; /* Opera */		
	    position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	    background-size: 100%;
		background-image: url(./imagenes/bg1.jpg);
	}
	.button {
	  background-color: rgb(243,146,0);
	  border: none;
	  color: white;
	  padding: 14px 20px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 18px;
	  border-radius: 5px;
	  cursor: pointer;
	}
	.h1
	{
		font-family: 'Montserrat', sans-serif;
		font-size: 42px;
		color: rgb(112, 111, 111);
	}
	.div-h1
	{
		text-align: center;
	}
	.div-button
	{
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;

	}
	</style>
</head>
<body>
	<div class="div-h1">
		<h1 class="h1">MULTIPLAZA, TODA TU VIDA</h1>
	</div>
	<div class="div-button">
		<button onclick="location.href='/categoria'" class="button">COMENZAR</button>
	</div>
</body>
</html>
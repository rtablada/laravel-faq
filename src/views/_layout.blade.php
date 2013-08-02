<?php $laravelFaqDir = 'packages/rtablada/laravel-faq/';?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>FAQ</title>

	<?php
		echo HTML::script($laravelFaqDir.'js/modernizr.js');
		echo HTML::style($laravelFaqDir.'css/gumby.css');
		echo HTML::style($laravelFaqDir.'css/style.css');
	?>
</head>
<body>
	@yield('content')

<?php
	echo HTML::script($laravelFaqDir.'js/gumby.js');
?>
@yield('scripts')

</body>
</html>

<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
<div id="container">
    <header> 
       @include('admin.includes.header')
    </header>
    <div id="body">
	<div class="width">
		<section id="content" class="two-column with-right-sidebar">
	    <article>
		@yield('content')
		</article>
	</section>
        
    	<div class="clear"></div>
    </div>
</div>
    <footer>
       @include('admin.includes.footer')
    </footer>
</div>
</body>
</html>
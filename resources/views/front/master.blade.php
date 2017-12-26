<!doctype html>
<html>
<head>
    @include('front.includes.head')
</head>
<body>
<div id="container">
    <header> 
       @include('front.includes.header')
    </header>
    <div id="body">
	<div class="width">
		<section id="content" class="two-column with-right-sidebar">
	    <article>
		@yield('content')
		</article>
	</section>
        <aside class="sidebar big-sidebar right-sidebar">
            <ul>	
               <li class="color-bg">
                    <ul class="blocklist">
                        <li><a class="selected" href="{{ Url::to('/tickets') }}">Home Page</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
    	<div class="clear"></div>
    </div>
</div>
    <footer>
       @include('front.includes.footer')
    </footer>
</div>
</body>
</html>
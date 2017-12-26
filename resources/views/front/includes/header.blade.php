
<div class="width">

    <h1><a href="{{ Url::to('/') }}">VideoSite</a></h1>

    <nav>

        <ul class="sf-menu dropdown">


            <li class="selected"><a href="{{ Url::to('/') }}">Home</a></li>
            @if(Auth::check())
                <li><a href="{{ Url::to('/') }}/users/upload-video">Upload Video</a></li>
                <li><a href="{{ Url::to('/') }}/users/logout">Logout</a></li>
            @else
                <li><a href="{{ Url::to('/') }}/users/register">Register</a></li>
                <li><a href="{{ Url::to('/') }}/users/login">Login</a></li>
            @endif
        </ul>


        <div class="clear"></div>
    </nav>
</div>

<div class="clear"></div>

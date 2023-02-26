<div class="col-md-3 col-sm-4">
	<div class="usernavwrap">
    <ul class="usernavdash">
        <li class="active"><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Tablero de Control </a></li>
        <li><a href="{{ route('company.profile') }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{__('Edit Profile')}}</a></li>
        <li><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Informe Ofertas Laborales </a></li>
        <li><a href="{{ route('posted.jobs') }}"><i class="fa fa-black-tie" aria-hidden="true"></i> Ofertas Laborales </a></li>

        <li><a href="{{route('company.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Chat Interno </a></li>
        <li><a href="{{route('company.followers')}}"><i class="fa fa-users" aria-hidden="true"></i> Seguidores </a></li>
        <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
            <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
	</div>
    <div class="row">
        <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
    </div>
</div>
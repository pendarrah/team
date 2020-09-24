<div class="container-menu">
    <div class="link "><a class="{{ request()->routeIs('*panel*') ? 'menu-active' : ''  }} " href="{{ route('panel.index') }}"><div class="text {{ request()->routeIs('*panel*') ? 'menu-active' : ''  }}  ">داشبورد</div></a></div>
    <div class="link"><a href="{{ route('event.index') }}"><div class="text">مدیریت رویداد ها</div></a></div>
    <div class="link"><a href="{{ route('team.index') }}"><div class="text">مدیریت تیم ها</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">مدیریت درخواست ها</div></a></div>
    <div class="link"><a href="{{ route('event.my') }}"><div class="text">برنامه های من</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">کیف پول ورزشکاری</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">کیف پول مربی</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">کیف پول تیم</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">پروفایل</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">ايجاد پروفايل مربيگري</div></a></div>
    <div class="link"><a href="{{ route('event.create') }}"><div class="text">ارتباط با پشتیبانی</div></a></div>
    <div class="link"><a href="{{ route('dashboard-logout') }}"><div class="text">خروج از اکانت</div></a></div>
</div>
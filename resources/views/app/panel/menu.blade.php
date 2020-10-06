<div class="container-menu">
    <div class="link "><a class="" href="{{ route('panel.index') }}"><div class="text">داشبورد</div></a></div>

    @can('supervisor')
        <div class="link"><a href="{{ route('event.index') }}"><div class="text"> رویداد ها</div></a></div>
        <div class="link"><a href="{{ route('team.index') }}"><div class="text"> تیم ها</div></a></div>
        <div class="link"><a href="{{ route('requests.index') }}"><div class="text"> درخواست ها</div></a></div>
    @endcan

    @can('user')
        <div class="link"><a href="{{ route('event.my') }}"><div class="text">رویداد های من</div></a></div>
        <div class="link"><a href="{{ route('requests.index') }}"><div class="text"> درخواست ها</div></a></div>
        <div class="link"><a href="{{ route('transaction.index') }}"><div class="text">کیف پول</div></a></div>
    @endcan

    @can('admin')
        <div class="link"><a href="{{ route('category.index') }}"><div class="text">مدیریت دسته بندیها</div></a></div>
        <div class="link"><a href="{{ route('category.index') }}"><div class="text">مدیریت کاربران</div></a></div>
        <div class="link"><a href="{{ route('category.index') }}"><div class="text">لیست تراکنش ها</div></a></div>
        <div class="link"><a href="{{ route('event.index') }}"><div class="text"> رویداد ها</div></a></div>
        <div class="link"><a href="{{ route('team.index') }}"><div class="text"> تیم ها</div></a></div>
        <div class="link"><a href="{{ route('requests.index') }}"><div class="text"> درخواست ها</div></a></div>
    @endcan

    <div class="link"><a href="{{ route('panel.verification.profile') }}"><div class="text">پروفایل</div></a></div>
    <div class="link"><a href="{{ route('dashboard-logout') }}"><div class="text">خروج از اکانت</div></a></div>
</div>
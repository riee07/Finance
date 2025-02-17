<h1>Welcome, Admin</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>





@if ($message = Session::get('success'))
    <div>{{ $message }}</div>
@endif
<br><br>

<!-- <a href="{{ url('admin/tagihan/X/index') }}">Halaman X</a> -->
<a href="{{ route('admin.x.dashboard') }}">/ADMIN/DASHBOARD/X</a>

<br><br>
<a href="{{ route('admin.xi.dashboard') }}">/ADMIN/DASHBOARD/XI</a>


<br><br>
<a href="{{ route('admin.xii.dashboard') }}">/ADMIN/DASHBOARD/XII</a>



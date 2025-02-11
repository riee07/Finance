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
<a href="{{ route('x.index') }}">Halaman X</a>

<br><br>
<a href="{{ route('xi.index') }}">Halaman XI</a>


<br><br>
<a href="{{ route('xii.index') }}">Halaman XII</a>



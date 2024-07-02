@extends('layouts.master')
@section('menu')

<li class="{{ request()->is('home*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span></a></li>

<li class="navigation-header"><span>Master Data</span><i data-feather="more-horizontal"></i>
</li>

<li class="{{ request()->is('admin/masterdata/layanan*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('md.layanan')}}"><i data-feather='star'></i><span class="menu-title text-truncate">Layanan</span></a></li>

<li class="{{ request()->is('admin/masterdata/pegawai*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('md.pegawai')}}"><i data-feather='users'></i><span class="menu-title text-truncate">Pegawai</span></a></li>

<li class="{{ request()->is('admin/masterdata/klien*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('md.klien')}}"><i data-feather='award'></i><span class="menu-title text-truncate">Klien</span></a></li>

<li class="navigation-header"><span>Konten Website</span><i data-feather="more-horizontal"></i>
</li>

<li class="{{ request()->is('admin/portofolio*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.portofolio')}}"><i data-feather='layers'></i><span class="menu-title text-truncate">Portofolio</span></a></li>


<li class="navigation-header"><span>Manajemen Project</span><i data-feather="more-horizontal"></i>
</li>

<li class="{{ request()->is('admin/project*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('admin.project')}}"><i data-feather='settings'></i><span class="menu-title text-truncate">Project</span></a></li>


<li class="nav-item mb-3"><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="power"></i><span class="menu-title text-truncate">Logout</span></a></li>

@endsection
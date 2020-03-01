<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset($webdata->thisUser()->profile_path) }}" class="img-circle" alt="User Image" style="height: 45px;">
            </div>
            <div class="pull-left info">
                <p>{{ $webdata->thisUser()->firstname }} {{ $webdata->thisUser()->lastname }}</p>
                <a href="{{ route('settings.route',['path' => 'users', 'action' => 'settings-view-users-profile', 'id' => Crypt::encrypt($webdata->thisUser()->id)])}}"><i class="fa fa-circle text-success"></i> {{ $webdata->thisUser()->position_title }} </a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" id="search_autocomplete" name="search_sidenav" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree" id="sidebar_menu_list">
            
            @include('layouts.subsidebar', ['class' => $sidebar->sideNavClass()])

        </ul>
    </section>
</aside>

@push('scripts')

<script type="text/javascript">

    function reloadSidenav() {
        $.ajax({
            url: '{{ route('settings.route',['path' => $path, 'action' => 'settings-reload-sidenav', 'id' => Crypt::encrypt('') ]) }}',
            method: 'get',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#sidebar_menu_list').html(data);
            }
        });
    }

</script>

@endpush
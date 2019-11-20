<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://167.71.53.96:3000" class="simple-text logo-normal">
            Switr
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ \Route::current()->getName() === 'admin.index' ? 'active' : ''}}">

                <a href="{{ route('admin.index') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
         {{--   <li class="{{ \Route::current()->getName() === 'admin.user' ? 'active' : ''}}">
                <a href="{{ route('admin.user') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>--}}
            <li class="{{ \Route::current()->getName() === 'boosts.index' ? 'active' : ''}}">
                <a href="{{ route('boosts.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Boosts</p>
                </a>
            </li>
         {{--   <li class="{{ \Route::current()->getName() === 'coins.index' ? 'active' : ''}}">
                <a href="{{ route('coins.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Coins</p>
                </a>
            </li>--}}
            <li class="{{ \Route::current()->getName() === 'skins.index' ? 'active' : ''}}">
                <a href="{{ route('skins.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Skins</p>
                </a>
            </li>
        </ul>
    </div>
</div>

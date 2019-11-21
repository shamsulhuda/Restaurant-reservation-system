<div class="sidebar" data-color="azure" data-background-color="black" data-image="{{asset('backend/img/sidebar-1.jpg')}}">

  <div class="logo">
    <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
      <img src="{{asset('backend/img/Logo_stick.png')}}">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="{{ Request::is('admin/dashboard') ? 'active':'' }}">
        <a class="nav-link text-light" href="{{route('admin.dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>

      <li class="{{ Request::is('admin/gallery','admin/gallery/create', 'admin/siteinfo/info', 'admin/siteinfo/create') ? 'active':'' }}">
        <a class="nav-link text-light" href="{{route('gallery.index')}}">
          <i class="material-icons">filter</i>
          <p>Site Gallery</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/slider','admin/slider/create') ? 'active':'' }}">
        <a class="nav-link" href="{{route('slider.index')}}">
          <i class="material-icons">slideshow</i>
          <p>Sliders</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/category','admin/category/create') ? 'active':'' }}">
        <a class="nav-link" href="{{route('category.index')}}">
          <i class="material-icons">content_paste</i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/item','admin/item/create') ? 'active':'' }}">
        <a class="nav-link" href="{{route('item.index')}}">
          <i class="material-icons">bubble_chart</i>
          <p>Items</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/dish','admin/dish/create') ? 'active':'' }}">
        <a class="nav-link" href="{{route('dish.index')}}">
          <i class="material-icons">room_service</i>
          <p>Our Dishes</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/dishitem','admin/dishitem/create') ? 'active':'' }}">
        <a class="nav-link" href="{{route('dishitem.index')}}">
          <i class="material-icons">restaurant_menu</i>
          <p>Dish Items</p>
        </a>
      </li>
      
      <li class="nav-item {{ Request::is('admin/reservation') ? 'active':'' }}">
        <a class="nav-link" href="{{route('reservation.index')}}">
          <i class="material-icons">chrome_reader_mode</i>
          <p>Reservation</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/contact') ? 'active':'' }}">
        <a class="nav-link" href="{{route('contact.index')}}">
          <i class="material-icons">message</i>
          <p>Contact message</p>
        </a>
      </li>
    </ul>
  </div>
</div>
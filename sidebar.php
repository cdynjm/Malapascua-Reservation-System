<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <?php if($_SESSION['type'] == 'admin') {?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="rooms">
        <i class="bi bi-house-fill"></i>
        <span>Rooms</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="pending-reservation">
        <i class="bi bi-house-dash-fill"></i>
        <span>Pending Reservations</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="approved-reservation">
      <i class="bi bi-house-check-fill"></i>
        <span>Approved Reservations</span>
    </a>
    </li>
    <?php } ?>
    <?php if($_SESSION['type'] == 'guest') {?>
    <li class="nav-item">
    <a class="nav-link collapsed" href="myreservation?id=<?php echo $_SESSION['id']; ?>">
        <i class="bi bi-house-dash-fill"></i>
        <span>My Reservations</span>
    </a>
    </li>
    <?php } ?>
    <li class="nav-item">
    <a class="nav-link collapsed" href="history?id=<?php echo $_SESSION['id']; ?>">
    <i class="bi bi-clock-fill"></i>
        <span>History</span>
    </a>
    </li>
</ul>

</aside><!-- End Sidebar-->
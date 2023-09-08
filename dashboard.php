<?php 

session_start();

if(empty($_SESSION['id'])) {
  header('Location: '.$_SERVER['name'].'/mrs');
}

include('components/header.php');
include ($_SERVER['DOCUMENT_ROOT'].'/mrs/backend/server-config.php');
include('navbar.php');
include('sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
      <?php if($_SESSION['type'] == 'admin') {?>
    <?php 

      $objDB = new Database;

      $total = 0;
      $pending = 0;
      $available = 0;
      $used = 0;

      $room = "SELECT * FROM rooms ORDER BY created_at DESC";
      $query = $objDB->conn()->query($room);
      
      while($row = $query->fetch_array()) { 

        if($row['status'] == 0 || $row['status'] == 1) {
            $total += 1;
        }
       if($row['status'] == 1) {
            $available += 1;
        }

      }

      $reservation = "SELECT * FROM reservation ORDER BY created_at DESC";
      $query = $objDB->conn()->query($reservation);
      
      while($row = $query->fetch_array()) { 

        if($row['status'] == 0) {
            $pending += 1;
        }
        if($row['status'] == 1) {
          $used += 1;
      }
       
      }

      ?>
      
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Rooms <span>| Current</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-houses-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Reservation <span class="text-danger">| Pending</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="text-danger bi bi-house-dash-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pending; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Rooms Available <span>| Current</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="text-success bi bi-house-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $available; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Rooms Accommodated <span class="text-danger">| To be paid</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="text-warning bi bi-house-lock-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $used; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          <?php } ?>

      <?php if($_SESSION['type'] == 'guest') {?>

      <?php 

      $objDB = new Database;

      $room = "SELECT * FROM rooms ORDER BY created_at DESC";
      $query = $objDB->conn()->query($room);
      
      while($row = $query->fetch_array()) {
          $_GET['roomid'] =  $row['id'];
      ?>

     <div class="col-lg-4 col-md-4">

          <!-- Card with an image on top -->
          <div class="card" style="height: 96%;">
            <img src="assets/images/<?php echo $row['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['room'] ?></h5>
              <p class="card-text"><?php echo $row['description'] ?></p>
              <h5 class="card-text fw-bold d-inline">₱<?php echo number_format($row['price'], 2); ?><span class="fs-6"> per day</span></h5>
              <span class="float-end">Max Guest: <span class="fs-5 fw-bold"><?php echo $row['maxguest'] ?></span></span>
              <?php if($row['status'] == 1) {?>
                      <p class="text-success">Available!</p>
                      <a href="transaction?roomid=<?php echo $_GET['roomid']; ?>" class="btn btn-success text-white float-end"><i class="bi bi-cart-plus-fill"></i> Add</a>
              <?php } ?>
              <?php if($row['status'] == 0) { ?>
                      <p class="text-danger">Not Available until <?php echo date('M d, Y', strtotime($row['checkout'])); ?></p>
              <?php } ?>            </div>

      </div><!-- End Card with an image on top -->
      </div>
        <?php } } ?>
          
      </div>

    </section>

</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
    
    </div>
    <div class="credits">
      Developed by <a href="https://www.facebook.com/profile.php?id=100070194702425">Marjurie Villanueva</a>
    </div>
  </footer><!-- End Footer -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
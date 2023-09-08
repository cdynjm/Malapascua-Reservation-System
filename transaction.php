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
      <h1>Transaction</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Process Reservation Transaction</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
          
    <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personal Details</h5>

              <!-- General Form Elements -->
              <form method="POST" action="web/route.php">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="contactnumber" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Check In Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="checkin" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Check Out Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="checkout" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="text" name="roomid" value="<?php echo $_GET['roomid']; ?>" class="form-control" hidden>
                    <button type="submit" name="confirm" class="btn btn-success">Confirm Reservation</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
            </div>
        </div>

        </div>

    <?php 

      $objDB = new Database;
      $roomid = $_GET['roomid'];
      $room = "SELECT * FROM rooms WHERE id='$roomid'";
      $query = $objDB->conn()->query($room);
      
      while($row = $query->fetch_array()) {
      ?>

     <div class="col-lg-4 col-md-4">

          <!-- Card with an image on top -->
          <div class="card">
            <img src="assets/images/<?php echo $row['picture'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['room'] ?></h5>
              <p class="card-text"><?php echo $row['description'] ?></p>
              <h5 class="card-text fw-bold d-inline">₱<?php echo number_format($row['price'], 2); ?><span class="fs-6"> per day</span></h5>
              <span class="float-end">Max Guest: <span class="fs-5 fw-bold"><?php echo $row['maxguest'] ?></span></span>
              <?php if($row['status'] == 1) {?>
                      <p class="text-success">Available!</p>
              <?php } ?>
              <?php if($row['status'] == 0) { ?>
                      <p class="text-danger">Not Available until <?php echo date('M d, Y', strtotime($row['checkout'])); ?></p>
              <?php } ?>
            </div>

      </div><!-- End Card with an image on top -->
      </div>
        <?php } ?>

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


<!-- Vendor JS Files -->


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
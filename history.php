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
      <h1>Transaction History</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Reservation History</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <?php if($_SESSION['type'] == 'admin') {?>
    <div class="row">
     <?php 

      $objDB = new Database;
      $userid = $_GET['id'];
      $reservation = "SELECT * FROM reservation WHERE status=2 ORDER BY created_at DESC";
      $query_reservation = $objDB->conn()->query($reservation);
      
      if($query_reservation->num_rows > 0) {
      while($row_reservation = $query_reservation->fetch_array()) {
       
        $date1=date_create($row_reservation['checkin']);
        $date2=date_create($row_reservation['checkout']);

        $diff=date_diff($date1, $date2);

        $roomid = $row_reservation['roomid'];
        $room = "SELECT * FROM rooms WHERE id='$roomid'";
        $query_room = $objDB->conn()->query($room);

        while($row_room = $query_room->fetch_array()) {
        ?>
         <div class="col-lg-12">
       <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="assets/images/<?php echo $row_room['picture'] ?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row_room['room']; ?></h5>
                  <p class="card-text"><?php echo $row_room['description']; ?></p>
                  <p class="card-text"><span class="fw-bold"><?php echo strtoupper($row_reservation['name']); ?></span> - <?php echo $row_reservation['address']; ?> | <?php echo $row_reservation['phone']; ?></p>
                  <p>Room Price: <span class='fw-bold text-primary'>₱<?php echo number_format($row_room['price'], 2); ?> per day</span></p>
                  <span class="card-title"><small class="text-muted"><i>Amount: </i></small>₱<?php echo number_format($row_reservation['total_payment'], 2); ?></span>
                  <div class="fw-bold"><i class="bi bi-calendar-check-fill"></i> <?php echo date('M d, Y', strtotime($row_reservation['checkin'])); ?> - <?php echo date('M d, Y', strtotime($row_reservation['checkout'])); ?> | <?php if($diff->format('%a') == '1') { echo $diff->format('%a Day'); } else { echo $diff->format('%a Days'); }?></div>
                  <?php if($row_reservation['status'] == 2) { ?>
                    <div class="text-success mt-2">Payment Transaction Completed!</div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } } }
        
        else { ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-4 text-muted">No Data Found</h5>
            </div>
          </div>
    
        <?php }

        ?>
      </div>
      <?php } ?>

      <?php if($_SESSION['type'] == 'guest') {?>
    <div class="row">
     <?php 

      $objDB = new Database;
      $userid = $_GET['id'];
      $reservation = "SELECT * FROM reservation WHERE userid='$userid' AND status=2 ORDER BY created_at DESC";
      $query_reservation = $objDB->conn()->query($reservation);

      if($query_reservation->num_rows > 0) {
      while($row_reservation = $query_reservation->fetch_array()) {
       
        $date1=date_create($row_reservation['checkin']);
        $date2=date_create($row_reservation['checkout']);

        $diff=date_diff($date1, $date2);

        $roomid = $row_reservation['roomid'];
        $room = "SELECT * FROM rooms WHERE id='$roomid'";
        $query_room = $objDB->conn()->query($room);

        while($row_room = $query_room->fetch_array()) {
        ?>
         <div class="col-lg-12">
       <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="assets/images/<?php echo $row_room['picture'] ?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row_room['room']; ?></h5>
                  <p class="card-text"><?php echo $row_room['description']; ?></p>
                  <p class="card-text"><span class="fw-bold"><?php echo strtoupper($row_reservation['name']); ?></span> - <?php echo $row_reservation['address']; ?> | <?php echo $row_reservation['phone']; ?></p>
                  <p>Room Price: <span class='fw-bold text-primary'>₱<?php echo number_format($row_room['price'], 2); ?> per day</span></p>
                  <span class="card-title"><small class="text-muted"><i>Amount: </i></small>₱<?php echo number_format($row_reservation['total_payment'], 2); ?></span>
                  <div class="fw-bold"><i class="bi bi-calendar-check-fill"></i> <?php echo date('M d, Y', strtotime($row_reservation['checkin'])); ?> - <?php echo date('M d, Y', strtotime($row_reservation['checkout'])); ?> | <?php if($diff->format('%a') == '1') { echo $diff->format('%a Day'); } else { echo $diff->format('%a Days'); }?></div>
                  <?php if($row_reservation['status'] == 2) { ?>
                    <div class="text-success mt-2">Payment Transaction Completed! Thank You for staying in.</div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
      <?php }
    
    else { ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title mt-4 text-muted">No Data Found</h5>
        </div>
      </div>

    <?php }
    
    } ?>
      
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
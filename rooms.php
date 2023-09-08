<?php 

session_start();

if(empty($_SESSION['id'])) {
  header('Location: '.$_SERVER['name'].'/mrs');
}

if($_SESSION['type'] == 'guest') {
  header('Location: '.$_SERVER['name'].'/mrs/dashboard');
}

include('components/header.php');
include ($_SERVER['DOCUMENT_ROOT'].'/mrs/backend/server-config.php');
include('navbar.php');
include('sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Rooms</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Rooms</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
      <div class="col-lg-12">
      
            <!-- Modal Dialog Scrollable -->
              <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                Add Room
              </button>

              <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New Room</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

          <div class="">
            <div class="card-body">
              <h5 class="card-title">Room Information</h5>

              <!-- General Form Elements -->
              <form action="web/route.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Room Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="room" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Room Description</label>
                  <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Maximum Guest</label>
                  <div class="col-sm-10">
                    <input type="number" name="maxguest" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Upload Picture</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="file" type="file" id="formFile" required>
                  </div>
                </div>
            </div>
          </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="addroom" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Modal Dialog Scrollable-->

              </form><!-- End General Form Elements -->

      </div>

      <?php 

      $objDB = new Database;

      $room = "SELECT * FROM rooms ORDER BY created_at DESC";
      $query = $objDB->conn()->query($room);
      if($query->num_rows > 0) {
      while($row = $query->fetch_array()) {
          $_GET['roomid'] = $row['id'];
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
              <?php } ?>
              <?php if($row['status'] == 0) { ?>
                      <p class="text-danger">Not Available until <?php echo date('M d, Y', strtotime($row['checkout'])); ?></p>
              <?php } ?>
              <form action="web/route.php" method="POST" class="d-inline">
                <input type="text" class="form-control" name="roomid" value="<?php echo $row['id']; ?>" hidden>
                <button type="submit" name="deleteroom" class="btn btn-danger text-white float-end m-1"><i class="bi bi-trash-fill"></i></button>
              </form>
              <a href="edit-room?roomid=<?php echo $_GET['roomid']; ?>" class="btn btn-success text-white float-end m-1"><i class="bi bi-pen-fill"></i></a>
            </div>

      </div><!-- End Card with an image on top -->
      </div>
        <?php } }
         else { ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-4 text-muted">No Data Found</h5>
            </div>
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
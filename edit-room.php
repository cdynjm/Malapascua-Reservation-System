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
      <h1>Edit Room</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Edit Room Information</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
          
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Room Information</h5>
    <?php 

      $objDB = new Database;
      $roomid = $_GET['roomid'];
      $room = "SELECT * FROM rooms WHERE id='$roomid'";
      $query = $objDB->conn()->query($room);
      
      while($row = $query->fetch_array()) {
      ?>

              <!-- General Form Elements -->
              <form action="web/route.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Room Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="room" value="<?php echo $row['room']; ?>" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Room Description</label>
                  <div class="col-sm-10">
                    <input type="text" name="description" value="<?php echo $row['description']; ?>" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" name="price" value="<?php echo $row['price']; ?>" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Maximum Guest</label>
                  <div class="col-sm-10">
                    <input type="number" name="maxguest" value="<?php echo $row['maxguest']; ?>" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Picture</label>
                  <div class="col-sm-10">
                  <img src="assets/images/<?php echo $row['picture'] ?>" class="card-img-top h-auto w-50" alt="...">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Upload New Picture</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="file" type="file" id="formFile">
                  </div>
                </div>
                <input type="text" class="form-control" name="roomid" value="<?php echo $row['id']; ?>" hidden>
                <input type="text" class="form-control" name="oldpicture" value="<?php echo $row['picture']; ?>" hidden>
                <button class="btn btn-success" type="submit" name="editroom">Save</button>
                </form>

            <?php } ?>
            </div>
          </div>

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
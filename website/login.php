<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
    <!-- <h1>
        SELAMAT DATANG 
        <?php
            echo $_SESSION["user"];
        ?>
    </h1> -->
    <div class="container-fluid pb-3 flex-column sm-row overflow-auto">
      <div class="row flex-grow-sm-1 flex-grow-0">
          <aside class="col-3  flex-shrink-1 flex-grow-0 sticky-top">
              <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                  <ul class="nav nav-pills row mb-auto text-truncate">
                      <li class="nav-item">
                          <a href="#" class="nav-link px-2 text-truncate">
                              <i class="bi bi-house fs-5"></i>
                              <span class="d-none d-sm-inline">Home</span>
                          </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-2 text-truncate">
                              <i class="bi bi-speedometer fs-5"></i>
                              <span class="d-none d-sm-inline">Dashboard</span>
                          </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-card-text fs-5"></i>
                              <span class="d-none d-sm-inline">Orders</span> </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-bricks fs-5"></i>
                              <span class="d-none d-sm-inline">Products</span> </a>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                              <span class="d-none d-sm-inline">Customers</span> </a>
                      </li>
                  </ul>
              </div>
          </aside>
          <!-- <main class="col overflow-auto h-100">
              <div class="bg-light border">
                  <h2>Main</h2>
                  <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
                  <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>
                  <hr />
                  <h4>More content...</h4>
                  <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>
                  <hr />
                  <h4>More content...</h4>
                  <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
              </div>
          </main> -->
      </div>
  </div>
</body>
</html>
<?php
    include("footer.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_destroy();
        header("Location: index.php");
        exit();
    }
    function user_deposit(){
             
    }
?>


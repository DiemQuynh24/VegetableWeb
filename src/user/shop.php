<!DOCTYPE html>
<?php include("connect.php")?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="Search">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    <!-- Modal Search Start -->

    <!-- Modal Search End -->

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <?php
        session_start();
        include_once 'layout/header.php';
    ?>
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-body d-flex align-items-center">
                <form class="input-group w-75 mx-auto d-flex" method="get" action="./shop.php">
                    <input type="text" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1"
                        name="text-search">
                    <input type="submit" class="input-group-text" value="Search" name="input-search">
                </form>
            </div>
        </div>
    </div>
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <!-- <h1 class="mb-4">Fresh fruits shop</h1> -->
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Sắp xếp giá:</label>
                                <form id="fruitform" method="get">
                                    <select id="fruits" name="sort" class="border-0 form-select-sm bg-light me-3"
                                        form="fruitform" onchange="this.form.submit()">
                                        <option value="default"
                                            <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'default') ? 'selected' : ''; ?>>
                                            Mặc định</option>
                                        <option value="low_to_high"
                                            <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'low_to_high') ? 'selected' : ''; ?>>
                                            Giá: Thấp tới cao</option>
                                        <option value="high_to_low"
                                            <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'high_to_low') ? 'selected' : ''; ?>>
                                            Giá: Cao tới thấp</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <?php 
                                if(isset($_GET["input-search"])) {
                                    echo '<div class="row g-4">';
                                    if(isset($_GET["text-search"])){
                                        $search = mysqli_real_escape_string($code, $_GET['text-search']);
                                        $qr = mysqli_query($code, "SELECT * FROM product WHERE name LIKE '%$search%'");

                                        while ($row = mysqli_fetch_assoc($qr)) {
                                            $imagePath = "/VegetableWeb/img/product/" . $row['image'];
                                            ?>
                            <a href="./shop-detail.php?id=<?php echo $row['id']; ?>" class="col-md-6 col-lg-4 col-xl-3"
                                style="float: left !important;">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="<?php echo $imagePath; ?>" class="img-fluid w-100 rounded-top"
                                            style="height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">
                                        <?php echo $row['category']; ?>
                                    </div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom fruite-content">
                                        <h4><?php echo $row['name']; ?></h4>
                                        <p><?php echo $row['short_desc']; ?></p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0 price">$<?php echo $row['price']; ?> /
                                                kg</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php
                                        }
                                    }
                                    echo '</div>';
                                }else {
                                    echo '<div class="row g-4 justify-content-center">';
                                        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
                                        switch ($sort) {
                                            case 'low_to_high':
                                                $orderBy = "ORDER BY price ASC";
                                                break;
                                            case 'high_to_low':
                                                $orderBy = "ORDER BY price DESC";
                                                break;
                                            default:
                                                $orderBy = "";
                                                break;
                                        }
                                        $qr = mysqli_query($code, "SELECT * FROM product $orderBy");
                                        while ($row = mysqli_fetch_assoc($qr)) {
                                            $imagePath = "/VegetableWeb/img/product/" . $row['image'];
                                            ?>
                            <a href="./shop-detail.php?id=<?php echo $row['id']; ?>" class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="<?php echo $imagePath; ?>" class="img-fluid w-100 rounded-top"
                                            style="height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">
                                        <?php echo $row['category']; ?>
                                    </div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom fruite-content">
                                        <h4><?php echo $row['name']; ?></h4>
                                        <p><?php echo $row['short_desc']; ?></p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0 price">$<?php echo $row['price']; ?> /
                                                kg</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php    
                                        }
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- FOOTER -->
    <?php include_once 'layout/footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Flying Fruits & Veggies Start -->
    <style>
    .floating-icon {
        position: fixed;
        z-index: 1;
        font-size: 24px;
        animation: floatIcon 20s linear infinite;
        opacity: 0.7;
        pointer-events: none;
    }

    @keyframes floatIcon {
        0% {
        transform: translateY(100vh) translateX(0) rotate(0deg);
        opacity: 0;
        }
        10% {
        opacity: 0.6;
        }
        100% {
        transform: translateY(-120vh) translateX(60px) rotate(360deg);
        opacity: 0;
        }
    }
    </style>

    <script>
    const foodIcons = [
        "🍎", "🍌", "🍊", "🍉", "🍇", "🍍", "🍒", "🥝", "🍓",
        "🥑", "🥭", "🍅", "🥬", "🥦", "🥕", "🌽", "🧄", "🧅"
    ];

    function createFloatingIcon() {
        const icon = document.createElement("div");
        icon.classList.add("floating-icon");
        icon.textContent = foodIcons[Math.floor(Math.random() * foodIcons.length)];
        icon.style.left = Math.random() * 100 + "vw";
        icon.style.top = "100vh";
        icon.style.fontSize = (Math.random() * 20 + 20) + "px";
        icon.style.animationDuration = (Math.random() * 10 + 15) + "s";
        document.body.appendChild(icon);

        setTimeout(() => icon.remove(), 25000);
    }

    setInterval(createFloatingIcon, 600);
    </script>
    <!-- Flying Fruits & Veggies End -->

</body>

</html>
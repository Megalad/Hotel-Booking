<?php 
    include 'connect.php'; 
    include 'DBHandler.php'; 
    
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "<script>window.location.href='room.php';</script>";
        exit();
    }

    $id = $_GET['id'];
    $room = getRoomTypeById($con, $id);
    $images = getRoomImages($con, $id);
    $similarRooms = getSimilarRooms($con, $id);

    if (!$room) {
        echo "<div class='container py-5 text-center'><h2>Room not found</h2><a href='room.php' class='btn btn-dark'>Back to Rooms</a></div>";
        exit();
    }

    $heroImage = !empty($images) ? $images[0] : 'https://via.placeholder.com/1920x1080?text=No+Image';

    if(!empty($images)) array_shift($images);

    include 'header.php'; 
?>

<style>
    .room-hero, .room-hero h1, .room-hero .hero-title {
        color: #ffffff !important;
        text-shadow: 0 2px 8px rgba(0,0,0,0.7) !important; 
    }
    
    .room-hero p, .room-hero .hero-subtitle {
        color: #eeeeee !important;
        text-shadow: 0 1px 4px rgba(0,0,0,0.6) !important;
    }

    .hero-badges .badge {
        background-color: #fff !important;
        color: #000 !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .sticky-book-bar {
        background: #fff !important;
        border-bottom: 1px solid #ddd;
    }
    .sticky-room-name {
        color: #000 !important;
    }
</style>

<div class="sticky-book-bar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span class="sticky-room-name fw-bold"><?php echo $room['roomTypeName']; ?></span>
        </div>
        <div class="d-flex align-items-center">
            <div class="text-end me-3">
                <span class="d-block text-muted small">Starting from</span>
                <span class="sticky-price fw-bold text-dark">THB <?php echo number_format($room['price']); ?></span>
            </div>
            <button class="btn btn-dark btn-book-now text-uppercase" style="letter-spacing: 1px;">Check Rates</button>
        </div>
    </div>
</div>

<header class="room-hero" style="background-image: url('<?php echo $heroImage; ?>');">
    <div class="hero-overlay"></div>
    <div class="hero-content container fade-in-up">
        <div class="hero-badges mb-4">
            <span class="badge text-uppercase px-3 py-2 rounded-0">Luxury Collection</span>
        </div>
        <h1 class="hero-title"><?php echo $room['roomTypeName']; ?></h1>
        <p class="hero-subtitle">Experience the finest in comfort and style.</p>
    </div>
    
    
    <a href="#room-details" class="scroll-indicator">
        <span class="mouse">
            <span class="wheel"></span>
        </span>
    </a>
</header>


<div class="bg-light border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small text-uppercase" style="letter-spacing: 1px;">
                <li class="breadcrumb-item"><a href="index.php" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="room.php" class="text-muted text-decoration-none">Rooms</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page"><?php echo $room['roomTypeName']; ?></li>
            </ol>
        </nav>
    </div>
</div>


<section id="room-details" class="py-5 section-fade">
    <div class="container py-4">
        <div class="row g-5">
            
            
            <div class="col-lg-8">
                <h2 class="section-heading mb-4 font-cinzel">Overview</h2>
                <p class="room-description lead text-muted mb-5" style="line-height: 1.8;">
                    <?php echo $room['description']; ?>
                </p>

                <h3 class="section-subheading mb-4 text-uppercase small fw-bold text-muted" style="letter-spacing: 2px;">Room Amenities</h3>
                <div class="row g-4 mb-5">
                    <div class="col-6 col-md-4">
                        <div class="amenity-item d-flex align-items-center">
                            <i class="fas fa-wifi fa-lg me-3 text-muted"></i>
                            <span>High-Speed Wifi</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="amenity-item d-flex align-items-center">
                            <i class="fas fa-tv fa-lg me-3 text-muted"></i>
                            <span>55" Smart TV</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="amenity-item d-flex align-items-center">
                            <i class="fas fa-snowflake fa-lg me-3 text-muted"></i>
                            <span>Air Conditioning</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="amenity-item d-flex align-items-center">
                            <i class="fas fa-coffee fa-lg me-3 text-muted"></i>
                            <span>Espresso Machine</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="amenity-item d-flex align-items-center">
                            <i class="fas fa-lock fa-lg me-3 text-muted"></i>
                            <span>In-room Safe</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="amenity-item d-flex align-items-center">
                            <i class="fas fa-concierge-bell fa-lg me-3 text-muted"></i>
                            <span>24/7 Room Service</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card booking-card shadow-sm border-0 sticky-top" style="top: 100px; z-index: 900;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-price mb-0 font-cinzel">THB <?php echo number_format($room['price']); ?></h4>
                            <span class="text-muted small">/ night</span>
                        </div>
                        
                        <hr class="my-3">

                        <ul class="list-unstyled room-facts mb-4">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-user-group me-3 text-muted"></i>
                                <div>
                                    <strong class="small text-uppercase">Occupancy</strong><br>
                                    <span class="text-muted small"><?php echo $room['maxAdults']; ?> Adults, <?php echo $room['maxChildren']; ?> Children</span>
                                </div>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-bed me-3 text-muted"></i>
                                <div>
                                    <strong class="small text-uppercase">Max Guests</strong><br>
                                    <span class="text-muted small">Up to <?php echo $room['maxOccupancy']; ?> People</span>
                                </div>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-3"></i>
                                <div>
                                    <strong class="small text-uppercase">Availability</strong><br>
                                    <span class="text-success small">Available Now</span>
                                </div>
                            </li>
                        </ul>

                        <button class="btn btn-dark w-100 py-3 text-uppercase fw-bold ls-1 btn-book-trigger" style="letter-spacing: 2px;">Check Availability</button>
                        <div class="text-center mt-3">
                            <small class="text-muted"><i class="fas fa-shield-alt me-1"></i> Best Price Guaranteed</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php if(!empty($images)): ?>
<section class="bg-light py-5">
    <div class="container py-4">
        <h2 class="section-heading text-center mb-5 font-cinzel text-uppercase" style="letter-spacing: 3px;">Visual Gallery</h2>
        <div class="row g-3">
            <?php if(isset($images[0])): ?>
            <div class="col-md-8">
                <div class="gallery-img-container h-100 position-relative overflow-hidden">
                    <img src="<?php echo $images[0]; ?>" alt="Gallery 1" class="gallery-img w-100 h-100" style="object-fit: cover; min-height: 400px;">
                </div>
            </div>
            <?php endif; ?>

            <div class="col-md-4">
                <div class="d-flex flex-column gap-3 h-100">
                    <?php if(isset($images[1])): ?>
                    <div class="gallery-img-container flex-grow-1 position-relative overflow-hidden">
                        <img src="<?php echo $images[1]; ?>" alt="Gallery 2" class="gallery-img w-100 h-100" style="object-fit: cover; min-height: 190px;">
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($images[2])): ?>
                    <div class="gallery-img-container flex-grow-1 position-relative overflow-hidden">
                        <img src="<?php echo $images[2]; ?>" alt="Gallery 3" class="gallery-img w-100 h-100" style="object-fit: cover; min-height: 190px;">
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php for($i = 3; $i < count($images); $i++): ?>
                <div class="col-md-4 col-6">
                    <div class="gallery-img-container position-relative overflow-hidden" style="height: 250px;">
                        <img src="<?php echo $images[$i]; ?>" alt="Gallery Item" class="gallery-img w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="py-5">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h2 class="section-heading mb-0 font-cinzel">More Rooms</h2>
            <a href="room.php" class="text-decoration-none text-dark fw-bold">View All <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
        
        <div class="row g-4">
            <?php while($simRoom = mysqli_fetch_assoc($similarRooms)): ?>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm similar-room-card">
                    <div class="bg-light text-center py-5 text-muted d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-bed fa-2x"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-cinzel"><?php echo $simRoom['roomTypeName']; ?></h5>
                        <p class="card-text text-muted small"><?php echo substr($simRoom['description'], 0, 80); ?>...</p>
                        <a href="roomDetail.php?id=<?php echo $simRoom['roomTypeID']; ?>" class="stretched-link text-danger fw-bold text-decoration-none text-uppercase" style="font-size: 0.8rem;">View Details</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<div class="fixed-bottom d-md-none bg-white border-top p-3 shadow-lg">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span class="small text-muted d-block">Total per night</span>
            <span class="fw-bold text-dark fs-5">THB <?php echo number_format($room['price']); ?></span>
        </div>
        <button class="btn btn-dark px-4 py-2 text-uppercase fw-bold">Check Rates</button>
    </div>
</div>

<?php include 'footer.php'; ?>
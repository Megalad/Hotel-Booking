<?php 
    include 'header.php';
    include 'connect.php'; 
    include 'DBHandler.php'; 

    $roomList = getRooms($con);
?>

<div class="container py-5">
    
    <div class="row mb-5">
        <div class="col-lg-8">
            <h2 class="section-title">GUEST ROOMS (<?php echo count($roomList); ?>)</h2>
            
            <p class="section-desc">
                Our stylish and well-appointed guest rooms offer the very best in comfort and privacy, while providing a peaceful retreat in which to relax and unwind throughout your stay.
            </p>
        </div>
    </div>

    <div class="row g-5">
        
        <?php
            foreach($roomList as $room) {
                $roomID = $room['roomTypeID'];
                
                $imgUrl = isset($room['image_url']) && !empty($room['image_url']) ? $room['image_url'] : 'https://via.placeholder.com/600x400?text=Room';
        ?>
        
        <div class="col-12 col-md-6">
            <div class="room-card">
                <a href="roomDetails.php?id=<?php echo $roomID; ?>" class="room-image-container d-block">
                    <img src="<?php echo $imgUrl; ?>" alt="<?php echo $room['roomTypeName']; ?>" class="room-img">
                </a>

                <div class="room-content">
                    <!-- LINK 2: Make the Title Clickable -->
                    <h3 class="room-name">
                        <a href="roomDetails.php?id=<?php echo $roomID; ?>" class="text-decoration-none text-dark d-flex align-items-center">
                            <?php echo $room['roomTypeName']; ?> 
                            <i class="fas fa-arrow-right ms-2 arrow-icon"></i>
                        </a>
                    </h3>
                    
                    <p class="mb-3 text-muted" style="font-size: 0.9rem;">
                        Starting from <strong>THB <?php echo number_format($room['price']); ?></strong> / night
                    </p>

                    <ul class="amenity-list">
                        <li>
                            <span class="icon-width"><i class="fas fa-info-circle"></i></span>
                            <?php echo substr($room['description'], 0, 100) . '...'; ?>
                        </li>
                        
                        <li>
                            <span class="icon-width"><i class="fas fa-user-group"></i></span>
                            <?php echo $room['maxOccupancy']; ?> guests, including up to <?php echo $room['maxChildren']; ?> children
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php 
            } // End Foreach
        ?>

    </div>
</div>

<style>
    /* ... existing styles ... */
    
    .section-title {
        font-family: 'Cinzel', serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: #000;
    }

    .section-desc {
        font-family: 'Lato', sans-serif;
        font-size: 0.95rem;
        color: #555;
        line-height: 1.8;
        max-width: 90%;
    }

    .room-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        transition: box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .room-card:hover {
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .room-image-container {
        position: relative;
        height: 300px; 
        overflow: hidden;
    }

    .room-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .room-card:hover .room-img {
        transform: scale(1.05);
    }

    .room-content {
        padding: 30px;
        flex-grow: 1; 
    }

    .room-name {
        font-family: 'Cinzel', serif;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #000;
    }

    .arrow-icon {
        font-size: 0.8rem;
        transition: margin-left 0.3s;
    }

    .room-card:hover .arrow-icon {
        margin-left: 10px !important;
    }

    .amenity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .amenity-list li {
        font-family: 'Lato', sans-serif;
        font-size: 0.8rem;
        color: #444;
        margin-bottom: 12px;
        display: flex;
        align-items: flex-start;
        line-height: 1.5;
    }

    .icon-width {
        min-width: 30px;
        display: inline-block;
        color: #666;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php 
    include 'header.php'; 
?>

<div class="position-relative" style="height: 80vh; background: url('images/bg.png') center/cover no-repeat;">
    <div class="position-absolute bottom-0 start-0 w-100 text-center text-white pb-5" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
        <p class="fst-italic mb-1">Accommodations</p>
        <h1 class="display-4 text-uppercase" style="letter-spacing: 5px;">Deluxe Room</h1>
    </div>
</div>

<section class="py-5" style="background-color: #f9f9f9;">
    <div class="container py-4">
        
        <div class="text-center mb-5">
            <h2 class="text-uppercase" style="font-family: 'Cinzel', serif; letter-spacing: 3px;">Accommodations</h2>
            <hr class="mx-auto" style="width: 60px; height: 2px; background-color: #000; opacity: 1;">
        </div>

        <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-inner">
                
                <div class="carousel-item active">
                    <div class="row g-4">
                        
                        <div class="col-md-4">
                            <div class="room-card text-center">
                                <div class="room-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=2070&auto=format&fit=crop" class="img-fluid" alt="Room 1">
                                </div>
                                <div class="room-info shadow-sm">
                                    <h5 class="room-title">Premier River-View Room</h5>
                                    <hr class="mx-auto my-3" style="width: 40px; border-color: #000;">
                                    <p class="room-desc text-muted">Savour wide-open riverscapes from the quiet comfort of your luxurious guest room.</p>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <a href="#" class="btn btn-dark btn-square">Check Rates</a>
                                        <a href="#" class="btn btn-outline-dark btn-square">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-none d-md-block">
                            <div class="room-card text-center">
                                <div class="room-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=1974&auto=format&fit=crop" class="img-fluid" alt="Room 2">
                                </div>
                                <div class="room-info shadow-sm">
                                    <h5 class="room-title">Executive Suite</h5>
                                    <hr class="mx-auto my-3" style="width: 40px; border-color: #000;">
                                    <p class="room-desc text-muted">Enjoy extra space and glittering night views in this sophisticated suite layout.</p>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <a href="#" class="btn btn-dark btn-square">Check Rates</a>
                                        <a href="#" class="btn btn-outline-dark btn-square">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-none d-md-block">
                            <div class="room-card text-center">
                                <div class="room-img-wrapper">
                                    <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=1974&auto=format&fit=crop" class="img-fluid" alt="Room 3">
                                </div>
                                <div class="room-info shadow-sm">
                                    <h5 class="room-title">Riverside Terrace</h5>
                                    <hr class="mx-auto my-3" style="width: 40px; border-color: #000;">
                                    <p class="room-desc text-muted">Relax on your private terrace watching the Chao Phraya wake up in the morning light.</p>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <a href="#" class="btn btn-dark btn-square">Check Rates</a>
                                        <a href="#" class="btn btn-outline-dark btn-square">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row g-4">
                         <div class="col-md-4"><div class="room-card text-center"><div class="room-img-wrapper"><img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=2025" class="img-fluid"></div><div class="room-info shadow-sm"><h5 class="room-title">Family Suite</h5><div class="d-flex justify-content-center gap-2 mt-3"><a href="#" class="btn btn-dark btn-square">Check Rates</a></div></div></div></div>
                         <div class="col-md-4 d-none d-md-block"><div class="room-card text-center"><div class="room-img-wrapper"><img src="https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?q=80&w=2070" class="img-fluid"></div><div class="room-info shadow-sm"><h5 class="room-title">Presidential Suite</h5><div class="d-flex justify-content-center gap-2 mt-3"><a href="#" class="btn btn-dark btn-square">Check Rates</a></div></div></div></div>
                         <div class="col-md-4 d-none d-md-block"><div class="room-card text-center"><div class="room-img-wrapper"><img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?q=80&w=2070" class="img-fluid"></div><div class="room-info shadow-sm"><h5 class="room-title">The Penthouse</h5><div class="d-flex justify-content-center gap-2 mt-3"><a href="#" class="btn btn-dark btn-square">Check Rates</a></div></div></div></div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-center mt-4 gap-3">
                <button class="btn btn-outline-dark rounded-circle" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev" style="width: 40px; height: 40px;">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="align-self-center fw-bold" style="letter-spacing: 2px;">1 / 2</div>
                <button class="btn btn-outline-dark rounded-circle" type="button" data-bs-target="#roomCarousel" data-bs-slide="next" style="width: 40px; height: 40px;">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
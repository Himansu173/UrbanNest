<?php 
require_once "navbar.php";
require_once "../../database/propertiesDetailsDb.php";
?>
<div class="container-fluid my-2 d-flex justify-content-center">
    <div class="row my-1 g-3" style="max-width:1600px">
        <div class="row p-0 m-0">
            <div class="col-6 d-md-none d-block">
                <span class="px-4 btn border rounded fw-semibold shadow-sm" onclick="toggleFilters()"
                    style="cursor:pointer"><i class="bi bi-funnel"></i> Filter</span>
            </div>
            <div class="col-6 d-md-none text-end">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle px-2 border rounded fw-semibold shadow-sm"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-filter"></i> Sort By
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item" type="button">Popularity</button></li>
                        <li><button class="dropdown-item" type="button">Price -- Low to High</button></li>
                        <li><button class="dropdown-item" type="button">Price -- High to Low</button></li>
                        <li><button class="dropdown-item" type="button">Newest First</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-2 g-0 d-flex" id="FilterConainer">
            <?php 
                require_once "sideFilter.php";
            ?>
            <div class="w-100 d-md-none h-100 position-absolute" onclick="toggleFilters()"></div>
        </div>
        <div class="col-md-10">
            <div class="d-md-flex d-none mb-2">
                <span class="fw-bold mx-2">Sort By</span>
                <div class="sortBySelect">
                    <span class="mx-2 fw-medium pb-1 sortByElement" style="cursor:pointer;"
                        onclick="highlightSortBy(this)">Popularity</span>
                    <span class="mx-2 fw-medium pb-1 sortByElement" style="cursor:pointer;"
                        onclick="highlightSortBy(this)">Price -- Low to High</span>
                    <span class="mx-2 fw-medium pb-1 sortByElement" style="cursor:pointer;"
                        onclick="highlightSortBy(this)">Price -- High to Low</span>
                    <span class="mx-2 fw-medium pb-1 sortByElement" style="cursor:pointer;"
                        onclick="highlightSortBy(this)">Newest First</span>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-around" id="propertyCardContainer">
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    if (screen.width < 768) {
        $("#FilterConainer").removeClass("col");
        $("#FilterConainer").addClass("hidden");
    }
    function highlightSortBy(ele) {
        $(".sortByElement").removeClass("highlightEle");
        $(ele).addClass("highlightEle");
    }
    function toggleFilters() {
        var hidden = $('.hidden');
        if (hidden.hasClass('visible')) {
            hidden.animate({ "left": "-100%" }, "medium").removeClass('visible');
        } else {
            hidden.animate({ "left": "0px" }, "medium").addClass('visible');
        }
    }
</script>
<?php 
    require_once "footer.php";
    $page=isset($_GET['page'])?$_GET['page']:1;
    $data=getPropertyPerPage($page);
    while($property=$data->fetch_assoc()){
        $loc=getPropertyLocation($property['pid']);
        $images=getPropertyImg($property['pid']);
        ?>
        <script>
        $("#propertyCardContainer").append(`
            <div class="card property-card border-0 overflow-hidden mb-4" style="cursor:pointer;">
                <div id="<?php echo $property['pid'] ?>" class="carousel slide w-100">
                    <div class="carousel-inner h-100 w-100" onclick="window.location = 'propertyDetails.php?id=<?php echo $property['pid'] ?>'">
                        <?php
                            foreach ($images as $key => $value) {
                                echo "<div class='carousel-item ".($key==0?"active":"")."'><img src='../../database/".$value['imgpath']."' class='card-img' alt='ax' height='200px'></div>";
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev z-3" type="button" data-bs-target="<?php echo '#'.$property['pid'] ?>"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-secondary rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next z-3" type="button" data-bs-target="<?php echo '#'.$property['pid'] ?>"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-secondary rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body p-2 property-body bg-white" onclick="window.location = 'propertyDetails.php?id=<?php echo $property['pid'] ?>'">
                    <h5 class="card-title text-primary-emphasis"><?php 
                        if($loc){
                            echo $loc['locality'];
                        }else{
                            echo "Unknown";
                        }
                    ?></h5>
                    <p class="card-text mb-1 fs-6">
                        <img src="../assets/img/bed.png" alt="img" width="20rem">
                        <span class="ms-1" style="font-size:0.9rem;"><?php
                            if($loc){
                                echo $property['house_type']." ".$property['property_type']." property for ".$property['listing_type']." in ".$loc['city'].", ".$loc['state'];
                            }else{
                                echo $property['house_type']." ".$property['property_type']." property for ".$property['listing_type'];
                            }
                        ?></span>
                    </p>
                    <p class="card-text mb-1 fs-4 text-primary-emphasis m-0 fw-semibold">&#8377; <?php echo getPropertyPrice($property['pid']) ?></p>
                    <div class="row g-0">
                        <p class="col-6 mb-0 fw-medium"><?php echo $property['area'] ?> Sq.Ft</p>
                        <p class="col-6 mb-0 fw-medium text-end"><?php echo $property['furnishing_type'] ?></p>
                    </div>
                    <div class="row g-0">
                        <p class="col-6 mb-0" style="font-size:0.9rem">Build-up Area</p>
                        <p class="col-6 mb-0 text-end" style="font-size:0.9rem">Furnishing Status</p>
                    </div>
                </div>
            </div>
        `);
    </script>
    <?php
    }
    $pagination_page=getNumberOfPage();
    ?>
    <script>
        let pagination=`<li class="page-item">
                    <a class="page-link" href="./allProperties.php?page=<?php $_GET['page']==1?print($_GET['page']):print($_GET['page']-1) ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>`;
        for ($i=0; $i < <?php echo $pagination_page ?>; $i++) { 
            pagination+=`<li class="page-item"><a class="page-link" href="./allProperties.php?page=${$i+1}">${$i+1}</a></li>`;
        }
        pagination+=`<li class="page-item">
                    <a class="page-link" href="./allProperties.php?page=<?php $_GET['page']==$pagination_page?print($pagination_page):print($_GET['page']+1) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>`;
        $(".pagination").html(pagination);
    </script>
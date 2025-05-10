<div class="p-md-2 p-3 z-3" style="background-color:#f5f5f5; max-width:70vw;">
    <div class="row">
        <div class="col-6">
            <h5>Filters</h5>
        </div>
        <div class="col-6 text-end">
            <span class="text-primary fw-semibold" style="cursor:pointer; font-size:0.9rem;" onclick="deleteAllFilter()">CLEAR ALL</span>
        </div>
    </div>
    <div class="d-flex flex-wrap" id="filterList">
        <div class="appledFilter card px-2 py-1 m-1" style="cursor:pointer; font-size:0.9rem" onMouseOver="this.style.textDecoration='line-through'" onMouseOut="this.style.textDecoration='none'" onclick="deleteFilter(this)">&#x2715; 3 BHK</div>
        <div class="appledFilter card px-2 py-1 m-1" style="cursor:pointer; font-size:0.9rem" onMouseOver="this.style.textDecoration='line-through'" onMouseOut="this.style.textDecoration='none'" onclick="deleteFilter(this)">&#x2715; 3 location</div>
        <div class="appledFilter card px-2 py-1 m-1" style="cursor:pointer; font-size:0.9rem" onMouseOver="this.style.textDecoration='line-through'" onMouseOut="this.style.textDecoration='none'" onclick="deleteFilter(this)">&#x2715; 3 parking</div>
        <div class="appledFilter card px-2 py-1 m-1" style="cursor:pointer; font-size:0.9rem" onMouseOver="this.style.textDecoration='line-through'" onMouseOut="this.style.textDecoration='none'" onclick="deleteFilter(this)">&#x2715; 3 water</div>
        <div class="appledFilter card px-2 py-1 m-1" style="cursor:pointer; font-size:0.9rem" onMouseOver="this.style.textDecoration='line-through'" onMouseOut="this.style.textDecoration='none'" onclick="deleteFilter(this)">&#x2715; 3 fire</div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 d-flex align-items-center flex-nowrap fw-medium">
            Price Range
        </div>
        <div class="row g-1" id="priceRangeDiv">
            <div class="col-md-6 col-12">
                <div class="input-group mt-1">
                    <span class="input-group-text px-1">Min</span>
                    <input type="text" class="form-control px-1" value="0">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mt-1">
                    <span class="input-group-text px-1">Max</span>
                    <input type="text" class="form-control px-1" value="50000">
                </div>
            </div>
        </div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 d-flex align-items-center flex-nowrap fw-medium">
            Location
        </div>
        <div>
            <input type="text" id="location" class="form-control px-1" value="Bhubaneswar">
        </div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 row" onclick="toogleFilter('#propertyTypeArrow','#propertyTypeDiv')" style="cursor:pointer">
            <div class="d-flex align-items-center col-10 overflow-hidden fw-medium">
                Property Type
            </div>
            <div class="d-flex align-items-center justify-content-end col-2 overflow-hidden" id="propertyTypeArrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
            </div>
        </div>
        <div id="propertyTypeDiv">
            <div class="form-check mt-1">
                <input class="form-check-input" value="residental" type="checkbox" id="residental" style="cursor:pointer">
                <label class="form-check-label" for="residental" style="cursor:pointer">
                    Residental
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="commercial" type="checkbox" id="commercial" style="cursor:pointer">
                <label class="form-check-label" for="commercial" style="cursor:pointer">
                    Commercial
                </label>
            </div>
        </div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 row" onclick="toogleFilter('#listingTypeArrow','#listingTypeDiv')" style="cursor:pointer">
            <div class="d-flex align-items-center col-10 overflow-hidden fw-medium">
                Listing Type
            </div>
            <div class="d-flex align-items-center justify-content-end col-2 overflow-hidden" id="listingTypeArrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
            </div>
        </div>
        <div id="listingTypeDiv">
            <div class="form-check mt-1">
                <input class="form-check-input" value="rent" type="checkbox" id="rent" style="cursor:pointer">
                <label class="form-check-label" for="rent" style="cursor:pointer">
                    Rent
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="buy" type="checkbox" id="buy" style="cursor:pointer">
                <label class="form-check-label" for="buy" style="cursor:pointer">
                    Buy
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="pg" type="checkbox" id="pg" style="cursor:pointer">
                <label class="form-check-label" for="pg" style="cursor:pointer">
                    PG
                </label>
            </div>
        </div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 row" onclick="toogleFilter('#bhkArrow','#bhkDiv')" style="cursor:pointer">
            <div class="d-flex align-items-center col-10 overflow-hidden fw-medium">
                BHK
            </div>
            <div class="d-flex align-items-center justify-content-end col-2 overflow-hidden" id="bhkArrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
            </div>
        </div>
        <div id="bhkDiv">
            <div class="form-check mt-1">
                <input class="form-check-input" value="1bhk" type="checkbox" id="1bhk" style="cursor:pointer">
                <label class="form-check-label" for="1bhk" style="cursor:pointer">
                    1 BHK
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="2bhk" type="checkbox" id="2bhk" style="cursor:pointer">
                <label class="form-check-label" for="2bhk" style="cursor:pointer">
                    2 BHK
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="3bhk" type="checkbox" id="3bhk" style="cursor:pointer">
                <label class="form-check-label" for="3bhk" style="cursor:pointer">
                    3 BHK
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="4bhk" type="checkbox" id="4bhk" style="cursor:pointer">
                <label class="form-check-label" for="4bhk" style="cursor:pointer">
                    4 BHK
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="5bhk+" type="checkbox" id="5bhk+" style="cursor:pointer">
                <label class="form-check-label" for="5bhk+" style="cursor:pointer">
                    5 BHK And Above
                </label>
            </div>
        </div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 row" onclick="toogleFilter('#furnishingStatusArrow','#furnishingStatusDiv')" style="cursor:pointer">
            <div class="d-flex align-items-center col-10 overflow-hidden fw-medium">
                Furnishing Status
            </div>
            <div class="d-flex align-items-center justify-content-end col-2 overflow-hidden" id="furnishingStatusArrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
            </div>
        </div>
        <div id="furnishingStatusDiv">
            <div class="form-check mt-1">
                <input class="form-check-input" value="furnished" type="checkbox" id="furnished" style="cursor:pointer">
                <label class="form-check-label" for="furnished" style="cursor:pointer">
                    Furnished
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="semifurnished" type="checkbox" id="semifurnished" style="cursor:pointer">
                <label class="form-check-label" for="semifurnished" style="cursor:pointer">
                    Semi-Furnished
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="unfurnished" type="checkbox" id="unfurnished" style="cursor:pointer">
                <label class="form-check-label" for="unfurnished" style="cursor:pointer">
                    Unfurnished
                </label>
            </div>
        </div>
    </div>
    <div class="border-top border-dark-subtle mt-2">
        <div class="py-2 row" onclick="toogleFilter('#floorNumberArrow','#floorNumberDiv')" style="cursor:pointer">
            <div class="d-flex align-items-center col-10 overflow-hidden fw-medium">
                Floor Number
            </div>
            <div class="d-flex align-items-center justify-content-end col-2 overflow-hidden" id="floorNumberArrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
            </div>
        </div>
        <div id="floorNumberDiv">
            <div class="form-check mt-1">
                <input class="form-check-input" value="groundfloor" type="checkbox" id="groundfloor" style="cursor:pointer">
                <label class="form-check-label" for="groundfloor" style="cursor:pointer">
                    Ground Floor
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="firstfloor" type="checkbox" id="firstfloor" style="cursor:pointer">
                <label class="form-check-label" for="firstfloor" style="cursor:pointer">
                    First Floor
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="secondfloor" type="checkbox" id="secondfloor" style="cursor:pointer">
                <label class="form-check-label" for="secondfloor" style="cursor:pointer">
                    Second Floor
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="thirdfloor" type="checkbox" id="thirdfloor" style="cursor:pointer">
                <label class="form-check-label" for="thirdfloor" style="cursor:pointer">
                    Third Floor
                </label>
            </div>
            <div class="form-check mt-1">
                <input class="form-check-input" value="fourthfloor" type="checkbox" id="fourthfloor" style="cursor:pointer">
                <label class="form-check-label" for="fourthfloor" style="cursor:pointer">
                    Fourth Floor And Above
                </label>
            </div>
        </div>
    </div>
    <script>
        function deleteAllFilter(){
            $(".appledFilter").hide();
        }
        function deleteFilter(ele){
            $(ele).hide();
        }
        function toogleFilter(arrow,div){            
            if($(div).is(":hidden")){
                $(arrow).html(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>`)
                $(div).slideDown();
            }else {
                $(arrow).html(`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>`);
                $(div).slideUp();
            }
        }
        <?php
            $filterItems=array(
                'propertyType'=>array(),
                'listingType'=>array(),
                'bhk'=>array(),
                'furnishingStatus'=>array(),
                'floorNumber'=>array(),
            );
        ?>
    </script>
</div>
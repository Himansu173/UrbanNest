$("#edit").click(() => {
    $(".update-btn").removeClass("hide");
    $("#edit").addClass("hide");
    $(".inp-details").removeClass("read-only");
})
$(".update-btn").click(() => {
    $(".update-btn").addClass("hide");
    $("#edit").removeClass("hide");
    $(".inp-details").addClass("read-only");
})
$("#addNew").click(()=>{window.location="propertyRegister.php"})
function closePasswordUpdateModal(){
    
}

function toogleStatus(id,status){
    console.log("clicked");
}
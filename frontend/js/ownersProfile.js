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
$(".propertyStatus").click((e)=>{
    if($(e.currentTarget).hasClass("text-bg-success")){
        $(e.currentTarget).text("UnAvailable");
        $(e.currentTarget).removeClass("text-bg-success");
        $(e.currentTarget).addClass("text-bg-danger");
    }else{
        console.log("ca");
        $(e.currentTarget).text("Available");
        $(e.currentTarget).removeClass("text-bg-danger");
        $(e.currentTarget).addClass("text-bg-success");
    }
})
function closePasswordUpdateModal(){
    $("#")
}
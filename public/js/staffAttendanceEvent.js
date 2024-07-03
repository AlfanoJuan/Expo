document.onload(function(){
    $(".form-student").show();
    $(".form-external").hide();
})

function studentCheck(){
    $(".form-student").show();
    $(".form-external").hide();
}

function externalCheck(){
    $(".form-external").show();
    $("#externalPeopleEventAttendance").removeClass("d-none");
    $(".form-student").hide();
}
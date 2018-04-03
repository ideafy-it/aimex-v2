$(document).ready(function(){
    // Client Registration Scripts Begin
    $("#Others").hide();

    $("input[name=hasSpouse]:radio").click(function() {
        if($(this).val() == 'n') {
            $("#SpouseName").prop('disabled', true);
            $("#SpouseBirthDate").prop('disabled', true);
        } else {
            $("#SpouseName").prop('disabled', false);
            $("#SpouseBirthDate").prop('disabled', false);
        }
    });

    $("#Bank").change(function() {
        if($(this).val() == "Others") {
            $("#Others").show();
        } else {
            $("#Others").hide();
        }
    });

    $("input[name=employmentType]:radio").click(function() {
        if($(this).val() == 'Self Employed') {
            $("#EmployerName").prop('disabled', true);
            $("#EmploymentAddress").prop('disabled', true);
        } else {
            $("#EmployerName").prop('disabled', false);
            $("#EmploymentAddress").prop('disabled', false);
        }
    });
    // Client Registration Scripts End
});
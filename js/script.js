$(document).ready(function() {
    $("#region").change(function() {
        var region_id = $(this).val();
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: { region_id: region_id },
            success: function(data) {
                $("#district").html(data);
            }
        });
    });
});

    $("#region").change(function() {
        let region = $(this).val();
        $.post("ajax.php", { region: region }, function(data) {
            let districts = JSON.parse(data);
            $("#district").html('<option value="">Select District</option>');
            $.each(districts, function(index, value) {
                $("#district").append(`<option value="${value}">${value}</option>`);
            });
        });
    });
;

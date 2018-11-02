$(function () {
    var timeout;
    $("input[name='choice']").change(function () {
        $("input[name='choice']:not(:checked)").parent('div').removeClass('col-sm-7').addClass('col-sm-5');
        $("input[name='choice']:checked").parent('div').removeClass('col-sm-5').addClass('col-sm-7');
    });

    $(".whiter").click(function () {
        var id = $(this).attr('id');
        id = id.replace("white-", "");
        $(".choice > div").removeClass('col-sm-7').addClass('col-sm-5');
        $("." + id).removeClass('col-sm-5').addClass('col-sm-7');
        $("#" + id).prop('checked', true);
    });

    $("#spec-coin").keyup(function () {
        var val = $(this).val();
        count = val * 1000;
        $("#spec-number").val(count);
    });

    $("#spec-number").keyup(function () {
        var val = $(this).val();
        clearTimeout(timeout);
        timeout = setTimeout(function () {
                inputrp(val)
            }
            , 500);
    })

    function inputrp(val) {
        val = Math.floor(val / 1000) * 1000;
        count = val / 1000;
        $("#spec-coin").val(count);
        $("#spec-number").val(val);
        $("#spec-number").select();
    }
});
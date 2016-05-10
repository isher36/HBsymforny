function AsyncConfirmYesNo(title, msg, yesFn, me) {
    var $confirm = $("#modalConfirmYesNo");
    $confirm.modal("show");
    $("#lblTitleConfirmYesNo").html(title);
    $("#lblMsgConfirmYesNo").html(msg);
    $("#btnYesConfirmYesNo").off("click").click(function () {
        (eval(yesFn))(me);
        $confirm.modal("hide");
    });
    $("#btnNoConfirmYesNo").off("click").click(function () {

        $confirm.modal("hide");
    });
}
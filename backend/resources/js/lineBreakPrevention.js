import * as $ from "jquery";
$(function () {
    $(".edit-1")
        // cancelEnterとついたクラスにkeydownイベントを付与
        .on("keydown", function (e) {
            // e.key == 'Enter'でエンターキーが押された場合の条件を設定
            if (e.key == "Enter") {
                // 何もせずに処理を終える
                return false;
            }
        });
});

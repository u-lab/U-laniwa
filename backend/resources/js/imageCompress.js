import axios from "axios";
import Compressor from "compressorjs";

document.getElementById("forCompress").addEventListener("change", (e) => {
    const file = e.target.files[0];

    if (!file) {
        return;
    }

    new Compressor(file, {
        quality: 0.6,
        maxWidth: 1280,
        maxHeight: 720,

        // The compression process is asynchronous,
        // which means you have to access the `result` in the `success` hook function.
        success(result) {
            const formData = new FormData();

            // The third parameter is required for server
            formData.append("file", result, result.name);

            // Send the compressed image file to server with XMLHttpRequest.
            axios
                .post("/api/img/upload/profile_photo", formData)
                .then((response) => {
                    console.log("アップロードに成功しました");
                    //画像パス挿入
                    document.getElementById("profilePhotoPath").value =
                        response.data.path;
                    //画像プレビュー挿入
                    let fileReader = new FileReader();
                    fileReader.onload = function (event) {
                        document.getElementById("userImage").src =
                            fileReader.result;
                    };
                    fileReader.readAsDataURL(file);
                });
        },
        error(err) {
            console.log(err.message);
        },
    });
});

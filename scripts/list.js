document.querySelectorAll("#delete").forEach((listItem) => {
    listItem.addEventListener("click", (e) => {

        let id = listItem.dataset.listid;
        let del = document.getElementById('divList');

        let formData = new FormData();
        formData.append("id", id);

        fetch("ajax/deletelist.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((result) => {
                del.remove();
                console.log("succes", result);
            })
            .catch((error) => {
                console.error("Error:", error);
            });

    });
});
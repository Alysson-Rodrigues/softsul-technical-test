import "./bootstrap";

export function toggleMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".edit-button").forEach(function (button) {
        button.addEventListener("click", function () {
            document.getElementById("editId").value = this.dataset.id;
            document.getElementById("editCustomerName").value =
                this.dataset.name;
            document.getElementById("editCreatedAt").value =
                this.dataset.created.split(" ")[0];
            document.getElementById("editDeliveryDate").value =
                this.dataset.delivery.split(" ")[0];
            document.getElementById("editStatus").value = this.dataset.status;
            document.getElementById("editModal").classList.remove("hidden");
        });
    });

    document.querySelectorAll(".close-modal").forEach(function (button) {
        button.addEventListener("click", function () {
            document.getElementById("editModal").classList.add("hidden");
        });
    });

    document
        .getElementById("editForm")
        .addEventListener("submit", function (e) {
            e.preventDefault();
            var id = document.getElementById("editId").value;
            var formData = new URLSearchParams(new FormData(this)).toString();

            fetch("/orders/" + id, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: formData,
            }).then(function () {
                location.reload();
            });
        });
});

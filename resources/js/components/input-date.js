$(function () {
    $('input[type="date"]').on("change", function () {
        if (this.value) {
            this.setAttribute(
                "placeholder",
                moment(this.value, "YYYY-MM-DD")
                    .format(this.getAttribute("data-date-format"))
            )
        } else {
            this.setAttribute(
                "placeholder",
                this.getAttribute("placeholder")
            )
        }
    }).trigger("change");
});
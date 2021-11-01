$(function () {
    $('.select2-basic').select2({
        theme: "bootstrap-5",
        language: {
            noResults: () => {
                return "Tidak ada hasil yang ditemukan";
            }
        }
    });

    $('.select2-nosearch').select2({
        theme: "bootstrap-5",
        minimumResultsForSearch: -1
    });

    $('.select2-readonly').select2({
        theme: "bootstrap-5",
        disabled: true
    });
})
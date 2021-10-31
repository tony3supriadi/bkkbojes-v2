$(function () {
    $('#provinsi').on('change', function() {
        $.get(`/api/kabupaten/${$(this).val()}`, function(data, status) {
            $('#kabupaten').html('');
            $('#kecamatan').html('');
            $('#desa').html('');

            $kabOptions = `<option></option>`;
            data.forEach((item, index) => {
                $kabOptions += `<option value="${item.kode}">${item.nama}</option>`;
            });
            $('#kabupaten').html($kabOptions);
        });
    });

    $('#kabupaten').on('change', function() {
        $.get(`/api/kecamatan/${$(this).val()}`, function(data, status) {
            $('#kecamatan').html('');
            $('#desa').html('');
            $kecOptions = `<option></option>`;
            data.forEach((item, index) => {
                $kecOptions += `<option value="${item.kode}">${item.nama}</option>`;
            });
            $('#kecamatan').html($kecOptions);
        });
    });

    $('#kecamatan').on('change', function() {
        $.get(`/api/desa/${$(this).val()}`, function(data, status) {
            $('#desa').html('');
            $desOptions = `<option></option>`;
            data.forEach((item, index) => {
                $desOptions += `<option value="${item.kode}">${item.nama}</option>`;
            });
            $('#desa').html($desOptions);
        });
    });

    $('#desa').on('change', function() {
        $('#kodepos').removeAttr("disabled");
    });
});

@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Personal</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
<div class="card card-body p-0">
    @include('pages.akun.profile.navigation')

    <div class="account-content">
        <form action="{{ route('akun.profile.personal.update', encrypt($personal->id)) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="page-title d-flex justify-content-between">
                <h4 class="d-inline-block">
                    <i class="la la-id-card text-primary"></i>
                    <span>Informasi Personal</span>
                </h4>
            </div>

            @if($personal->photo)
            <label for="photo" class="user-photo user-photo-edit mb-2 edit">
                <img src="{{ $personal->photo }}" alt="{{ $personal->nama_depan }}" />
            </label>
            @else
            <label for="photo" class="user-photo user-photo-edit bg-primary text-white mb-2">
                <span>{{ strtoupper(substr($personal->nama_depan, 0, 1)) }}</span>
            </label>
            @endif
            <input class="d-none" type="file" id="photo">
            <input type="hidden" name="photo">

            <div class="user-data">
                <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">Nama Lengkap</div>
                    <div class="col-md-9 px-0">
                        <div class="form-group row">
                            <div class="col-md-6 py-1 py-md-0">
                                <input type="text" name="nama_depan" id="nama_depan" value="{{ old('nama_depan') ? old('nama_depan') : $personal->nama_depan }}" placeholder="Nama Depan" class="form-control @error('nama_depan') is-invalid border-danger @enderror" />
                                @error('nama_depan')
                                <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 py-1 py-md-0">
                                <input type="text" name="nama_belakang" id="nama_belakang" value="{{ old('nama_belakang') ? old('nama_belakang') : $personal->nama_belakang }}" placeholder="Nama Belakang" class="form-control @error('nama_belakang') is-invalid border-danger @enderror" />
                                @error('nama_belakang')
                                <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0">Jenis Kelamin</div>
                    <div class="col-md-9 px-0">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin_1" {{ $personal->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} />
                            <label class="form-check-label" for="jenis_kelamin_1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_2" {{ $personal->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} />
                            <label class="form-check-label" for="jenis_kelamin_2">
                                Perempuan
                            </label>
                        </div>
                        @error('jenis_kelamin')
                        <div class="text-danger">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">No. HP / Whatsapp</div>
                    <div class="col-md-9 px-0">
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') ? old('no_hp') : $personal->no_hp }}" placeholder="No HP / Whatsapp" class="form-control @error('no_hp') is-invalid border-danger @enderror" />
                        @error('no_hp')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">Email</div>
                    <div class="col-md-9 px-0">
                        <input type="text" name="email" id="email" value="{{ old('email') ? old('email') : $personal->email }}" placeholder="Alamat E-Mail" class="form-control @error('email') is-invalid border-danger @enderror" />
                        @error('email')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">Alamat</div>
                    <div class="col-md-9 px-0">
                        <div class="form-group mb-2">
                            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') ? old('alamat') : $personal->alamat }}" placeholder="Alamat" class="form-control @error('alamat') is-invalid border-danger @enderror" />
                            @error('alamat')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <select name="provinsi" data-placeholder="Pilih provinsi" id="provinsi" class="form-control select2-basic @error('provinsi') is-invalid border-danger @enderror">
                                <option value=""></option>
                                @foreach($provinsi as $prov)
                                <option value="{{ $prov['kode'] }}" <?= $prov['kode'] == $personal->provinsi ? 'selected' : '' ?>>{{ $prov['nama'] }}</option>
                                @endforeach
                            </select>
                            @error('provinsi')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <select name="kabupaten" data-placeholder="Pilih kabupaten" id="kabupaten" class="form-control select2-basic @error('kabupaten') is-invalid border-danger @enderror">
                                <option value=""></option>

                                @if(count($kabupaten))
                                @foreach($kabupaten as $kab)
                                <option value="{{ $kab['kode'] }}" <?= $kab['kode'] == $personal->kabupaten ? 'selected' : '' ?>>{{ $kab['nama'] }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('kabupaten')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <select name="kecamatan" data-placeholder="Pilih kecamatan" id="kecamatan" class="form-control select2-basic @error('kecamatan') is-invalid border-danger @enderror">
                                <option value=""></option>

                                @if(count($kecamatan))
                                @foreach($kecamatan as $kec)
                                <option value="{{ $kec['kode'] }}" <?= $kec['kode'] == $personal->kecamatan ? 'selected' : '' ?>>{{ $kec['nama'] }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('kecamatan')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <select name="desa" data-placeholder="Pilih desa" id="desa" class="form-control select2-basic @error('desa') is-invalid border-danger @enderror">
                                <option value=""></option>

                                @if(count($desa))
                                @foreach($desa as $des)
                                <option value="{{ $des['kode'] }}" <?= $des['kode'] == $personal->desa ? 'selected' : '' ?>>{{ $des['nama'] }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('desa')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" name="kodepos" id="kodepos" value="{{ old('kodepos') ? old('kodepos') : $personal->kodepos }}" placeholder="Kode pos" class="form-control @error('kodepos') is-invalid border-danger @enderror" />
                            @error('kodepos')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">Tempat, Tanggal Lahir</div>
                    <div class="col-md-9 px-0">
                        <div class="row">
                            <div class="col-md-6 py-1 py-md-0">
                                <div class="form-group">
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $personal->tempat_lahir }}" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control @error('tempat_lahir') is-invalid border-danger @enderror" />
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 py-1 py-md-0">
                                <div class="form-group">
                                    <input type="date" name="tanggal_lahir" data-date-format="DD MMM YYYY" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $personal->tanggal_lahir }}" id="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control @error('tanggal_lahir') is-invalid border-danger @enderror" />
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">Nomor Induk (NIK)</div>
                    <div class="col-md-9 px-0">
                        <div class="form-group">
                            <input type="text" name="nik" value="{{ old('nik') ? old('nik') : $personal->nik }}" id="nik" placeholder="Nomor Induk Kependudukan (NIK)" class="form-control @error('nik') is-invalid border-danger @enderror" />
                            @error('nik')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row border-bottom py-4 mx-0">
                    <div class="col-md-3 field-name px-0 py-2">Nomor Induk Siswa (NIS)</div>
                    <div class="col-md-9 px-0">
                        <div class="form-group">
                            <input type="text" name="nis" value="{{ old('nis') ? old('nis') : $personal->nis }}" id="nis" placeholder="Nomor Induk Siswa (NIS)" class="form-control @error('nis') is-invalid border-danger @enderror" />
                        </div>
                    </div>
                </div> -->

                <div class="row py-4 mx-0">
                    <div class="col-12 text-end">
                        <a href="{{ route('akun.profile.personal') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-save me-1"></i>Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="croppie-photo-modal" tabindex="-1" aria-labelledby="croppie-photo-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="croppie-photo-modal-label">Crop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="image-preview" width="100%" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn-crop btn btn-primary"><i class="las la-crop mr-1"></i>Potong Gambar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.css" rel="stylesheet">

<style>
    .cropper-container {
        width: 100% !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/cropperjs@1.5.12/dist/cropper.js"></script>
<script src="{{ asset('js/inits/select2.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script type="text/javascript">
    $(function() {
        var cropper;
        var modal = new bootstrap.Modal($('#croppie-photo-modal'), {});
        var image = document.getElementById('image-preview');

        $('#photo').on('change', function(event) {
            var files = event.target.files;
            var done = function(url) {
                image.src = url;
                $('.btn-crop').attr('disabled', false);
                modal.show()
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $('#croppie-photo-modal').on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                preview: '.preview-cropper'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('.btn-crop').on('click', function() {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $('input[name="photo"]').val(base64data);
                    $('.user-photo-edit ').html(`<img src="${base64data}" />`);
                    modal.hide();
                };
            });
        });
    });
</script>
@endpush
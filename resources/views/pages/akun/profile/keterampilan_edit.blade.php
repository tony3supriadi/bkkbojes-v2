@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Keterampilan</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
<div class="card card-body p-0">
    @include('pages.akun.profile.navigation')

    <div class="account-content">
        <div class="page-title d-flex justify-content-between">
            <h4 class="d-inline-block">
                <i class="la la-cog text-primary"></i>
                <span>Keterampilan / Skill</span>
            </h4>
        </div>

        <div class="py-4">
            <form action="{{ route('akun.profile.keterampilan.update') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="personal_id" value="{{ Auth::guard('personal')->user()->id }}">

                <div id="show-form-item"></div>

                <div class="col-12 mt-3">
                    <button type="button" id="btn-add" class="btn btn-outline-secondary">
                        <i class="fa fa-plus-circle me-2"></i>Tambah
                    </button>
                </div>

                <div class="row mx-0">
                    <div class="col-12 text-end border-top py-3 mt-3 px-0">
                        <a href="{{ route('akun.profile.keterampilan') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-save me-1"></i>Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<form action="" method="post" id="action-delete" class="d-none">
    @csrf
    @method('delete')
</form>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/inits/select2.js') }}"></script>
<script type="text/javascript">
    var formSkills = [];
    $(function() {
        getSkillsData();

        $('#btn-add').on('click', function() {
            formSkills.push({
                skill: "",
                prosentase: 100
            });
            showSkills();
        });
    });

    function getSkillsData() {
        $.get('/akun/profile-saya/keterampilan/edit?type=json', function(data) {
            if (data.length) {
                data.forEach((item, index) => {
                    formSkills.push({
                        id: item.id,
                        skill: item.skill,
                        prosentase: item.prosentase
                    })
                });
            } else {
                formSkills.push({
                    skill: "",
                    prosentase: 100
                });
            }
            showSkills();
        });
    }

    function showSkills() {
        var html = "";
        formSkills.forEach((item, index) => {
            html += form_item(item, index);
        });

        $('#show-form-item').html(html);
    }

    function form_item(item, index) {
        return `
            ${ item.id ? '<input type="hidden" name="keterampilan[' + index + '][id]" value="' + item.id + '">' : ''}
            <div class="row mb-3">
                <div class="col-9 pe-1">
                    <input type="text" value="${item.skill ? item.skill : ''}" onchange="setVal(${index}, 'skill')" name="keterampilan[${index}][skill]" id="skill-${index}" class="form-control" required />
                </div>
                <div class="col-2 px-1">
                    <select name="keterampilan[${index}][prosentase]" id="prosentase-${index}" onchange="setVal(${index}, 'prosentase')" class="form-control select2-nosearch" required>
                        <option value="100" ${item.prosentase && item.prosentase == 100 ? 'selected': ''}>Mahir</option>
                        <option value="75" ${item.prosentase && item.prosentase == 75 ? 'selected': ''}>Menengah</option>
                        <option value="60" ${item.prosentase && item.prosentase == 60 ? 'selected': ''}>Pemula</option>
                    </select>
                </div>
                <div class="col-1 ps-1 text-end">
                    <div class="d-grid gap-2">
                        <button type="button" onclick="removed(${index})" id="btn-delete-${index}" class="btn btn-danger text-white">
                            <i class="la la-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    function setVal(index, field) {
        formSkills[index][field] = $(`#${field}-${index}`).val();
    }

    function removed(index) {
        formSkills.splice(index, 1);
        showSkills();
    }
</script>
@endpush
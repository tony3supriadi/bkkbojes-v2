@component('mail::message')

{{-- Greeting --}}
<h1>Satu langkah lagi!!</h1>

{{-- Intro Lines --}}
<p>Untuk mengaktifkan akun Anda, silahkan klik tombol verifikasi berikut:</p>

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
    case 'success':
    case 'error':
        $color = $level;
        break;
    default:
        $color = 'primary';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

Salam,<br>
Admin BKK SMKN1Bojogsari

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"Jika anda mendapatkan masalah ketika klik button verifikasi email, silahkan copas link berikut pada address bar browser:\n",
[
'actionText' => $actionText,
]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
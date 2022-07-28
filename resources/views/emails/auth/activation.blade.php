@component('mail::message')
# Aktivasi Akun

Terima Kasih Atas Pendaftarannya. Silahkan Aktivasi Akun Terlebih Dahulu.

@component('mail::button', ['url' => route('auth.activate', [
                                                'token' => $user->activation_token,
                                                'email' => $user->email
                                            ])
                            ])
    Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

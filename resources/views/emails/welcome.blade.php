@component('mail::message')
# Introduction

Hi {{ $user->name }}, Welcome to our blog!

@component('mail::button', ['url' => 'https://algebra.hr'])
	Zapocnite sa edukacijom
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

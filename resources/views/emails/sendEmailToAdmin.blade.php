@component('mail::message')

# Introduction

{{ $message }}

@component('mail::button', ['url' => ''])
	Read More..
@endcomponent

Thanks,<br>
Librarace 2020
@endcomponent

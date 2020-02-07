@component('mail::message')

A user made a register

Follow the next link to view the user details.

@component('mail::button', ['url' => route('registers.show', [$register->id]), 'color' => 'green'])
View User Details
@endcomponent

## User Details.

**Name:** {{$register->first_name}} {{$register->last_name}}  
**Email:** {{$register->email}}   
**Phone:** {{$register->phone}}  

**Message:**
{{$register->message}}  



Thanks,<br>
{{ config('app.name') }}
@endcomponent

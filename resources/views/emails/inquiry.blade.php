@component('mail::message')

A user made a Inquiry
==========================================================

**Name:** {{$data->name}}  
**Email:** {{$data->email}}   
**Phone:** {{$data->mobile_no}}  
**Address:** {{$data->address}}  
**Country:** {{$data->country}}  
**Service:** {{$data->service}}


**Message:**
{{$data->message}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent

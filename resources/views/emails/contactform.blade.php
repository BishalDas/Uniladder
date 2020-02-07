@component('mail::message')
**Date:** {{date('Y-m-d')}}  
**IP Address:** {{ request()->ip() }}
<p>=================================================</p>


**Name:** {{$request->name}}  
**Email:** {{$request->email}}  
**Phone No:** {{$request->phone}}  

**Message:**  
 {{$request->message}}  
@endcomponent

@extends('layouts.app')


@section('content')


<section class="max-w-7xl mx-auto px-6 py-12">


<h1 class="text-4xl font-bold text-[#6F4E37] mb-10">

Manage Customers

</h1>




@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

{{ session('success') }}

</div>

@endif





<div class="bg-white rounded-3xl shadow overflow-hidden">



<table class="w-full">


<thead class="bg-[#6F4E37] text-white">


<tr>


<th class="p-4 text-left">

Name

</th>



<th class="p-4 text-left">

Email

</th>



<th class="p-4 text-left">

Status

</th>



<th class="p-4 text-left">

Action

</th>



</tr>


</thead>





<tbody>



@forelse($customers as $customer)



<tr class="border-b">



<td class="p-4 font-semibold">

{{ $customer->name }}

</td>




<td class="p-4">

{{ $customer->email }}

</td>





<td class="p-4">


@if($customer->is_restricted)


<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

Restricted

</span>


@else


<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

Active

</span>


@endif



</td>






<td class="p-4">


<a href="{{ route('admin.customers.show',$customer->id) }}"

class="bg-[#6F4E37] text-white px-5 py-2 rounded-full">


View Details


</a>



</td>




</tr>




@empty


<tr>


<td colspan="4"

class="p-8 text-center text-gray-500">


No customers found.


</td>


</tr>



@endforelse



</tbody>
</table>
</div>
</section>
@endsection
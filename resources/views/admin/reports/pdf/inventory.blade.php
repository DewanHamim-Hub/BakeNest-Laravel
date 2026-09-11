<!DOCTYPE html>
<html>

<head>


<title>
Inventory Report
</title>


<style>


body {

font-family: Arial, sans-serif;

font-size:12px;

color:#333;

}



h1 {

text-align:center;

color:#6F4E37;

}



table {

width:100%;

border-collapse:collapse;

margin-top:20px;

}



th {

background:#6F4E37;

color:white;

padding:8px;

}



td {

border:1px solid #ddd;

padding:8px;

}



.section {

margin-top:30px;

font-size:16px;

font-weight:bold;

color:#6F4E37;

}



</style>



</head>



<body>



<h1>
BakeNest Inventory Report
</h1>


<p style="text-align:center">

Generated:
{{ date('d M Y') }}

</p>





<div class="section">

Current Ingredient Stock

</div>



<table>


<thead>

<tr>


<th>
Ingredient
</th>


<th>
Stock
</th>


<th>
Minimum Stock
</th>


<th>
Unit
</th>


</tr>


</thead>




<tbody>


@foreach($ingredients as $ingredient)


<tr>


<td>

{{ $ingredient->name }}

</td>


<td>

{{ $ingredient->current_stock }}

</td>


<td>

{{ $ingredient->minimum_stock }}

</td>



<td>

{{ $ingredient->unit }}

</td>



</tr>


@endforeach



</tbody>


</table>







<div class="section">

Recent Inventory Transactions

</div>





<table>


<thead>


<tr>

<th>
Date
</th>


<th>
Item
</th>


<th>
Type
</th>


<th>
Quantity
</th>


</tr>


</thead>




<tbody>



@foreach($transactions as $transaction)



<tr>


<td>

{{ $transaction->created_at->format('d M Y') }}

</td>




<td>


@if($transaction->ingredient)

{{ $transaction->ingredient->name }}


@elseif($transaction->productVariant)


{{ $transaction->productVariant->product->name }}

@endif



</td>





<td>

{{ $transaction->type }}

</td>





<td>

{{ $transaction->quantity }}

</td>




</tr>


@endforeach



</tbody>



</table>




</body>


</html>
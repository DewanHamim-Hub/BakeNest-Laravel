<!DOCTYPE html>
<html>

<head>

    <title>Sales Report</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }


        h1 {
            text-align: center;
            color: #6F4E37;
        }


        .header {

            text-align:center;
            margin-bottom:30px;

        }


        table {

            width:100%;
            border-collapse:collapse;

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


        .total {

            margin-top:20px;
            font-size:16px;
            font-weight:bold;

        }


    </style>


</head>


<body>


<div class="header">


<h1>BakeNest Sales Report</h1>


<p>
Generated Date:
{{ date('d M Y') }}
</p>


</div>




<table>


<thead>

<tr>

<th>
Order Number
</th>


<th>
Customer
</th>


<th>
Products
</th>


<th>
Amount
</th>


<th>
Status
</th>


</tr>


</thead>



<tbody>



@foreach($orders as $order)


<tr>


<td>

{{ $order->order_number }}

</td>



<td>

{{ $order->user->name }}

</td>




<td>


@foreach($order->items as $item)


{{ $item->productVariant->product->name }}

({{ $item->quantity }})

<br>


@endforeach



</td>




<td>

{{ number_format($order->total_amount,2) }}

BDT

</td>




<td>

{{ ucfirst($order->status) }}

</td>



</tr>



@endforeach



</tbody>


</table>





<div class="total">

Total Paid Sales:

{{ number_format(
$orders->sum('total_amount'),
2
) }}

BDT


</div>



</body>


</html>
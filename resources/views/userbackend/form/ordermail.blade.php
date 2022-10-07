<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<div>
    <h3>You Have an Order from Website</h3>
    <p>Customer ID:
        {{$clientCode }}<br>
        Order ID:
        {{$orderId}}
    </p>
</div>

<table>
    <thead>
    <tr>
    <th>
        Product
    </th>
    <th>
        Model
    </th>
    <th>
        Quantity
    </th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>
                {{$item->name}}</td>


        <td>
            {{$item->id}}
        </td>
        <td>
            {{$item->quantity}}
        </td>
        </tr>
    @endforeach
    </tbody>

</table>

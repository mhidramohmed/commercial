<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Menu</th>
            <th>Tables</th>
            <th>Serveur</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Type de paiment</th>
            <th>Etat de paiment</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>
                    @foreach ($sale->menus()->where('sales_id', $sale->id)->get() as $menu)
                        > <h5>
                            {{ $menu->title }}
                        </h5>
                        < @endforeach
                </td>
                <td>
                    @foreach ($sale->tables()->where('sales_id', $sale->id)->get() as $table)
                        <span>
                            {{ $table->name }}
                        </span>
                    @endforeach
                </td>
                <td>{{ $sale->servant->name }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->total_price }}</td>
                <td>{{ $sale->payment_type === 'cash' ? 'espace' : 'Card' }}</td>
                <td>{{ $sale->payment_status === 'paid' ? 'Payee' : 'Unpaid' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

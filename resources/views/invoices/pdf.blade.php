<table>
    <caption>PDF output</caption>
    <tbody>
    @foreach($invoices as $invoice)
<tr>
    <td>ID of invoice:</td>
    <td>{{ $invoice->id }}</td>
</tr>
<tr>
    <td>Service or Product Name:</td>
    <td>{{ $invoice->name }}</td>
</tr>
<tr>
    <td>Notes:</td>
    <td>{{ $invoice->description }}</td>
</tr>
<tr>
    <td>Price:</td>
    <td>{{ $invoice->amount }}</td>
</tr>


    @endforeach
    </tbody>
</table>

<style>
    body {
        font-family: "Open Sans", sans-serif;
        line-height: 1.25;
    }
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }
    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }
    table tr {
        background: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }
    table th,
    table td {
        padding: .625em;
        text-align: center;
    }
    table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
    }
    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }
        table caption {
            font-size: 1.3em;
        }
        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }
        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
        }
        table td:before {
            /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
        table td:last-child {
            border-bottom: 0;
        }
    }
</style>
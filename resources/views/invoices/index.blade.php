@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @include('layout.partials.messages')

            <div class="card">
                <div class="header">
                    <h4 class="title">
                        Invoices
                        <div class="pull-right">
                            <a href="{{ route('invoice.create') }}" class="btn btn-info btn-fill"><i
                                        class="ti-plus"></i> Add Invoice</a>
                        </div>
                    </h4>
                    <p class="category">All of your invoices are shown below in the list</p>
                </div>

                <div class="content table-reposive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                ID of invoice
                            </th>
                            <th>
                                Service or Product Name
                            </th>
                            <th>
                                Client
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)

                            <tr>
                                <td>
                                    {{ $invoice->id }}
                                </td>
                                <td>
                                    {{ $invoice->name }}

                                </td>
                                <td>
                                    {{ $invoice->client->firstname . ' ' . $invoice->client->lastname }}
                                </td>
                                <td>
                                    ${{ $invoice->getCurrencyFormat($invoice->amount) }}
                                </td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('pdfview',['download'=>'pdf']) }}"
                                       class="btn btn-info btn-simple btn-sm">
                                        <i class="ti-printer"></i> PDF
                                    </a>
                                    <a href="{{ route('invoice.edit', $invoice) }}"
                                       class="btn btn-info btn-simple btn-sm">
                                        <i class="ti-pencil-alt"></i> Edit
                                    </a>
                                    <a href="{{ route('invoice.destroy', $invoice) }}"
                                       onclick="return confirm('Are you sure?');"
                                       class="btn btn-danger btn-simple btn-sm">
                                        <i class="ti-close"></i> Remove
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
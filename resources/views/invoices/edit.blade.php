@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <div class="card">
                <div class="header">
                    <h4 class="title">Editing Invoice</h4>
                    <p class="category">Please fill in the fields below</p>
                </div>

                <div class="content">

                    @include('layout.partials.messages')

                    <form action="{{ route('invoice.update', $invoice) }}" method="POST" autocomplete="off">
                        {!! csrf_field() !!}

                        <input type="hidden" name="id" value="{{ $invoice->id }}">

                        <div class="form-group">
                            <label>Client</label>
                            <select name="clients_id" class="form-control">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $client_id ? 'selected' : '' }}>{{ $client->firstname . ' ' . $client->lastname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Service or Product Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ old('name', $invoice->name) }}">
                        </div>

                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" class="form-control" name="description"
                                   value="{{ old('description', $invoice->description) }}">
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                                <span class="input-group-addon">&euro;</span>
                                <input type="text" class="form-control" name="amount"
                                       value="{{ old('amount', $invoice->getCurrencyFormat($invoice->amount)) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block btn-lg" value="Edit Invoice">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
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
        <input type="text" class="form-control" name="name" value="{{ old('name', $invoice->name) }}">
</div>

<div class="form-group">
    <label>Notes</label>
        <input type="text" class="form-control" name="description" value="{{ old('description', $invoice->description) }}">
</div>

<div class="form-group">
    <label>Amount</label>
    <div class="input-group">
        <span class="input-group-addon">&euro;</span>
        <input type="text" class="form-control" name="amount" value="{{ old('amount', $invoice->getCurrencyFormat($invoice->amount)) }}">
    </div>
</div>
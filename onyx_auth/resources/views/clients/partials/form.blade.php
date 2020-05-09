
<input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{isset($client) ? $client->name : old('name')}}" />
<input type="text" name="address" placeholder="Address" class="form-control mb-2" value="{{isset($client) ? $client->address : old('address')}}" />
<input type="number" name="phone" placeholder="Phone" class="form-control mb-2" min="1" value="{{isset($client) ? $client->phone : old('phone')}}" />
<input type="text" name="email" placeholder="Email" class="form-control mb-2" value="{{isset($client) ? $client->email : old('email')}}" />
<button class="btn btn-primary " type="submit">Save</button>
<a href="/clients" class="btn btn-secondary">Back</a>

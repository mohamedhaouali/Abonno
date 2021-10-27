<ul class="list-unstyled">
  @isset($address->name)
    <li>{{ "$address->civility $address->name $address->firstname" }}</li>
  @endif
  @if($address->company)
    <li>{{ $address->company }}</li>
  @endif            
  <li>{{ $address->address }}</li>
  @if($address->addressbis)
    <li>{{ $address->addressbis }}</li>
  @endif
  @if($address->bp)
    <li>{{ $address->bp }}</li>
  @endif
  <li>{{ "$address->postal $address->city" }}</li>
  <li>{{ $address->country->name }}</li>
  <li>{{ $address->phone }}</li>
</ul>
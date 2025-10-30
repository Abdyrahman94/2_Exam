@extends('client.layouts.app')

@section('content')
<div class="container-lg py-5">
    <h2 class="fw-bold text-center mb-4 text-primary">
        Sebedim 🛒
    </h2>
    @if (empty($cart))
        <div class="alert alert-info text-center rounded-4 py-4">
            <i class="bi bi-info-circle me-2"></i> Sebediňiz häzirki wagtda boş.
            <br>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
                Harytlary görmek
            </a>
        </div>
    @else
        <div class="table-responsive shadow-sm rounded-4">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Haryt</th>
                        <th>Baha</th>
                        <th>Mukdar</th>
                        <th>Jemi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $item)
                        @php $total += $item['price'] * $item['quantity']; @endphp
                        <tr>
                            <td class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="me-3 rounded" style="width:60px; height:60px; object-fit:cover;">
                                <span class="fw-semibold">{{ $item['name'] }}</span>
                            </td>
                            <td>{{ number_format($item['price'], 2) }} TMT</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td class="fw-bold text-success">{{ number_format($item['price'] * $item['quantity'], 2) }} TMT</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-x-circle me-2"></i> Sebedi boşat
                </button>
            </form>
            
            <h4 class="fw-bold text-dark mb-0">
                Jemi: <span class="text-success">{{ number_format($total, 2) }} TMT</span>
            </h4>
        </div>
        <a href="#" class="btn btn-outline-primary mt-2">Sargyt Etmek</a>
    @endif
</div>
@endsection
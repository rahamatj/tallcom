<?php

use Livewire\Volt\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Masmerise\Toaster\Toastable;
use Masmerise\Toaster\Toaster;

new class extends Component {
    use WithPagination, Toastable;

    public function with() {
        return [
            'products' => \App\Models\Product::orderBy('id', 'desc')->paginate(10)
        ];
    }

    public function delete($id) {
        $product = \App\Models\Product::findOrFail($id);

        if ($product) {
            $product->delete();
        }

        Toaster::error('Product deleted successfully!');
    }
}; ?>

<div>
    <div class="card mb-4">
        <div class="card-header"><h3 class="card-title">Bordered Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th style="width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="align-middle" wire:key="{{ $product->id }}">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src='{{ asset("storage/{$product->image}") }}' alt="{{ $product->name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $product->price }}$</td>
                        <td>
                            {!! $product->description !!}
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $product->id }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $products->links() }}
        </div>
    </div>
</div>

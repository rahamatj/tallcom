<?php

use Livewire\Volt\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Masmerise\Toaster\Toastable;
use Masmerise\Toaster\Toaster;

new class extends Component {
    use WithPagination, Toastable;

    public $search = '';

    public function with() {

        $products = \App\Models\Product::when($this->search, function($query) {
                            $query->where('name', 'like', '%' . $this->search . '%')
                                  ->orWhere('description', 'like', '%' . $this->search . '%');
                        })
                        ->paginate(10);

        return [
            'products' => $products
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
        <div class="card-header"><h3 class="card-title">Products</h3></div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="offset-md-10 col-md-2">
                    <input type="text" class="form-control mb-1 me-2" placeholder="Search..." wire:model.live="search">
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Is Trending</th>
                    <th>You May Like</th>
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
                            @if($product->is_trending)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                        <td>
                            @if($product->you_may_like)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
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

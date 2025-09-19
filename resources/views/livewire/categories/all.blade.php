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
            'categories' => Category::orderBy('id', 'desc')->paginate(10)
        ];
    }

    public function delete($id) {
        $category = Category::findOrFail($id);

        if ($category) {
            $category->delete();
        }

        Toaster::error('Category deleted successfully!');
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
                    <th style="width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr class="align-middle" wire:key="{{ $category->id }}">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <img src='{{ asset("storage/{$category->image}") }}' alt="{{ $category->name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $category->id }})">
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
            {{ $categories->links() }}
        </div>
    </div>

</div>

<div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category ?!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- //form for delete --}}
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h5>Are tou sure delete This Category ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes Delete </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        @if (session('message'))
            <h3 class="alert alert-success">{{ session('message') }}</h3>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-end">Add
                            Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Stauts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == '1' ? 'Hidden' : 'Visable' }}</td>
                                    <td>
                                        <a
                                            href="{{ route('category.edit', $category->id) }}"class="btn btn-success">Edite</a>
                                        <a href="#" wire:click="deleteCategory({{ $category->id }})"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    window.addEventListener('close-modal', event=>{
        $('#deleteModal').modal('hide');
    })
</script>
@endpush

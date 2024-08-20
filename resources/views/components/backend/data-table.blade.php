<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Basic Table</h4> -->
                <!-- <p class="card-description"> Add class <code>.table</code></p> -->
                <table class="table" id="{{$table_id}}">
                    <thead>
                        <tr>
                            @foreach($thead as $th)
                                <th>{{$th}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card">

    <div class="card-body">


        <div class="table-responsive">
            <table id="categoryTable" class="display table table-striped table-hover data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Count</th>
                        <th style="width: 10%">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th style="width: 25%">Description</th>
                        <th>Slug</th>
                        <th>Count</th>
                        <th style="width: 10%">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>{{ $cat->cat_name }}</td>
                            <td>
                                <p>{{ $cat->description }}</p>
                            </td>
                            <td>{{ $cat->cat_slug }}</td>
                            <td>0</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-bs-toggle="tooltip" title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        onclick="getPage('{{ route('category.edit', $cat) }}'); return false;">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="{{ route('category.destroy', $cat) }}" method="post"
                                        onsubmit="deleteFormData(this); return false;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" data-bs-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer">
        {{ $cats->links() }}
    </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hire Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dash.create_user') }}">
                    @csrf

                    <div class="row m-3">
                        <input class="form-control @error('employee_id') is-invalid @enderror" name="employee_id"
                            placeholder="Enter employee ID (format: XY-1234)" />
                        @error('employee_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row m-3">
                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Enter employee's name" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row m-3">
                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Enter employee's email" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Hire</button>
            </div>
            </form>
        </div>
    </div>
</div>

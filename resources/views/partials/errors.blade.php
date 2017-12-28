@if(count($errors))
    <div class="row">
        <div class="form-group col-md-12">
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
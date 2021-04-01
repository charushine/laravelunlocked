@extends('admin.layouts.cmlayout')
@section('body')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Commissions</h1>
	</div>
	<div class="flash-message">
	@if(session()->has('status'))
	    @if(session()->get('status') == 'error')
		<div class="alert alert-danger  alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ session()->get('message') }}
		</div>
		@endif
	@endif
    @if(session()->has('status'))
			@if(session()->get('status') == 'success')
				<div class="alert alert-success  alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
				</div>
			@endif
	@endif
	</div>
	<!-- end .flash-message -->
	<div class="row mt-4">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body pt-2 pb-3 manageClinicSection">
					<h5 class="mt-3 mb-4">
						Add Commission Detail
					</h5>
					<form action="{{route('commission.create')}}" method="post" class="user" id="add_commission_form" enctype="multipart/form-data">@csrf
						<input type="hidden" name="edit_record_id" value="{{isset($commission) ? $commission->id : ''}}">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-12">
								<div class="form-group">
									<label>Commission(%)<span class="required">*</span>
									</label>
                                   <input type="number" max="100"  name="commission_percentage" id="commission_percentage" value="{{old('commission_percentage',isset($commission) ? $commission->commission_percentage : '')}}" class="form-control form-control-user" />
                                    @if ($errors->has('commission_percentage'))
                                        <span class="text-danger">{{ $errors->first('commission_percentage') }}</span>
                                    @endif
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Status<span class="required">*</span></label>
                                    <div class="input-group">
                                        <div id="radioBtn" class="btn-group">
                                            <a class="btn btn-success btn-sm {{ old('status',isset($commission) ? $commission->status : '') == '1' ? 'active' : 'notActive'}}" data-toggle="status" data-title="1">Enabled</a>
                                            <a class="btn btn-danger btn-sm {{ old('status',isset($commission) ? $commission->status : '') == '0' ? 'active' : 'notActive'}}" data-toggle="status" data-title="0">Disabled</a>
                                        </div>
                                        <input type="hidden" name="status" id="status" value="{{ old('status',isset($commission) ? $commission->status : '') == '1' ? '1' : '0'}}">
                                    </div>
                                    @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
						<div class="mt-1 mb-1">
							<div class="text-left d-print-none mt-4">
								<button type="submit" id="edit-genre-btn" value="save" class="btn btn-primary">Save</button>
								<a href="" class="btn btn-light">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- end row -->
        <div class="col-md-6">
			<div class="card mb-4">
				<div class="card-body pt-2 pb-3 manageClinicSection">
					<h5 class="mt-3 mb-4">
						Total Generated Commission
					</h5>
                    <table class="table">
                        <tbody>
                            <tr><th>Total Booking</th><td>10</td></tr>
                            <tr><th>Total Commission</th><td>100</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
				<div class="card-body pt-2 pb-3 manageClinicSection">
					<h5 class="mt-3 mb-4">
						Commision for Venue Owner's
					</h5>
                    <table class="table">
                        <tbody>
                            <tr><th> Venue Owner</th><td>Gaurav Sharma</td></tr>
                            <tr><th>Total Commission</th><td>100</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
	<!-- container-fluid -->
	@endsection
	@section('scripts')

	<script>
	jQuery( document ).ready(function() {

			$("form[id='add_commission_form']").validate({
				// Specify validation rules
				ignore: '',
				rules: {
					commission_percentage: {
						required: true,
                        number:true
					}
				},
				// Specify validation error messages
				messages: {
					commission_percentage: {
						required: 'Commission field is required',
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});

    </script>
	@stop
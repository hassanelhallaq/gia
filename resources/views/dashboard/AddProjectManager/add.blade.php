@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/wizard/style.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- row -->
<div class="row">
    <section class="wizard-section">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="form-wizard">
					<form action="" method="post" role="form">
						<div class="form-wizard-header">
							<p>Fill all form field to go next step</p>
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span>1</span></li>
								<li><span>2</span></li>
								<li><span>3</span></li>
								<li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
							</ul>
						</div>
						<fieldset class="wizard-fieldset show">
							<h5>Personal Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="fname">
								<label for="fname" class="wizard-form-text-label">First Name*</label>
								<div class="wizard-form-error"></div>
							</div>

							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>
						<fieldset class="wizard-fieldset">
							<h5>Account Information</h5>
							<div class="form-group">
								<input type="email" class="form-control wizard-required" id="email">
								<label for="email" class="wizard-form-text-label">Email*</label>
								<div class="wizard-form-error"></div>
							</div>

							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>
						<fieldset class="wizard-fieldset">
							<h5>Bank Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="bname">
								<label for="bname" class="wizard-form-text-label">Bank Name*</label>
								<div class="wizard-form-error"></div>
							</div>

							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>
						<fieldset class="wizard-fieldset">
							<h5>Payment Information</h5>
							<div class="form-group">
								<input type="email" class="form-control wizard-required" id="email">
								<label for="email" class="wizard-form-text-label">Email*</label>
								<div class="wizard-form-error"></div>
							</div>

							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Submit</a>
							</div>
						</fieldset>
						<fieldset class="wizard-fieldset">
							<h5>Payment Information</h5>
							<div class="form-group">
								<input type="email" class="form-control wizard-required" id="email">
								<label for="email" class="wizard-form-text-label">Email*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Submit</a>
							</div>
						</fieldset>

						<fieldset class="wizard-fieldset">
							<h5>Bank Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="bname">
								<label for="bname" class="wizard-form-text-label">Bank Name*</label>
								<div class="wizard-form-error"></div>
							</div>

							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>
						<fieldset class="wizard-fieldset">
							<h5>Personal 5</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="fname">
								<label for="fname" class="wizard-form-text-label">First Name*</label>
								<div class="wizard-form-error"></div>
							</div>

							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>

								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>

					</form>
				</div>
			</div>
		</div>
</section>
</div>
<!-- /row -->
<!-- row closed -->
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/plugins/wizard/script.js') }}"></script>
@endsection

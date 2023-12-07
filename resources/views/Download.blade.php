@extends('layouts.main')

@section('csvUpload-section')
	<aside>
		@include('layouts.leftlist')
		<div class="col-md-10 main-section">
			@if (session('success'))
				<div class="alert alert-success">{{session('success')}}</div>
			@endif
			<section>
				<h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">Download Csv</h3>
				<hr style="margin:0px; width:600px; margin-bottom:10px" />
				<div style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">Upload Csv File</div>
				<div>
					<form action="" id="downloadForm" method="post" enctype="multipart/form-data">
						@csrf
						<table class="addpage-table">
							<tr>
								<td>Upload Csv</td>
								<td>
									<input type="file" name="csv_file" id="csvFile" accept=".csv"> 
								</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="2">
									<button class="srchbtn" type="button" onclick="setAction('pdf')">Download Pdf</button>
                                    <button class="srchbtn" type="button" onclick="setAction('images')">Download Images</button>   
								</td>
							</tr>
						</table>
					</form>
				</div>
		</section>
		</div>
	</aside>
@endsection
@section('scripts')
    <script>
        function setAction(type) {
            var form = document.getElementById('downloadForm');
            if (type === 'pdf') {
                form.action = '{{ route("upload.csv") }}';
                form.submit();
            } else if (type === 'images') {
                form.action = '{{ route("download.images") }}';
                form.submit();
            }
        }
    </script>
@endsection
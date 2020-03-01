<div class="modal fade" id="modalrequests">
	<div class="modal-dialog modal-lg">
		<form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-approve-issue-book-request' , 'id' => encrypt('') ]) }}"> {{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-list"></i> BOOK REQUESTS LIST </h4>
				</div>
				<div class="modal-body" id="modalrequestsbody">
					<div class="custom-loader"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> CLOSE </button>
					<button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to approve all checked book requested?')"><i class="fa fa-arrow-right"></i> APPROVE / ISSUE </button>
				</div>
			</div>
		</form>
	</div>
</div>
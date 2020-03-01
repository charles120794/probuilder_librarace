<form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-update-book' , 'id' => encrypt($Books->book_id) ]) }}" enctype="multipart/form-data"> {{ csrf_field() }}
	<table class="table table-bordered">
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK GROUP: 
			</td>
			<td style="padding: 0px;">
				<select type="text" name="category_id" class="form-contro input-sm" style="width: 100%; border-radius: 0px;" required>
				    <option value=""> </option>
				    @foreach($BooksCategory as $key => $value)
				    <option value="{{ $value->category_id }}" @if($value->category_id == $Books->category_id) selected @endif> 
				    	{{ $value->category_code }} - {{ $value->category_description }}
				    </option>
				    @endforeach
				</select>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK IMAGE: 
			</td>
			<td style="padding: 0px;">
				<input type="file" name="book_image" class="form-control input-sm">
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK ISBN: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_isbn" autocomplete="off" style="text-transform: uppercase;" value="{{ $Books->book_isbn }}" required>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK ITEM CODE: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_item" autocomplete="off" style="text-transform: uppercase;" value="{{ $Books->book_item }}" required>
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK TITLE: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_title" autocomplete="off" style="text-transform: uppercase;" value="{{ $Books->book_title }}" required>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK SUBJECT: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_subject" autocomplete="off" style="text-transform: uppercase;" value="{{ $Books->book_subject }}" required>
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK AUTHOR: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_author" style="text-transform: uppercase;" autocomplete="off" value="{{ $Books->book_author }}" required>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK PUBLISHED DATE: 
			</td>
			<td style="padding: 0px;">
				<input type="date" class="form-control input-sm" name="book_published_date" value="{{ $Books->book_published_date }}" required>
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK DESCRIPTION:
			</td>
			<td style="padding: 0px;" colspan="3">
				<textarea class="form-control input-sm" name="book_description">{{ $Books->book_description }}</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="5" style="padding-right: 0px;">
				<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-edit"></i> UPDATE </button>
			</td>
		</tr>
	</table>
</form>
<form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-create-book' , 'id' => str_random(45) ]) }}" enctype="multipart/form-data"> {{ csrf_field() }}
	<table class="table table-bordered">
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK GROUP: 
			</td>
			<td style="padding: 0px;">
				<select type="text" name="category_id" class="form-contro input-sm" style="width: 100%; border-radius: 0px;" required>
				    <option value=""> </option>
				    @foreach(app('LibraraceBooksCategory')->get() as $key => $value)
				    <option value="{{ $value->category_id }}"> {{ $value->category_code }} - {{ $value->category_description }}</option>
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
				<input type="text" class="form-control input-sm" name="book_isbn" autocomplete="off" style="text-transform: uppercase;" required>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK ITEM CODE: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_item" autocomplete="off" style="text-transform: uppercase;" required>
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK TITLE: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_title" autocomplete="off" style="text-transform: uppercase;" required>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK SUBJECT: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_subject" autocomplete="off" style="text-transform: uppercase;" required>
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK AUTHOR: 
			</td>
			<td style="padding: 0px;">
				<input type="text" class="form-control input-sm" name="book_author" style="text-transform: uppercase;" autocomplete="off" required>
			</td>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK PUBLISHED DATE: 
			</td>
			<td style="padding: 0px;">
				<input type="date" class="form-control input-sm" name="book_published_date" required>
			</td>
		</tr>
		<tr>
			<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
				BOOK DESCRIPTION:
			</td>
			<td style="padding: 0px;" colspan="3">
				<textarea class="form-control input-sm" name="book_description"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="5" style="padding-right: 0px;">
				<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> SUBMIT </button>
			</td>
		</tr>
	</table>
</form>
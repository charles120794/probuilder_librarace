<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-update-book-category' , 'id' => encrypt($BooksCategory->category_id) ]) }}"> {{ csrf_field() }}
            <table class="table table-bordered">
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP CODE:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="category_code" class="form-control input-sm" style="text-transform: uppercase;" autocomplete="off" value="{{ $BooksCategory->category_code }}" required>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP DESCRIPTION:
                    </td>
                    <td style="padding: 0px;">
                        <input type="text" name="category_description" class="form-control input-sm" style="text-transform: uppercase;" autocomplete="off"  value="{{ $BooksCategory->category_description }}" required>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP LOCATION:
                    </td>
                    <td style="padding: 0px;">
                        <select type="text" name="category_location" class="form-contro input-sm" style="width: 100%; border-radius: 0px;" required>
                            <option value=""> </option>
                            @foreach($BooksLocation as $key => $value)
                            <option value="{{ $value->location_id }}" @if($value->location_id == $BooksCategory->location_id) selected @endif> 
                                {{ $value->location_code }} - {{ $value->location_description }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        GROUP PENALTY AMOUNT:
                    </td>
                    <td style="padding: 0px;">
                        <input type="number" name="category_penalty" class="form-control input-sm" value="{{ $BooksCategory->category_book_penalty }}" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="padding-right: 0px;">
                        <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-edit"></i> UPDATE </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
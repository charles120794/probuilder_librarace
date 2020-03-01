<div class="modal fade" id="book_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa fa-list"></i> SELECT BOOK </h4>
                <input type="hidden" id="tosetbookitemcount" value="0">
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-condensed datatable">
                    <thead style="font-size: 12px;">
                        <tr>
                            <th class="text-center"> ID </th> 
                            <th class="text-center"> BOOK ITEM </th> 
                            <th class="text-center"> ISBN  </th> 
                            <th class="text-center"> TITLE </th> 
                            <th class="text-center"> SUBJECT </th> 
                            <th class="text-center"> PUBLISHED DATE </th> 
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        @foreach(app('LibraraceBooks')->orderBy('created_date','desc')->get() as $key => $value)
                        <tr data-item="{{ $value->book_item }} {{ $value->book_title }}" data-book="{{ encrypt($value->book_id) }}" ondblclick="return selectedBook(this)" style="cursor: pointer;"> 
                            <td style="text-transform: uppercase;"> {{ ($key + 1) }} </td>
                            <td style="text-transform: uppercase;"> {{ $value->book_item }} </td>
                            <td style="text-transform: uppercase;"> {{ $value->book_isbn }} </td>
                            <td style="text-transform: uppercase;"> {{ $value->book_title }} </td>
                            <td style="text-transform: uppercase;"> {{ $value->book_subject }} </td>
                            <td style="text-transform: uppercase;"> {{ $value->book_published_date }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> CLOSE</button>
            </div>
        </div>
    </div>
</div>
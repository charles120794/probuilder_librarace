<form method="post" action="{{ route('librarace.route',['path' => $path, 'action' => 'librarace-create-book-request' , 'id' => Crypt::encrypt('') ]) }}"> {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="overflow-x: auto;">
            <table class="table table-bordered" id="tableformaddbookrequest">
                <tr>
                    <td colspan="3" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
                        STUDENT / MEMBER: 
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0px;" colspan="4">
                        <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="hidden" id="student_id" name="student_id">
                            <input type="text" class="form-control" style="border-radius: 0px; background-color: white;" id="student_name" name="student_name" readonly>
                            <span class="input-group-btn">
                                <button type="button" data-toggle="modal" data-target="#modalselectstudent" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  class="text-center" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 30%;">
                        BOOK: 
                    </td>
                    <td  class="text-center" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 30%;">
                        FROM: 
                    </td>
                    <td  class="text-center" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 30%;">
                        TO: 
                    </td>
                    <td  class="text-center" style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 5%;"></td>
                </tr>
                <tr class="book-row">
                    <td style="padding: 0px;">
                        <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="hidden" name="book[0][book_id]" id="book_id0">
                            <input type="text" class="form-control" style="border-radius: 0px; background-color: white;" id="book_title0" name="book[0][book_title]" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat btn-select-book-modal" onclick="return btnSelectBookModal(this)" data-count="0"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </td>
                    <td style="padding: 0px;">
                        <input type="date" name="book[0][date_from]" class="form-control input-sm" required>
                    </td>
                    <td style="padding: 0px;">
                        <input type="date" name="book[0][date_to]" class="form-control input-sm" required>
                    </td>
                </tr>
                <tbody id="appendbookhere"></tbody>
                <tr>
                    <td colspan="5" style="padding-right: 0px;">
                        <div class="pull-right">
                            <button type="button" class="btn btn-success btn-sm" onclick="return appendBook()"><i class="fa fa-plus"></i> ADD BOOK </button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SUBMIT </button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
<?php
/**
 * @var Illuminate\Database\Eloquent\Collection $columnConf
 */
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-4">Category Import</h1>
                <p>
                    Upload a csv file to import or update categories<br /><br />
                    Required columns: {{ implode(', ', $defaultAttributes) }}<br />
                    Optional columns: {{ implode(', ', $optionalAttributes) }}<br />
                </p>

                <form method="post" action="{{ route('coaster-commerce.admin.import.categories.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
    		            <input name="import-csv" type="file" class="form-control" placeholder='Choose a file...'>
	                </div>
                    <div class="form-group">
		                <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
@append
<h4>EXISTING TEXT</h4>
<table class="table table-hover table-striped">
    @foreach($texts->all() as $text)
        <tr id="text{{$text->id}}">
            <td>{{$text->mainText}}</td>
            {{--<td><a href=""><span class="fa fa-edit fa-2x"></span></a></td>--}}
            <td><a href="#" data-id="{{$text->id}}" class="deleteRotate"><span class="fa fa-trash-o fa-2x"></span></a></td>
        </tr>
    @endforeach
</table>

<script>
    $(document).ready(function () {
        $('.deleteRotate').click(function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url: "trashText/"+id,
                success: function (data) {
                    $('#text'+data).hide();
                },
                failure: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>
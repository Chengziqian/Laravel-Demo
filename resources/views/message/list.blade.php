<html>
    <head>
        @include('index.head')
    </head>
    <script>
        $(function(){
            $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text('回复:@'+recipient);
            modal.find('.reply').attr('value',recipient);
        });
        });
    </script>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">留言板</a>
                </div>
            </nav>
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading" style="height: 55px;font-size: 150%">留言板
                    <div class="new" style="float: right">
                        <a href="{{route('message.new')}}"><button class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新建留言</button></a>
                    </div>
                </div>
                <div class="panel-body" style="padding: 0">
                <form id="post1" action="{{route('message.del')}}" method="post">
                {{csrf_field()}}
                    <table class="table table-striped" style="font-size: 130%">
                        <tr>
                            <th>序号</th>
                            <th>留言内容</th>
                            <th>操作</th>
                        </tr>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{ $message['id']}}</td>
                            <td>{{ $message['message']}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $message['id']}}">回复</button>
                                <button type="submit" name="del_index" value="{{$message['id']}}" class="btn btn-danger">删除</button>
                            </td>
                            @foreach($replies as $reply)
                            @if($reply['message_id']==$message['id'])
                            <tr>
                                <td>{!! '   |-----回复'!!}</td>
                                <td>{{ $reply['message']}}</td>
                                <td>
                                    <button type="submit" name="del" value="{{$reply['id']}}" class="btn btn-danger">删除</button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </form>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">回复</h4>
                        </div>
                        <form id="post2" action="{{route('message.reply')}}" method="post">
                        {{csrf_field()}}
                            <div class="modal-body">
                                <textarea name="reply_message" class="form-control" rows="12" style="resize: none;"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success reply" name="reply">回复</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </body>
</html>
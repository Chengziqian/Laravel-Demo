<html>
    <head>
        @include('index.head')
    </head>
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
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">新建留言</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('message.new:action')}}" method="post">
                            {{csrf_field()}}
                            <textarea name="new_message" class="form-control" rows="3" style="resize: none;width: 100%;height: 300px;"></textarea>
                            <div class="create" style="float: right;margin: 20px;">
                                <a href="{{route('message.list')}}"><button type="button" class="btn btn-danger">返回</button></a>
                            </div>
                            <div class="create" style="float: right;margin: 20px;">
                                <button name="create" type="submit" class="btn btn-success">创建</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
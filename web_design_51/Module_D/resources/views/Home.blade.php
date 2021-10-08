<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    
    <header class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a href="#" class="navbar-brand">標題</a>
        
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="menu" class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">a</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">b</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">c</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">d</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('test.png')}}" alt="img" class="w-100 h-100">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <div class="card-title">title</div>
                                <div class="card-text">1234</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="dialog" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">title</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script>
        $("#dialog").modal("show");
    </script>
</body>
</html>
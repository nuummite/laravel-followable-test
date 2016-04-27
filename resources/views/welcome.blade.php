<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    </head>
    <body>
        <div class="container" style="margin-top:20px;">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">Following</div>
                      <div class="panel-body">
                        @if ($me->following->count() > 0)
                            @foreach (Auth::user()->following as $followedUser)
                                <div style="color:black; font-size: 15px;">
                                    {{ $followedUser->name }}
                                </div>
                            @endforeach
                        @else
                            <p>No followed objects</p>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="panel panel-default">
                      <div class="panel-heading">Feed</div>
                      <div class="panel-body">
                        <ul style="list-style: none;">
                            @if ($me->mainFeed()->count() > 0)
                                @foreach ($me->mainFeed() as $message)
                                    <li>
                                        <p style="font-weight: bold;">{{ $message->messageable->name }}</p>
                                        <p>{{ $message->message }}</p>
                                    </li>
                                @endforeach
                            @else
                                <li>No messages yet</li>
                            @endif
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

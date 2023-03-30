<!doctype html>
<html lang="en">
  <head>
    <title>List Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <h4>List Post</h4>
        </div>
        <div class="row">
            <form class="form-inline mb-3" method="GET">
                <div class="form-group">
                    <input type="text" name="key" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>User-id</th>
                        <th colspan="4">Action</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->user_id }}</td>
                            <td><a href="{{ route('post-edit',[$post->id]) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                            <td><button type="button" class="btn btn-primary">Delete</button></td>
                            <td><a href="{{ route('post-clone', [$post->id]) }}"><button type="button" class="btn btn-primary">Clone</button></a></td>
                            <td><a href="{{ route('post-check', [$post->id]) }}"><button type="button" class="btn btn-primary">Check change</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <a href="{{ route('post-update-mass-user') }}"><button type="submit" class="btn btn-primary">Update Mass</button></a>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

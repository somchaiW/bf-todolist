<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create  Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Add Company</h2>
                </div>
                <p><a href="{{ route('companies.index') }}"class="btn btn-primary">Back</a></p>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div> 
            @endif
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <p><strong>Company Name</strong></p>
                            <input type="text" name="name" class="form-controll" placeholder="Company Name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <p><strong>Company Email</strong></p>
                            <input type="email" name="email" class="form-controll" placeholder="Company Email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <P><strong>Company Address</strong></P>
                            <input type="text" name="address" class="form-control" placeholder="Company address">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12"><button type="submit" class="mt-3 btn btn-primary" >Submit</button></div>
                    
                </div>
            </form>    
        </div>
</body>
</html>
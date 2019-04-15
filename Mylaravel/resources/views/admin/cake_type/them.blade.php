@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">CakeType
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{'admin/cake_type/them'}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $er)
                        {{$er}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="{{csrf_token()}}" placeholder="">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <input class="form-control" type="file" name="image" value="" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-default">Category Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        <!-- /#page-wrapper -->
@endsection

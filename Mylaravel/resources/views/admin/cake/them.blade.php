@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cake
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{'admin/cake/them'}}" method="POST" enctype="multipart/form-data">
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
                            <input class="form-control" name="name" placeholder="Please Enter Name" />
                        </div>
                        <div class="form-group" >
                            <label>Category Parent</label>
                            <select class="form-control" name="cake_type" id="cake_type">
                                @foreach($cake_type as $ct)
                                    <option value="{{$ct->id}}">{{$ct->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3" id="demo" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category image</label>
                            <input type="file" class="form-control" name="image" placeholder="Please Enter hinh" />
                        </div>
                        <div class="form-group">
                            <label>Category Unit_price</label>
                            <input class="form-control" name="unit_price" placeholder="Please Enter Unit_price" />
                        </div>
                        <div class="form-group">
                            <label>Category Promotion_price</label>
                            <input class="form-control" name="promotion_price" placeholder="Please Enter Promotion_price" />
                        </div>
                        <div class="form-group">
                            <label>Category unit</label>
                            <input class="form-control" name="unit" placeholder="Please Enter Unit" />
                        </div>
                        <div class="form-group">
                            <label>Category Status</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="0" checked type="radio">New
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1" type="radio">Old
                            </label>
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

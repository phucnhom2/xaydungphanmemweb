@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cake
                    <small>Edit</small>
                </h1>
            </div>
            <form action="admin/cake/sua/{{$cake->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(count($errors)>0)
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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
                    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" placeholder=""> --}}
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name"  value="{{$cake->name}}" />
                    </div>
                    <div class="form-group" >
                        <label>Category Parent</label>
                        <select class="form-control" name="cake_type" >
                            @foreach($cake_type as $ct)
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control ckeditor" name="description" rows="3" id="demo" >
                            {{$cake->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Category image</label>
                        <p>
                            <img width="400pc" src="source/image/product/{{$cake->image}}" alt="">
                        </p>
                            <input type="file" class="form-control" name="image" placeholder="Please Enter hinh" />
                    </div>
                    <div class="form-group">
                        <label>Category Unit_price</label>
                        <input class="form-control" name="unit_price" placeholder="Please Enter Unit_price" value="{{$cake->unit_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Category Promotion_price</label>
                        <input class="form-control" name="promotion_price" placeholder="Please Enter Promotion_price" value="{{$cake->promotion_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Category unit</label>
                        <input class="form-control" name="unit" placeholder="Please Enter Unit" value="{{$cake->unit}}" />
                    </div>
                    <div class="form-group">
                        <label>Category Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="0"
                            @if($cake->new==0)
                            {{'checked'}}
                            @endif
                            type="radio" >New
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1"
                            @if($cake->new==1)
                            {{'checked'}}
                            @endif
                            type="radio">Old
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Category Edit</button>
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

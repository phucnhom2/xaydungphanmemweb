@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cake
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>id_type</th>
                                <th>description</th>
                                <th>unit_price</th>
                                <th>promotion_price</th>
                                <th>image</th>
                                <th>unit</th>
                                <th>new</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cake as $cakes)
                                <tr class="odd gradeX" align="center">
                                    <th>{{$cakes->id}}</th>
                                    <th>{{$cakes->name}}</th>
                                    <th>{{$cakes->id_type}}</th>
                                    <th>{{$cakes->description}}</th>
                                    <th>{{$cakes->unit_price}}</th>
                                    <th>{{$cakes->promotion_price}}</th>
                                    <th><img width="200" height="150" src="source/image/product/{{$cakes->image}}" alt=""></th>
                                    <th>{{$cakes->unit}}</th>
                                    <th>{{$cakes->new}}</th>
                                    <th>{{$cakes->created_at}}</th>
                                    <th>{{$cakes->updated_at}}</th>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cake/xoa/{{$cakes->id}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cake/sua/{{$cakes->id}}">Edit</a></td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
